HTML
----
<ul class="gallery_nav">
	<?php $terms = get_terms('project_cat'); foreach ($terms as $term):?>
		<li><a href="#" data-term="<?php echo $term->term_id; ?>"><?php echo $term->name;?></a></li>
	<?php endforeach;?>
</ul>
<div class="gallery"></div>

admin/ajax.php
--------------

<?php
add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );

function add_frontend_ajax_javascript_file() {
    wp_enqueue_script( 'ajax_script', THEME . '/admin/ajax-script.js', array('jquery') );
    wp_localize_script( 'ajax_script', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}

add_action( 'wp_ajax_get_projects_by_term', 'get_projects_by_term' ); // Logged-in User
add_action( 'wp_ajax_nopriv_get_post_information', 'get_projects_by_term' ); // Logged-off User 

function get_projects_by_term()  {
    if(!empty($_POST['term_id'])) {

        $term_id = isset($_POST['term_id']) ? $_POST['term_id'] : '';

		$args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'project_cat',
					'field'    => 'term_id',
					'terms'    => $term_id,
				),
			),
			'post_type'	=> 'project',
			'posts_per_page' => -1
		);
    
    	$query = new WP_Query($args); 
    	if ( $query->have_posts() ) : 
    		while ( $query->have_posts() ) : $query->the_post(); ?>
    		<?php ob_start(); ?>    	
    			<h1><?php the_title(); ?></h1>
			<?php $result = ob_get_clean(); ?>  			
    	<?php endwhile; 
    	endif;	        	
        echo json_encode( $result );
    }	
    die();
}

admin/ajax-script.js
---------------------
jQuery(document).ready(function($) {

	jQuery(".gallery_nav li a").click(function(e){
		e.preventDefault();
		var termid = jQuery(this).data("term");

	    var data = {
	        'action': 'get_projects_by_term',
			'term_id': termid
	    };

	    jQuery.post(frontendajax.ajaxurl, data, function(response) {
	    
	    	var result = jQuery.parseJSON(response);
	    	jQuery(".gallery").fadeOut(250).html('').html(result).fadeIn(250);
	    });

	})
})
