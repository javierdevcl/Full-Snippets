// IMAGES
---------

jQuery(".fancybox").fancybox();

<a class="fancybox" rel="group" href="big_image_1.jpg"><img src="small_image_1.jpg" alt="" /></a>

OPTIONAL:
<?php $image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) ,'large');?>
<a class="fancybox" rel="group" href="<?php echo $image_src[0];?>"><?php the_post_thumbnail();?></a>	

// YOUTUBE
----------

jQuery(".various").fancybox({
	maxWidth	: 800,
	maxHeight	: 600,
	fitToView	: false,
	width		: '70%',
	height		: '70%',
	autoSize	: false,
	closeClick	: false,
	openEffect	: 'none',
	closeEffect	: 'none'
});

<a class="various fancybox.iframe" href="https://www.youtube.com/embed/<?php the_field('youtube_id');?>?autoplay=1">
	<img class="youtube_img" src="https://img.youtube.com/vi/<?php the_field('youtube_id');?>/hqdefault.jpg">
</a>


// POPUP
----------

<a href="#popup_1>" class="management-block fancybox">

<div id="popup_1">Lorem Ipsum</div>

jQuery('.fancybox').fancybox({
	minWidth: 800,
	maxWidth: 800,
	minHeight: 600,
	openEffect  : 'elastic',
	closeEffect : 'elastic',
	helpers: {
		overlay: {
		  locked: false
		}
	}
});














Sub gallery

<div class="row">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $images = get_field('gallery');?>
		<div class="col-md-4 col-sm-6">
			<div class="gallery_wrap gallery_<?php echo $post->ID;?>">
				<a href="<?php echo $images[0]['sizes']['large'];?>" class="fancybox" rel="gallery_<?php echo $post->ID;?>">
					<div class="image_wrap">
						<?php post_thumb('sec_1_post');?>
					</div>
					<h2><?php the_title();?></h2>
				</a>
			</div>
		</div>

		<?php foreach ($images as $key => $image) : if ($key != 0) : ?>
			<a class="fancybox" href="<?php echo $image['sizes']['large'];?>" rel="gallery_<?php echo $post->ID;?>"></a>
		<?php endif; endforeach;
	endwhile;?>
</div>
