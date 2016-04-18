function reOrder(elToMove, elToAppendTo, elToGoBack) {
    jQuery(window).resize(function() {
        window_width = jQuery(window).innerWidth()+17;
        if(window_width <= 768) elToMove.appendTo(elToAppendTo);
        else elToMove.appendTo(elToGoBack);
    });
    jQuery(document).ready(function() {
        window_width = jQuery(window).innerWidth()+17;
        if(window_width <= 768) elToMove.appendTo(elToAppendTo);
    });
}

reOrder(
    jQuery('.home aside#sidebar'), 
    jQuery('.homepage_slider_wrapper').parent(), 
    jQuery('.home_content_row .col-sm-3.col-lg-3')
);
