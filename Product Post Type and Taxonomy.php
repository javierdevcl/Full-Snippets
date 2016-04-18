<?php 

// Register Custom Post Type

function product_post_type() {

	$labels = array(
		'name'                => __( 'Products', 'theme' ),
		'singular_name'       => __( 'Product', 'theme' ),
		'menu_name'           => __( 'Products', 'theme' ),
		'name_admin_bar'      => __( 'Products', 'theme' ),
		'parent_item_colon'   => __( 'Parent Item:', 'theme' ),
		'all_items'           => __( 'All Items', 'theme' ),
		'add_new_item'        => __( 'Add New Item', 'theme' ),
		'add_new'             => __( 'Add New', 'theme' ),
		'new_item'            => __( 'New Item', 'theme' ),
		'edit_item'           => __( 'Edit Item', 'theme' ),
		'update_item'         => __( 'Update Item', 'theme' ),
		'view_item'           => __( 'View Item', 'theme' ),
		'search_items'        => __( 'Search Item', 'theme' ),
		'not_found'           => __( 'Not found', 'theme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'theme' ),
	);
	$args = array(
		'label'               => __( 'Product', 'theme' ),
		'description'         => __( 'Product', 'theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'          => array( 'product_cat' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'menu_icon'			  => 'dashicons-cart',
		'capability_type'     => 'page',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'product_post_type', 0 );


// Register Custom Taxonomy

function product_taxonomy() {

	$labels = array(
		'name'                       => __( 'Product Categories', 'theme' ),
		'singular_name'              => __( 'Product Category', 'theme' ),
		'menu_name'                  => __( 'Categories', 'theme' ),
		'all_items'                  => __( 'All Items', 'theme' ),
		'parent_item'                => __( 'Parent Item', 'theme' ),
		'parent_item_colon'          => __( 'Parent Item:', 'theme' ),
		'new_item_name'              => __( 'New Item Name', 'theme' ),
		'add_new_item'               => __( 'Add New Item', 'theme' ),
		'edit_item'                  => __( 'Edit Item', 'theme' ),
		'update_item'                => __( 'Update Item', 'theme' ),
		'view_item'                  => __( 'View Item', 'theme' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'theme' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'theme' ),
		'popular_items'              => __( 'Popular Items', 'theme' ),
		'search_items'               => __( 'Search Items', 'theme' ),
		'not_found'                  => __( 'Not Found', 'theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'product_cat', array( 'product' ), $args );

}
add_action( 'init', 'product_taxonomy', 0 );






HEBREW 

<?php 

// Register Custom Post Type
function product_post_type() {

	$labels = array(
		'name'                => __( 'מוצרים', 'theme' ),
		'singular_name'       => __( 'מוצר', 'theme' ),
		'menu_name'           => __( 'מוצרים', 'theme' ),
		'name_admin_bar'      => __( 'מוצרים', 'theme' ),
		'parent_item_colon'   => __( 'פריט אב:', 'theme' ),
		'all_items'           => __( 'כל הפריטים', 'theme' ),
		'add_new_item'        => __( 'הוסף פריט חדש', 'theme' ),
		'add_new'             => __( 'הוסף חדש', 'theme' ),
		'new_item'            => __( 'פריט חדש', 'theme' ),
		'edit_item'           => __( 'ערוך פריט', 'theme' ),
		'update_item'         => __( 'עדכן פריט', 'theme' ),
		'view_item'           => __( 'צפה בפריט', 'theme' ),
		'search_items'        => __( 'חפש פריט', 'theme' ),
		'not_found'           => __( 'לא נמצא', 'theme' ),
		'not_found_in_trash'  => __( 'לא נמצא באשפה', 'theme' ),
	);
	$args = array(
		'label'               => __( 'מוצר', 'theme' ),
		'description'         => __( 'מוצר', 'theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'          => array( 'product_cat' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'menu_icon'			  => 'dashicons-cart',
		'capability_type'     => 'page',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'product_post_type', 0 );


// Register Custom Taxonomy
function product_taxonomy() {

	$labels = array(
		'name'                       => __( 'קטגוריות מוצר', 'theme' ),
		'singular_name'              => __( 'קטגוריית מוצר', 'theme' ),
		'menu_name'                  => __( 'קטגוריות', 'theme' ),
		'all_items'                  => __( 'כל הפריטים', 'theme' ),
		'parent_item'                => __( 'פריט אב', 'theme' ),
		'parent_item_colon'          => __( 'פריט אב:', 'theme' ),
		'new_item_name'              => __( 'שם פריט חדש', 'theme' ),
		'add_new_item'               => __( 'הוסף חדש פריט', 'theme' ),
		'edit_item'                  => __( 'ערוך פריט', 'theme' ),
		'update_item'                => __( 'עדכן פריט', 'theme' ),
		'view_item'                  => __( 'צפה בפריט', 'theme' ),
		'separate_items_with_commas' => __( 'הפרד בין פריטין בנקודה-פסיק', 'theme' ),
		'add_or_remove_items'        => __( 'הוסף או הסר פריטים', 'theme' ),
		'choose_from_most_used'      => __( 'בחר פריטים מהמשומשים ביותר', 'theme' ),
		'popular_items'              => __( 'פריטים פופולריים', 'theme' ),
		'search_items'               => __( 'חפש פריטים', 'theme' ),
		'not_found'                  => __( 'לא נמצא', 'theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'product_cat', array( 'product' ), $args );

}
add_action( 'init', 'product_taxonomy', 0 );