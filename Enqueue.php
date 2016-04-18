function theme_name_scripts() {
	//wp_enqueue_style( 'kube_rtl', THEME . '/css/kube_ltr.css' ); 
    //wp_enqueue_style( 'kube_rtl', THEME . '/css/kube_rtl.css' ); 
    wp_enqueue_style( 'lightSlider', THEME . '/css/lightSlider.css' );  
    wp_enqueue_style( 'fancybox', THEME . '/js/fancybox/jquery.fancybox.css?v=2.1.5' );
    wp_enqueue_style( 'jsrollpane', THEME . '/css/jquery.jscrollpane.css' );
    //wp_enqueue_style( 'fancybox-buttons', THEME . '/js/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5' ); 
    //wp_enqueue_style( 'fancybox-thumbs', THEME . '/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7' ); 
    wp_enqueue_style( 'style', THEME . '/style.css' );
	//wp_enqueue_style( 'responsive', THEME . '/responsive.css' ); 
	
	//wp_enqueue_script( 'tinynav', THEME . '/js/tinynav.min.js', array(), NULL, true );
    //wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&language=iw', array(), NULL, false );  
    //wp_enqueue_script( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/jquery-ui.js', array('jquery'), NULL, true );  
    wp_enqueue_script( 'lightSlider', THEME . '/js/jquery.lightSlider.min.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'fancybox', THEME . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'mousewheel', THEME . '/js/jquery.mousewheel.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'jsrollpane', THEME . '/js/jquery.jscrollpane.min.js ', array('jquery'), NULL, true );
    //wp_enqueue_script( 'fancybox-buttons', THEME . '/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5', array(), NULL, true );
    //wp_enqueue_script( 'fancybox-thumbs', THEME . '/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7', array(), NULL, true );
    //wp_enqueue_script( 'fancybox-media', THEME . '/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5', array(), NULL, true );
    wp_enqueue_script( 'script', THEME . '/js/script.js', array('jquery'), NULL, true );
}