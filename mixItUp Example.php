<?php /* Template Name: כנסים */; get_header();?>
<div class="container">
	<div class="content">
		<div class="row">
			<?php get_sidebar();?>

			<div class="col-sm-12 col-lg-12">
				<?php while(have_posts()) : the_post(); ?>
					<div class="the_content">
						<h1><?php the_title();?></h1>
						<?php $terms = get_terms('assembly_cat');?>

						<!-- navigation -->	
							<div class="row navigation">
								<div class="col-sm-16 col-lg-16">
									<div class="filter" data-filter="all"><?php _e('הכל', 'theme');?></div>
									<?php foreach ($terms as $term) : ?>
										<div class="filter" data-filter=".term_<?php echo $term->term_id;?>">
											<?php echo $term->name; ?>	
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<!-- /navigation -->
						
						<!-- mixed posts -->
							<ul class="row posts mixitup">
								<?php query_posts(array('post_type'=>'assembly'));?>
								<?php while(have_posts()): the_post(); ?>
									<?php 
									$post_filter_terms = array(); 
									$post_terms = get_the_terms($post->ID,"assembly_cat"); 
									if($post_terms) { 
										foreach($post_terms as $term){
											$post_filter_terms[] = "term_".$term->term_id;
										}
									}
									?>
									<li class="mix <?php echo implode(" ",$post_filter_terms);?> col-sm-5 col-lg-5 gap">
										<a href="<?php the_permalink();?>">	
											<div class="thumb">			
												<?php the_post_thumbnail('member');?>
											</div>
										</a>		
									</li>
								<?php endwhile; wp_reset_query(); ?>
							</ul>
						<!-- /mixed posts -->
					</div>
				<?php endwhile;?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

.mix {
    display: none;
}

jQuery('.post-type-archive ul.posts').mixItUp();