<!-- Responsive Menu -->

1. Design the menu
2. Hide the menu wrapper at 767px
3. header.php -> Button "Menu" (in textdomain) - hide in style CSS, show in 767px
4. jQuery slideToggle the menu wrapper`

<!-- CSS -->
#res_menu {
	display: none; /* inline-block in responsive
	width:100%;
	text-align: center;
}
#res_menu span {
	background:url(img/icon_menu.png) left no-repeat;
	background-size:36px;
	font-size:36px;
	padding-left:40px;
	cursor:pointer;
}

	
<!-- jQuery -->
jQuery(document).ready(function() { /* IF NEEDED
	jQuery('#res_menu span').click(function(){
 		jQuery('.menu_wrapper').slideToggle();
 	});
});
	
<!-- HTML -->
<div id="res_menu"><span><?php _e('Menu', 'text_domain');?></span></div>