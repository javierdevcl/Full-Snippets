<?php 

get_header();

global $children;
$term = get_queried_object();

	$children = get_terms( $term->taxonomy, array('parent' => $term->term_id, 'hide_empty' => false) );
	if(!empty($children)) get_template_part('inc/part', 'category-parent');
	else get_template_part('inc/part', 'category-children');

get_footer();

?>