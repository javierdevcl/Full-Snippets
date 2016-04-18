<?php 
	global $children;
	$term 		= get_queried_object(); 
	$taxonomy 	= $term->taxonomy;
	$term_id 	= $term->term_id;
?>

<ul class="products clearfix">
	<?php foreach ($children as $term) :?>
		<?php $image = get_field('category_image', $taxonomy.'_'.$term->term_id);?>
		<li id="term-<?php echo $term->term_id;?>">
			<a href="<?php echo get_term_link($term);?>">
				<div class="thumbnail">
					<img src="<?php echo $image['sizes']['catalog'];?>" alt="<?php echo $term->name;?>" />
				</div>
				<div class="details">
					<h2><?php echo $term->name;?></h2>
				</div>
			</a>
		</li>
	<?php endforeach;?>
</ul>

<?php get_sidebar();?>