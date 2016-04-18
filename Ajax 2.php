<?php 
// Ajax in WP

// functions.php
	get_template_part('admin/ajax');
	wp_enqueue_script( 'ajax', THEME . '/js/ajax.js', array('jquery'), NULL, true );

//admin/ajax.php

	<?php 

	add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );

	function add_frontend_ajax_javascript_file() {
		wp_enqueue_script( 'ajax_script', THEME . '/js/ajax.js', array('jquery') );
		wp_localize_script( 'ajax_script', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	}

	add_action( 'wp_ajax_get_category_posts', 'get_category_posts' ); // Logged-in User
	add_action( 'wp_ajax_nopriv_get_category_posts', 'get_category_posts' ); // Logged-off User

	function get_category_posts() {
		if(!empty($_POST['catid'])) {
			$cat_id = isset($_POST['catid']) ? sanitize_text_field($_POST['catid']) : ''; 
			$posts = get_posts(array( 'posts_per_page' => -1, 'category' => $cat_id ));
			
			ob_start();
			echo '<ul class="posts_of_category">';
			foreach ($posts as $post) {
				echo '<li>'.$post->post_title.'</li>';
			}
			echo '</ul>';
			$result = ob_get_clean();
			
			echo json_encode($result);
		}

		die();
	}
	
// ajax.js
	jQuery(document).ready(function() {
		jQuery('ul.categories li a').click(function(e) {
			e.preventDefault();
			var cat_ID = jQuery(this).data('catid');
			var data = { // try replace this by it's index(s)
				'action': 'get_category_posts',
				'catid': cat_ID,
			}

			jQuery.ajax({ 
				type:'POST', 
				dataType: 'json',
				url: frontendajax.ajaxurl,
				data,
					success: function(response) {
						var result = response;
						jQuery(this).html('');  
						jQuery('.post_list_wrapper').html(result);
					},
					beforeSend: function(response){
						jQuery('.post_list_wrapper').html('');
						jQuery('.post_list_wrapper').append('<span class="loader"></span>');
					},
				});
			});
		jQuery('ul.categories li:first-child a').trigger('click');
	});
	
//front-page.php 
	<?php $cats = get_categories();?>
	<ul class="categories clearfix">
		<?php foreach ($cats as $cat): ?>
		<li>
			<a href="#" data-catid="<?php echo $cat->cat_ID;?>"><?php echo $cat->name;?></a>
		</li>
		<?php endforeach ?>
	</ul>
	
	<div class="post_list_wrapper">
		<span class="loader"></span>
	</div>
	
//thumbnails only 
foreach ($posts as $post) {
	$post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) ,'full');
	$post_src = $post_thumb[0];
	echo '<li><img src="'.$post_src.'" style="display:none;" onload="fadeIn(this)" /></li>';
}
//ajax.js
function fadeIn(obj) {
    jQuery(obj).fadeIn(1000);
}