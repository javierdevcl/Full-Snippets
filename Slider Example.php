function slider_init() {
    var slider = jQuery('.prac_slider').slick({
        slidesToShow: 3,
        dots: false,
        arrows: false,
        adaptiveHeight: true,
        autoplaySpeed: 3000,
        autoplay: true,
        adaptiveHeight: false,
		responsive : [
            {
                breakpoint:800,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1, 

                }
            },
        ]
    });

    jQuery('.slider_wrapper .next_slide').click(function() {
		slider.slick('slickNext');
    });
    jQuery('.slider_wrapper .next_slide').click(function() {
        slider.slick('slickNext');
    });
}

function services_slider_init() {
    var services_slider = jQuery('ul.services_slider').slick({
        slidesToShow: 1,
        dots: true,
        arrows: false,
        adaptiveHeight: true,
        autoplaySpeed: 5000,
        autoplay: true,
        adaptiveHeight: false,
        fade: true,
        speed: 1000,
    });

    jQuery('.fade_slider_wrap .prev_slide').click(function() {
        services_slider.slick('slickPrev');
    });
    jQuery('.fade_slider_wrap .next_slide').click(function() {
        services_slider.slick('slickNext');
    });
}



<?php 
$images = get_field('gallery');

if( $images ): ?>
	<div class="slider_wrapper">
	    <ul>
	        <?php foreach( $images as $image ): ?>
	            <li>
	                <div class="slide">
		                <a href="<?php echo $image['sizes']['large']; ?>" class="fancybox" rel="pagebanner">
		                    <img src="<?php echo $image['sizes']['pagebanner_slide']; ?>" alt="<?php echo $image['alt']; ?>" />
		                </a>
	                </div>
	            </li>
	        <?php endforeach; ?>
	    </ul>
	    <div class="slidernav">
	    	<button class="next_slide fa fa-angle-left"></button>
	    	<button class="prev_slide fa fa-angle-right"></button>
	    </div>
    </div>
<?php endif;?>

.slider_wrapper {
    direction: ltr;
    position: relative;
}
.slider_wrapper ul li .slide img {
    display: block;
    width: 100%;
    height: auto;
}
.slider_wrapper .slidernav button {
    position: absolute;
    z-index: 50;
    top: 0;
    bottom: 0;
    margin: auto;
    color: #fff;
    border: none;
    background: none;
    font-size: 110px;
}
.slider_wrapper .slidernav button.prev_slide {
    right: 0;
}


function sliderInit() {
    var slider = jQuery('.slider').lightSlider({
        item: 1,
        pager: false,
        controls: false,
		loop: true,
		adaptiveHeight: true,
		pause: 5000,
		speed: 2000,
		auto: true,
		slideMargin:6,
		mode: 'fade',
		pauseOnHover: true,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                }
            },
            {
                breakpoint:375,
                settings: {
                    item:1,
                }
            }
        ]
    });
    
	jQuery('.prev_slide').click(function(){
		slider.goToNextSlide();
	});
	jQuery('.next_slide').click(function(){
		slider.goToPrevSlide();
	});
}

.slider_wrapper .lSAction > a {

}
.slider_wrapper .lSAction > .lSPrev {

}
.slider_wrapper .lSAction > .lSNext {

}