<?php

// image size
add_image_size('main_slider', 1900, 680, true);
add_image_size('cube', 290, 190, true);
add_image_size('product_thumb', 245, 160, true);
add_image_size('pagebanner', 1900, 107, true);
add_image_size('single', 300, 250, false);
add_image_size('list', 225, 100, true);

// defines and constant functions
define ('THEME', get_template_directory_uri());
define ( 'LANG', ICL_LANGUAGE_CODE );

get_template_part('admin/post_types');
get_template_part('admin/shortcodes_init');
get_template_part('admin/menu_walker');

add_theme_support( 'post-thumbnails' );
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

// register menus
register_nav_menus( array(
    'main_menu' => __('הדר', 'theme'),
    'footer_menu_1' => __('פוטר ימין', 'theme'),
    'footer_menu_2' => __('פוטר אמצע', 'theme'),
    'pages' => __('עמודים פנימיים ללא קטגוריות', 'theme')
) );

// enqueue styles and scripts
function theme_name_scripts() {
    if(LANG == 'he') $maplang = '&language=iw'; else $maplang = '';
    //wp_enqueue_style( 'jscrollpane', THEME . '/css/jquery.jscrollpane.css' );
	//wp_enqueue_style( 'mCustomScrollbar', THEME . '/css/jquery.mCustomScrollbar.min.css' );
    //wp_enqueue_style( 'animate', THEME . '/css/animate.css' );
    wp_enqueue_style( 'lightSlider', THEME . '/css/lightSlider.css', array(), '1.1.3' );
	//wp_enqueue_style( 'slick', THEME . '/css/slick.css' );
	//wp_enqueue_style( 'slick-theme', THEME . '/css/slick-theme.css' );
    //wp_enqueue_style( 'magnific_popup', THEME . '/css/magnific-popup.css' );
    wp_enqueue_style( 'fancybox', THEME . '/js/fancybox/jquery.fancybox.css', array(), '2.1.5' );
	wp_enqueue_style( 'fonts', THEME . '/fonts/fonts.css' );
    wp_enqueue_style( 'reset', THEME . '/css/reset.css' );
    wp_enqueue_style( 'style', THEME . '/style.css' );
	wp_enqueue_style( 'responsive', THEME . '/css/responsive.css' );
    wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&language='.$maplang, array(), NULL, true );
    //wp_enqueue_script( 'jscrollpane', THEME . '/js/jquery.jscrollpane.min.js', array('jquery'), NULL, true );
	//wp_enqueue_script( 'mCustomScrollbar', THEME . '/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), NULL, true );
    //wp_enqueue_script( 'mousewheel', THEME . '/js/jquery.mousewheel.js', array('jquery'), NULL, true );
    //wp_enqueue_script( 'wow', THEME . '/js/wow.min.js', array('jquery'), NULL, true );
    //wp_enqueue_script( 'mixitup', THEME . '/js/jquery.mixitup.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'lightSlider', THEME . '/js/jquery.lightSlider.min.js', array('jquery'), '1.1.5', true );
	//wp_enqueue_script( 'slick', THEME . '/js/slick.min.js', array('jquery'), NULL, true );
    //wp_enqueue_script( 'magnific_popup', THEME . '/js/jquery.magnific-popup.min.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'fancybox', THEME . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true );
    wp_enqueue_script( 'script', THEME . '/js/script.js', array('jquery'), NULL, true );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

// theme options
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'אפשרויות תבנית',
        'menu_title'    => 'אפשרויות',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

function toolbar_link_to_mypage( $wp_admin_bar ) {
    $home_url = home_url();
    $args = array(
        'id'    => 'theme_options',
        'title' => 'אפשרויות',
        'href'  => "$home_url/wp-admin/admin.php?page=theme-general-settings",
        'meta'  => array( 'class' => 'dashicons-welcome-widgets-menus' )
    );
    $wp_admin_bar->add_node( $args );
}

// enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


// post thumbnail function
function post_thumb($size) {
    if(has_post_thumbnail()) {
        the_post_thumbnail($size);
    }
    elseif($thumb = get_field('nothumb','option')) {
        echo '<img src='.$thumb['sizes'][$size].' alt='.$thumb['alt'].'/>';
    }
    else{
        echo '<div class="no_thumbnail">';
        _e('Please add thumbnail or "No Thumbnail Image" if you have no thumbnail (see theme options)', 'theme');
        echo '</div>';
    }
}

function post_thumb_src($post_id, $size = 'thumbnail') {
    $thumb_id = get_post_thumbnail_id($post_id);
    $src = wp_get_attachment_image_src($thumb_id, $size);
    $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
    if(!empty($src)) $src = $src[0];
    if ( !$src && get_field('nothumb','option') ) {
        $thumb = get_field('nothumb','option');
        $alt = $thumb['alt'];
        $src = $thumb['sizes'][$size];
    }
    if ( $src ) {
        echo '<img src="'.$src.'"  alt="'.$alt.'" />';
    }
    else{
        echo '<div class="no_thumbnail">';
        _e('Please add thumbnail or "No Thumbnail Image" if you have no thumbnail (see theme options)', 'theme');
        echo '</div>';
    }
}

// pagination function
function theme_pagination() {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'prev_text'    => __('&lt'),
        'next_text'    => __('&gt'),
         'type'         => 'plain',
        'add_args'     => false
    ) );
}

