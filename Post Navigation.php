<?php 
	$prev_post = get_previous_post();
	$next_post = get_next_post();
?>

<div class="post_navigation clearfix">

	<?php if ( is_a( $prev_post , 'WP_Post' ) ) : ?>
		<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev">
			<span><?php _e('הקודם', 'diversity');?></span>
		</a>
	<?php endif;?>
	
	<?php if ( is_a( $next_post , 'WP_Post' ) ) : ?>
		<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next">
			<span><?php _e('הבא', 'diversity');?></span>
		</a>
	<?php endif;?>

</div>
