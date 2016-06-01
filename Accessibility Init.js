function accessibility_init() {
    jQuery('.acc .letters a').click(function(e) {
        e.preventDefault();
        jQuery('html').css('font-size', jQuery(this).data('size'));
        jQuery('.acc .letters a').removeClass('active');
        jQuery(this).addClass('active');
    });

    accessibilityButtons();
}
