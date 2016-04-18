<?php 

get_header();

global $children;
$term = get_queried_object();

	$children = get_terms( $term->taxonomy, array('parent' => $term->term_id, 'hide_empty' => true) );
	
	if(!empty($children)) 
		get_template_part('inc/tax', 'product-parent');
	
	else 
		get_template_part('inc/tax', 'product-child');

get_footer();

?>