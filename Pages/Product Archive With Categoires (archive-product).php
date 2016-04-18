<?php get_header(); $terms = get_terms('product_cat') ;?>

<ul class="products clearfix">	
	<?php foreach ($terms as $term): $image = get_field('category_image', $term->taxonomy.'_'.$term->term_id); ?>
		<li>
			<a href="<?php echo get_term_link($term);?>">
				<div class="thumbnail">
					<img src="<?php echo $image['sizes']['catalog'];?>" alt="<?php echo $term->name;?>" />
				</div>
				<h2><?php echo $term->name;?></h2>
			</a>
		</li>
	<?php endforeach ?>
</ul>

<?php get_footer();?>