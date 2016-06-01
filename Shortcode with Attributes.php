// creating shortcode
function button_shortcode($atts) {
    $a = shortcode_atts( array(
        'title' => '',
        'subtitle' => '',
        'link' => '',
        'desktop_only' => false,
        'mobile_only' => false
    ), $atts );

    set_query_var('a' , $a);
    
    ob_start();
    get_template_part('inc/shortcode', 'button');
    return ob_get_clean();
}

add_shortcode( 'button', 'button_shortcode' );


button

<?php get_query_var('a' , $a);?>
<div class="button"> ...