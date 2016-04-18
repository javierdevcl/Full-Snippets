<!-- main slider -->
<?php if(have_rows('slides')):?>
	<section id="slider_section">
		<div id="main_slider_wrapper">
			<ul id="main_slider">
				<?php while(have_rows('slides')) : the_row(); $img = get_sub_field('image'); if(!empty($img)): ?> 
					<li>
						<div class="slidewrap" style="background-image:url(<?php echo $img['sizes']['main_slider'];?>)">
							<?php if($content = get_sub_field('content')):?>
								<div class="container">
									<div class="slider_content fl">
										<?php the_sub_field('content');?>
									</div>
								</div>
							<?php endif;?>
						</div>
					</li>
				<?php endif; endwhile; ?>       
			</ul>
			<div class="slider_nav main_slider_nav">
				<button class="prev_slide trans"><i class="fa fa-chevron-left"></i></button>
				<button class="next_slide trans"><i class="fa fa-chevron-right"></i></button>
			</div>
	    </div>
    </section>
<?php endif;?>

function mainSlider() {
     var main_slider = jQuery('ul#main_slider').lightSlider({
        item: 1,
        loop: true,
        controls:false,
        pause: 5000,
        speed: 2000,
        auto: true,
        mode: 'fade',
        pauseOnHover: true
    });

    jQuery('.main_slider_nav .next_slide').click(function(){
        main_slider.goToNextSlide();
    });
    jQuery('.main_slider_nav .prev_slide').click(function(){
        main_slider.goToPrevSlide();
    });
}

section#slider_section .lSSlideOuter {
    width:100%;
}
#main_slider_wrapper {
    position: relative;
}
#main_slider_wrapper,
#main_slider li .slidewrap {
    height: 685px !important;
}
#main_slider li .slidewrap {
    background-position: center center;
    background-size: cover;
}
.slider_content {
    position: relative;
    top: 190px;
    padding: 35px 80px 35px 30px;
    border: 3px;
    background: rgba(40,41,50,.9);
}
.slider_nav button {
    font-size: 22px;
    position: absolute;
    top: 0;
    bottom: 0;
    width: 50px;
    height: 50px;
    z-index:30;
    margin: auto;
    border: none;
}
.slider_nav button:hover {
    color: #000;
}
.slider_nav button.prev_slide {
    left: 50px;
}
.slider_nav button.next_slide {
    right: 50px;
}