<div class="share_post">   
	<?php $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) ,'medium');?>
	<a class="facebook_icon sprite_socials" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" href="#" target="_blank"></a>
	<a class="twitter_icon sprite_socials" href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>" target="_blank"></a>
	<a class="linkedin_icon sprite_socials" href="https://www.linkedin.com/cws/share?url=<?php the_permalink();?>" target="_blank"></a>
	<a class="pinterest_icon sprite_socials" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo $thumbnail_src[0];?>&description=<?php the_title();?>" target="_blank"></a>
	<a class="email_icon sprite_socials" href="mailto:?subject=<?php _e('Link to a post in Multilock Website', 'textdomain');?> - <?php the_title();?>&body=<?php the_permalink;?>" target="_blank"></a>
</div>