// retrieve page title at any scenario
function the_pagetitle() {
    if(is_category()) single_cat_title();
    elseif(is_page()) echo get_the_title();
    elseif(is_archive() && !is_tax()) post_type_archive_title();
    elseif(is_tax()) single_term_title();
    elseif(is_singular()) single_post_title();
    elseif(is_post_type_archive()) echo post_type_archive_title();
}

//set banner image
function get_banner() {
    if ( get_field('header_image')) {
        $banner = get_field('header_image');
        return $banner['sizes']['pagebanner'];
    }
    elseif ( is_tax() || is_category() ) {
        $queried_object = get_queried_object();
        $taxonomy       = $queried_object->taxonomy;
        $term_id        = $queried_object->term_id;
        if(get_field('header_image', $taxonomy.'_'.$term_id)) {
            $banner = get_field('header_image', $taxonomy.'_'.$term_id);
            return $banner['sizes']['pagebanner'];
        }
        elseif(get_field('default_categories_header_image', 'option')) {
            $banner = get_field('default_categories_header_image', 'option');
            return $banner['sizes']['pagebanner'];
        }
    }

    if ( !isset($banner) && get_field('default_header_image', 'option') ) {
        $banner = get_field('default_header_image', 'option');
        return $banner['sizes']['pagebanner'];
    }
}

//get hidden content
function get_hidden_content() {
    if ( get_field('hidden_content')) {
        $hidden_content = get_field('hidden_content');
        return $hidden_content;
    }
    elseif ( is_tax() || is_category() ) {
        $queried_object = get_queried_object();
        $taxonomy       = $queried_object->taxonomy;
        $term_id        = $queried_object->term_id;
        if(get_field('hidden_content', $taxonomy.'_'.$term_id)) {
            $hidden_content = get_field('hidden_content', $taxonomy.'_'.$term_id);
            return $hidden_content;
        }
        elseif(get_field('default_categories_hidden_content', 'option')) {
            $hidden_content = get_field('default_categories_hidden_content', 'option');
            return $hidden_content;
        }
    }

    if ( !isset($hidden_content) && get_field('default_hidden_content', 'option') ) {
        return get_field('default_hidden_content', 'option');
    }
}

//print the post category title
function the_post_category_title($taxonomy='category') {
    global $post;
    $terms = get_the_terms($post->ID, $taxonomy);
    $term = reset($terms);
    echo $term->name;
}

// add menu attribute
add_filter( 'nav_menu_link_attributes', 'menu_color_attribute', 10, 3 );

function menu_color_attribute( $atts, $item, $args ) {
    $color = get_field("color",$item->object_id) ? get_field("color",$item->object_id) : get_field("color",$item->object."_".$item->object_id);
    $atts['data-color'] = $color;
    return $atts;
}


function list_categories_and_posts($post_type, $taxonomy) {
    ?>
    <ul>
        <?php
            global $color; 
            if ( is_archive() ) {
                $queried_term = get_queried_object(); 
            }

            elseif ( is_singular($post_type) ) {
                $queried_post   = get_queried_object();
                $queried_terms  = get_the_terms( $queried_post, $taxonomy );
                $queried_term   = reset($queried_terms);
            }
            
            $parent_term_id = $queried_term->parent ? $queried_term->parent : $queried_term->term_id;
            //$categories = get_term_children($parent_term_id, $taxonomy);
            $categories = get_terms( $taxonomy, array( 'child_of' => $parent_term_id ) );

            foreach ($categories as $term) {
                $term_id = $term->term_id;
                $term_class = "term_".$term_id;
                $term_class .= $term_id == $queried_term->term_id ? ' current_cat' : '';
                if($term->count) {
                ?>
                    <li class="<?php echo $term_class;?>" style="border-color:<?php echo $color;?>">
                        <a href="<?php echo get_term_link($term);?>"><?php echo $term->name;?></a>

                        <ul class="children">
                            <?php
                                $term_query = get_queried_object();
                                $args = array(
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => $taxonomy,
                                            'field'    => 'term_id',
                                            'terms'    => $term->term_id,
                                        ),
                                    ),
                                    'post_type' => $post_type,
                                    'posts_per_page' => -1
                                );
                            ?>
                            <?php $query = new WP_Query($args); if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                <?php 
                                    $post_class = "post_".get_the_ID();
                                    if(is_singular($post_type)) {
                                        $current_check = $queried_post->ID == get_the_ID() ? ' current_post' : '';
                                        $post_class .= $current_check;
                                    }
                                ?>
                                <li class="<?php echo $post_class;?>"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                            <?php endwhile; endif; ?>   
                        </ul>
                    </li> 
                <?php } 
            }
        ?>
    </ul>
<?php }