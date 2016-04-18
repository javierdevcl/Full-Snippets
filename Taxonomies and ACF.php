<?php get_header(); 
	$object = get_queried_object();
	$term_id = $object->term_id;
?>

<?php echo $tax_desc = get_field('ACF_ID', 'events_cat_'. $term_id); ?>