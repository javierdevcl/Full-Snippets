<div class="share">
	<span class="text"><?php _e('ùúó', 'theme');?></span>
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID);?>" target="_blank">
		<i class="fa fa-facebook"></i>
		<span class="screen-reader-text"><?php _e('Share on Facebook', 'theme');?></span>	
	</a>
	<a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink($post->ID);?>" target="_blank">
		<i class="fa fa-twitter"></i>
		<span class="screen-reader-text"><?php _e('Share on Twitter', 'theme');?></span>
	</a>
	<a href="https://plus.google.com/share?url=<?php echo get_permalink($post->ID);?>" target="_blank">
		<i class="fa fa-google-plus"></i>
		<span class="screen-reader-text"><?php _e('Share on Google Plus', 'theme');?></span>
	</a>
	<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink($post->ID);?> &title=<?php the_title();?>" target="_blank">
		<i class="fa fa-linkedin"></i>
		<span class="screen-reader-text"><?php _e('Share on Linked-In', 'theme');?></span>
	</a>
</div>