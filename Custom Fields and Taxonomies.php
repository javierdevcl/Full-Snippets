<?php
	$banner_object = get_sub_field('banner_image');
	$banner_image_url = $banner_object['sizes']['home_banner'];
	$term_id = get_sub_field('banner_link');
	$term = get_term_by('id', $term_id, 'product_cat');
	$term_link = get_term_link($term);
?>