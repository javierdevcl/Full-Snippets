function accessbilitty_letters() {
    jQuery('.acc .letters a').click(function(e) {
        e.preventDefault();
        jQuery('html').css('font-size', jQuery(this).data('size'));
        jQuery('.acc .letters a').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('body').attr('id', 'letters_' + jQuery(this).data('id'));
    });
}

function accessibility_init() {
    accessbilitty_letters();
    accessibility_buttons();
}

<div class="acc clearfix desktop_only">
	<div class="letters">
		<a href="#" class="large transition" data-size="25px" data-id="large"><?php _e('א', 'theme');?></a>
		<a href="#" class="medium transition active" data-size="20px" data-id="medium"><?php _e('א', 'theme');?></a>
		<a href="#" class="small transition" data-size="15px" data-id="small"><?php _e('א', 'theme');?></a>
	</div>
	
	<button class="contrast sprite js-acessibility" aria-label="Add Contrast" id="accessibility-contrast"></button>
</div>