//HTML
	<?php $home_id = get_option('page_on_front');?>
	<?php if( have_rows('bg_slider_repeater', $home_id) ):?>
		<div class="bg_slider_wrapper">
			<div class="bg_slider">
				<?php while ( have_rows('bg_slider_repeater', $home_id) ) : the_row(); 
					$image = get_sub_field('image', $home_id);
				?> 
					<div class="bg" style="background:url(<?=$image['url'];?>)">	</div>
			    <?php endwhile; ?>
			</div>
			<div class="slidernav"></div>
		</div>
	<?php endif;?>
	
//Script
    jQuery('.bg_slider').slick({
        fade:true,
        speed: 500,
        appendArrows:jQuery('.slidernav'),
        prevArrow:'<a class="slider_prev"></a>',
        nextArrow:'<a class="slider_next"></a>'
    });

//CSS

	.bg_slider_wrapper {
		direction:ltr;
		position: fixed;
		width:100%;
		height:100%;
		z-index:-1;
	}
	.slick-slider, .slick-list, .slick-slider .slick-track, .slick-slider .slick-list, .slick-slide {
		height: 100%;
	}
	.bg {
	  width: 100%;
	  height: 100%;
	  background-position: top center;
	  background-repeat: no-repeat;
	}
	.slidernav a {
		display: inline-block;
		position: absolute;
		width:44px;
		height:49px;
		background:#fff;
		margin:auto;
		top:0; bottom:0;
	}
	.slider_prev {
		left:30px;
	}
	.slider_next {
		right:30px;
	}

