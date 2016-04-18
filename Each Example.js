jQuery(document).ready(function() {
	jQuery('a.tab').click(function(e) {
		e.preventDefault();
		tab_clicked_data = jQuery(this).data('tab');
		jQuery('.wrap').each(function() {
			if(jQuery(this).data('tab') == tab_clicked_data) {
				jQuery('.wrap').removeClass('show').addClass('hide');
				jQuery(this).addClass('show').removeClass('hide');
			}
		});
		
	});
});