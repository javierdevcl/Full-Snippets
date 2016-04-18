<?php 

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// Declare WooCommerce support in third party theme

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add WooCommerce wrappers

function woo_wrapper_start() {
	echo '<div class="container mt clearfix"><div id="main"><div class="wrapper">';
}

function woo_wrapper_end() {
	get_template_part('inc/mod','breadcrumbs');
	echo '</div></div>'.get_sidebar().'</div>';
}

add_action('woocommerce_before_main_content', 'woo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'woo_wrapper_end', 10);


// Display 24 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

add_filter('woocommerce_get_price_html', 'bas_sale_price', 10, 2);
function bas_sale_price($price,$product){
	$price = '';
	if($product->price > 0){
		if($product->is_on_sale() && isset($product->regular_price)){
			$price .= woocommerce_price($product->get_price());
		}else{
			$price .= woocommerce_price($product->get_price());
		}
	}elseif($product->price === ''){
		$price = apply_filters('woocommerce_empty_price_html','',$product);
	}elseif($product->price == 0){
		if ($product->is_on_sale() && isset($product->regular_price)){
			$price .= $product->get_price_html_from_to($product->regular_price, __('Free!','woocommerce'));
		}else{
			$price  = __('Free!','woocommerce');
		}
	}
	return $price;
}


// Remove cart from catalog
function remove_loop_button(){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');


// Remove quantity box from SINGLE PRODUCT (near Add To Cart button)

function wc_remove_all_quantity_fields( $return, $product ) {
	return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


// Remove result count from shop
function woocommerce_result_count() {
	return;
}

// Remove product count from category
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
	return;
}


// Change number of related products on product page
function woo_related_products_limit() {
	global $product;
    
    $args['posts_per_page'] = 6;
    return $args;
}

// Change number of related products per row
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}


// Override_checkout_fields
add_filter( 'woocommerce_billing_fields' , 'custom_override_checkout_fields' );


// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['billing_address_1']['placeholder'] = 'רחוב';
     $fields['billing_address_2']['placeholder'] = 'מספר בית';
     unset($fields['billing_country']);
     $fields['billing_postcode']['required'] = false;
     return $fields;
}


// Remove all currency symbols
function sww_remove_wc_currency_symbols( $currency_symbol, $currency ) {
     $currency_symbol = '';
     return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'sww_remove_wc_currency_symbols', 10, 2);


// Remove quantity fields
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}

// Change add to cart button text
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {
	return __( 'My Button Text', 'woocommerce' );
}

// Show product description/excerpt in catalog 
add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 5);

// Get Add to Cart Button
woocommerce_template_loop_add_to_cart();

// Remove related products from single product 
function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 