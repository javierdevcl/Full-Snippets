<div class="sync_slider_wrapper wrpr">
   	<ul class="sync_slider wrpr">
		<?php	
			if( have_rows('gallery') ):	
				while ( have_rows('gallery') ) : the_row(); $image = get_sub_field('image');?>
					<?php if (!empty($image)): ?>							       				        
					<li data-thumb="<?php echo $image['sizes']['thumbnail'];?>">
						<div class="image_wrapper">
							<a class="fancybox" href="<?php echo $image['sizes']['gallery'];?>" rel="gallery">
								<img src="<?php echo $image['sizes']['gallery'];?>" />
							</a>
						</div>
					</li>
					<?php endif;
				endwhile;
			endif;
		?>					
   	</ul>
</div>

<?php 
	function sync_slider_shortcode($atts) {
	    ob_start();
	    get_template_part('inc/shortcode', 'sync_slider');
	    return ob_get_clean();
	}
	add_shortcode( 'sync_slider', 'sync_slider_shortcode' );
?>


jQuery(".fancybox").fancybox();

var sync_slider = jQuery('ul.sync_slider').lightSlider({
		gallery:true,
		item:1,
		loop:true,
		thumbItem:9,
		slideMargin:0,
		rtl: true,
		enableDrag: false,
		currentPagerPosition:'left',
		responsive : [
		{
			breakpoint:600,
			settings: {
				thumbItem:8,
			}
		},
		{
			breakpoint:480,
			settings: {
				thumbItem:6,
			}
		},
		{
			breakpoint:320,
			settings: {
				thumbItem:4,
			}
		}
	]
});


<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'lightSlider', get_stylesheet_directory_uri() . '/css/lightSlider.css', array(), '1.1.3' );
    wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/js/fancybox/jquery.fancybox.css', array(), '2.1.5' );

    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'lightSlider', get_stylesheet_directory_uri() . '/js/jquery.lightSlider.min.js', array('jquery'), '1.1.5', true );
    wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true );
}	

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );