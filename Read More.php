function more_shortcode( $atts, $content = null ) {
    return '<a class="exp" href="#"> המשיכי לקרוא +</a><div class="more">' . $content . '</div>';
}
add_shortcode( 'more', 'more_shortcode' );

.more {
	display: none;
}

jQuery('.content_text a.exp').click(function(e) {
	e.preventDefault();
	jQuery('.more').slideToggle(300);
	jQuery(this).toggleClass('active');
	var text = jQuery(this).text();
	if(jQuery(this).hasClass('active')) {
	   text = text.replace("+", "-");
	   jQuery(this).text(text);
	}
	else {
	   text = text.replace("-", "+");
	   jQuery(this).text(text);
	}
 });
 
 // if used in category\term description 
 
 add_filter( 'term_description', 'do_shortcode' );