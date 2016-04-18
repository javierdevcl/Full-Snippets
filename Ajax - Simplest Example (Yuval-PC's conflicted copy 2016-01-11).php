//functions.php

// embed the javascript file that makes the AJAX request
wp_enqueue_script( 'my-ajax-request', THEME . '/js/ajax.js', array( 'jquery' ) );
 
// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
wp_localize_script( 'my-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

add_action( 'wp_ajax_nopriv_get_post_content', 'get_post_content' );
add_action( 'wp_ajax_get_post_content', 'get_post_content' );

function get_post_content() {
    if(!empty($_POST['postID'])) {
        $post_id = isset($_POST['postID']) ? sanitize_text_field($_POST['postID']) : '';
        $post_obj = get_post($post_id);
        ob_start();
        ?>
        <?php echo $post_obj->post_content;?>
        <?php
        $result = ob_get_clean();
        echo json_encode($result);
    }
    die();
}

ajax.js

jQuery(document).ready(function() {
	jQuery('ul#posts li a').click(function(e) {
		e.preventDefault();
		var postID = jQuery(this).data('postid');

		jQuery.post(
			MyAjax.ajaxurl,
			{
			action : 'get_post_content',
			postID : postID,
			beforeSend: 
				function( response ) {
					jQuery('.post_content').html('loading...');
					//jQuery('ul.projects').html('<div class="loading"><div class="dots-loader"></div></div>').fadeIn();
				}
			},

			function( response ) {
				jQuery('.post_content').html(response);
				/*jQuery('ul.projects .loading').fadeOut(function() {
					jQuery('ul.projects').hide().html(response).fadeIn();
				});*/
			},
			'json'
		);
	});
});