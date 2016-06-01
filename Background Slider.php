<div class="home_slider_wrap clearfix">
	<div class="slider_wrap">
		<ul class="slider" data-slick='{"fade": true}'>
			<?php while(have_rows('slides')) : the_row(); $image = get_sub_field('image');?> 
				<li>
					<a href="<?php the_sub_field('link');?>">
						<div class="slide" style="background-image:url(<?php echo $image['sizes']['home_slider'];?>)">
							<div class="caption hidden">
								<h2><?php the_sub_field('title');?></h2>
								<p><?php the_sub_field('text');?></p>
							</div>
						</div>
					</a>
				</li>
		    <?php endwhile; ?>
		</ul>
	</div>
</div>


.home_slider_wrap {
    position: absolute;
    z-index: 1;
    top: 0;
    width: 100%;
    height: 100%;
}
.slider_wrap .slide {
    height: 100vh;
}