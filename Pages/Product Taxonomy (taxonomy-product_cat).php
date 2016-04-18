<?php get_header();?>

<?php if(have_posts()) : ?>
	<ul class="products clearfix">
		<?php while(have_posts()) : the_post();?>	
			<li>
				<a href="<?php the_permalink();?>">
					<div class="thumbnail">
						<?php the_post_thumbnail('catalog');?>
					</div>
					<h2><?php the_title();?></h2>
				</a>
			</li>
		<?php endwhile;?>
	</ul>

<?php else:?>
	<div id="not_found">
		<span> <?php _e('Sorry, There are no products in this category.', 'einav');?></span>
		<a href="<?php echo get_post_type_archive_link('product');?>"><?php _e('Go back to catalog', 'einav');?></a>.
	</div>
<?php endif;?>


<?php get_footer(); ?>