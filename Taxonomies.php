<ul>

	<?php $day_terms = get_terms('seminar_cat'); 

		foreach ($day_terms as $day) : ?>
			
		<li>
			<?php $term_link = get_term_link($day) ?>
			<a href="<?php echo $term_link; ?>" class="term_link">
				<?php 
					$image_object = get_field('seminar_cat_thumb', 'seminar_cat_'.$day->term_id);
					$image = $image_object['sizes']['seminar_thumbnail'];
				?>
				<?php if(!empty($image)) : ?>
					<div class="image">															
						<img src="<?php echo $image; ?>" alt="" >
					</div>
				<?php endif; ?>
				<div class="title"><?php echo $day->name; ?></div>
				<div class="desc"><?php echo $day->description; ?></div>
			</a>
		</li>
		
	<?php endforeach ?>

</ul>

ANOTHER [simple] EXAMPLE:

<?php $terms = get_terms('product_cat');?>
<?php foreach ($terms as $term) : ?>
					
	ACTIONS

<?php endforeach;?>



<?php 
	$args = array( 
		'post_type' => 'branch', 
		'posts_per_page' => -1, 
		'tax_query' => array(
			array(
			'taxonomy' => 'branch_tax',
			'field'    => 'term_id',
			'terms'    => $branch->term_id
			)
		) 
	);
	
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) : $query->the_post();
?>
	<?php the_field('name');?>

<?php endwhile; wp_reset_query();?>








	<?php 
		$args = array(
		'post_type' => 'events',
		'tax_query' => array(
			array(
				'taxonomy' => 'events_cat',
				'field'    => 'id',
				'terms'    => $classes,
			),
		),
	);
	$query = new WP_Query( $args );
	?>
