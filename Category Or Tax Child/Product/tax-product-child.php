<?php if(have_posts()) : ?>
	
	<ul class="products clearfix">
		<?php while(have_posts()) : the_post();?>
			<li class="post-<?php echo $post->ID;?>">
				<?php edit_post_link(__('Edit', 'theme'),'<div class="edit_post">','</div>');?>
				<a href="<?php the_permalink();?>">
					<div class="thumbnail">
						<?php the_post_thumbnail('catalog');?>
					</div>
					<div class="details">
						<h2><?php the_title();?></h2>
					</div>
				</a>
			</li>
		<?php endwhile;?>
	</ul>

<?php else:?>

	<div id="not_found">
		<span> <?php _e('Sorry, There are no products in this category.', 'theme');?></span>
		<a href="<?php echo get_post_type_archive_link('product');?>"><?php _e('Go back to catalog', 'theme');?></a>.
	</div>
	
<?php endif;?>