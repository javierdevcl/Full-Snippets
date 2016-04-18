<?php 

//functions.php
wp_enqueue_script( 'ajax-request', THEME . '/admin/ajax.js', array( 'jquery' ) );
wp_localize_script( 'ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

//ajax_init.php
add_action( 'wp_ajax_nopriv_get_more_posts', 'get_more_posts' );
add_action( 'wp_ajax_get_more_posts', 'get_more_posts' );

//ajax.php
function get_more_posts(){
    $paged = isset($_POST["paged"]) ? sanitize_text_field($_POST["paged"])  : 1;
    $paged++;
    if(!$paged)
        return;

    $args = array(
        "paged"=> $paged,
        "post_type"=>"post",
        "posts_per_page" => 4
    );

    $query = new WP_query($args);

    ob_start();
    while($query->have_posts()): $query->the_post();
        get_template_part('inc/loop', 'posts');
    endwhile;
    $results = ob_get_clean();

    $response = array("posts"=>$results);

    $response["more"] = true;
    if($query->max_num_pages == $paged){
        $response["more"] = false;
    }

    echo json_encode($response);
    die();
}

//ajax.js
var paged = 1;

jQuery(document).ready(function() {
   jQuery('.load_more_btn').click(function() {
       load_more_posts();
   });     
});

function load_more_posts(){
    jQuery.post(
        MyAjax.ajaxurl,
        {
            action : 'get_more_posts',
            paged : paged,
        },
        function( response ) {

            jQuery(response.posts).appendTo(jQuery('div.posts')).hide().slideDown('normal');

            if ( !response.more ) {
                jQuery(".load_more_btn").fadeOut();
            }
            paged++;
        },
        "json"
    )
}


