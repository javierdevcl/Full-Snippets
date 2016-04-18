<?php 

function jobs_shortcode($atts) {
   	global $category_id;
	$a = shortcode_atts( array(
        'category_id' => '1',
    ), $atts );
   	extract($a);
    ob_start();
    get_template_part('inc/shortcode', 'jobs');
    return ob_get_clean();
}
add_shortcode( 'jobs', 'jobs_shortcode' );


<?php 
	global $category_id;
	$terms = get_term_children($category_id, 'job_cat');
	print_r($terms);
?>

---OR---

<?php 
	global $category_id;
	$terms = get_term_children($category_id, 'job_cat');
?>

<ul class="child_categories clearfix">
	<?php foreach ($terms as $term): ?>
		<?php $term_object = get_term_by('id', $term, 'job_cat');?>
		<li><a href="<?php echo get_term_link($term_object);?>"><?php echo $term_object->name;?></a></li>
	<?php endforeach ?>
</ul>
