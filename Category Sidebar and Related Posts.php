<ul class="cat_sidebar">

	<?php $parents = get_terms('product_cat',array(
		'hide_empty'=>true,
		'parent'=>0
	) );
	?>
	<?php foreach ($parents as $parent) : ?>
			<?php $term_link = get_term_link($parent);?>
			<li class="cat_sidebar_li parent"><a class="cat_sidebar_a" href="<?php echo $term_link ?>"><?php echo $parent->name;?></a>
				<?php $children = get_terms('product_cat',array(
											'hide_empty'=>true,
											'child_of'=>$parent->term_id
										) );
				?>
				<?php if(!empty($children)):?>
				<ul class="children">
					<?php foreach ($children as $child) : ?>
					<?php $child_link = get_term_link($child);?>
					<li class="cat_sidebar_li child"><a class="cat_sidebar_a" href="<?php echo $child_link ?>"><?php echo $child->name;?></a></li>
				<?php endforeach;?>
				</ul>
			<?php endif;?>
			</li>
	<?php endforeach;?>
</ul>



<!-- SINGULAR RELEATED POSTS MENU -->
	<?php if(is_singular('post')):?>
		<ul class="related_posts">
			<?php 
				$current_post = get_queried_object();
				$post_cats = get_the_category($post->ID); 
				query_posts(array('cat'=>$post_cats[0]->term_id));
			?>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<li class="post-<?php echo $post->ID; if($post->ID == $current_post->ID) echo ' current-menu-item';?>"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
			<?php endwhile; endif; wp_reset_query(); ?>	
		</ul>
	<?php endif;?>
<!-- /SINGULAR RELEATED POSTS MENU -->