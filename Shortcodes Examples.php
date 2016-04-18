<?php

// Product tax menu

function qs_tax_menu( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'posts' => '-1',
		), $atts )
	); ?>

<ul class="products_menu">
		<?php

		$term_query = get_queried_object();
		$args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'id',
					'terms'    => $term_query->term_id,
				),
			),
			'post_type'	=> 'product',
			'posts_per_page' => $posts
		);
		
		$query = new WP_Query($args); 
		if ( $query->have_posts() ) : 
			while ( $query->have_posts() ) : $query->the_post(); ?>

				<li class="term_<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
		
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>

</ul>

<?php
}
add_shortcode( 'tax_menu', 'qs_tax_menu' );

DONT FORGET IN FUNCTIONS.PHP
require_once( dirname( __FILE__ ) . '/admin/widgets.php' );
add_filter('widget_text', 'do_shortcode');




function ask_shortcode( $atts, $link = null ) {
    return '<a class="ask" href="'. $link . '"></a>';
}
add_shortcode( 'ask', 'ask_shortcode' );
add_filter('widget_text', 'do_shortcode');