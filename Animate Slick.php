- animate.css
- all .caption classes needs to have .hidden class, except the first one 

function slider_animate() {
    jQuery('.slider').on('afterChange', function(event, slick, currentSlide){
        jQuery('.slick-active .caption').removeClass('hidden');
        jQuery('.slick-active .caption').addClass('animated slideInUp');
    });

    jQuery('.slider').on('beforeChange', function(event, slick, currentSlide){
        jQuery('.slick-active .caption').removeClass('animated slideInUp');
        jQuery('.slick-active .caption').addClass('hidden');
    });
}