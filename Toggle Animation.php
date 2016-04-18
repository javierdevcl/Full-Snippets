jQuery(".details_btn").toggle(
	function(){
		jQuery(".details_hide").animate({
			marginRight:0
		});
	},function(){
		jQuery(".details_hide").animate({
			marginRight:"-100%"
		});
	}
);



jQuery('.fixed_socials .fb_btn').toggle( 
	function() {
		jQuery('.facebook_page').animate({
			opacity:1,
			left:'61px'
		});
		jQuery('.facebook_page').addClass('show');
	},
	function() {
		jQuery('.facebook_page').animate({
			opacity:0,
			left:0
		}, 500, function() 
			{ 
				jQuery('.facebook_page').removeClass('show');  // ANIMATE COMPLETE
			}
		);
	}
);