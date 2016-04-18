/* GALLERY CSS */
.gallery_container {
	display: inline-block;
	width:100%;
}
.gallery_container ul.thumbs li {
	width:25%;
}
.gallery_container div.slideshow a.advance-link {
	width:100%;
	position: relative;
	display: inline-block;
}
.gallery_container div.content {
	width:100%;
	border:none;
	position: relative;
	padding:0;
}
.gallery_container div.slideshow span.image-wrapper {
	width:100%;
}
.gallery_container div.slideshow img {
	position: absolute;
	width:100%;
	height:100%;
	left:0;
}
.gallery_container div.slideshow,
.gallery_container div.slideshow-container {
	width:100%;
	display: inline-block;
	position: relative;
	height:253px;
}
.gallery_container div.slideshow a.advance-link {
	position: absolute;
	width:100%;
	height:100%;
}
.gallery_container div.slideshow span.image-wrapper {
	position: absolute;
	width:100%;
	height:100%;
}
.gallery_container ul.thumbs li {
	width:33.33%;
	margin:0;
}
.gallery_container a.thumb {
	border:none;
}
.gallery_container div#thumbs {
	display: inline-block;
}
.gallery_container ul.thumbs {
	display: inline-block;
	width:100%;
}

wp_enqueue_script( 'galleriffic', THEME . '/js/jquery.galleriffic.js', array(), NULL, true );
wp_enqueue_script( 'galleriffic-history', THEME . '/js/jquery.history.js', array(), NULL, true );
wp_enqueue_style( 'galleriffic', THEME . '/css/galleriffic-4.css' );  

ALL IN PAGE 

<?php if( have_rows('gallery_repeater') ):?>

	<div class="gallery_container">
		<div id="gallery" class="content">

			<div class="slideshow-container">
				<div id="loading" class="loader"></div>
				<div id="slideshow" class="slideshow"></div>
			</div>
		</div>

		<div id="thumbs" class="navigation">
			<ul class="thumbs">	
				<?php while ( have_rows('gallery_repeater') ) : the_row();?> 
					<?php 
					$image_object = get_sub_field('gallery_image');
					$thumb_url = $image_object['sizes']['gallery_thumb'];
					$image_url = $image_object['sizes']['gallery'];
					$title = $image_object['title'];
					?>

					<li>
						<a class="thumb" name="leaf" href="<?php echo $image_url;?>" title="<?php echo $title;?>">
							<img src="<?php echo $thumb_url;?>" alt="<?php echo $title;?>" />
						</a>
					</li>
				<?php endwhile;?>	 
			</ul>
		</div>
	</div>

<?php endif; ?> 

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// We only want these styles applied when javascript is enabled
		jQuery('.gallery_container div.navigation').css({'width' : '100%', 'float' : 'none'});
		jQuery('.gallery_container div.content').css('display', 'block');

		// Initially set opacity on thumbs and add
		// additional styling for hover effect on thumbs
		var onMouseOutOpacity = 0.67;
		jQuery('#thumbs ul.thumbs li').opacityrollover({
			mouseOutOpacity:   onMouseOutOpacity,
			mouseOverOpacity:  1.0,
			fadeSpeed:         'fast',
			exemptionSelector: '.selected'
		});

		// Enable toggling of the caption
		var captionOpacity = 0.0;
		jQuery('#captionToggle a').click(function(e) {
			var link = $(this);
			
			var isOff = link.hasClass('off');
			var removeClass = isOff ? 'off' : 'on';
			var addClass = isOff ? 'on' : 'off';
			var linkText = isOff ? 'Hide Caption' : 'Show Caption';
			captionOpacity = isOff ? 0.7 : 0.0;

			link.removeClass(removeClass).addClass(addClass).text(linkText).attr('title', linkText);
			jQuery('#caption span.image-caption').fadeTo(1000, captionOpacity);
			
			e.preventDefault();
		});
		
		// Initialize Advanced Galleriffic Gallery
		var gallery = jQuery('#thumbs').galleriffic({
			delay:                     6000,
			numThumbs:                 15,
			preloadAhead:              10,
			enableTopPager:            false,
			enableBottomPager:         false,
			maxPagesToShow:            7,
			imageContainerSel:         '#slideshow',
			controlsContainerSel:      '#controls',
			captionContainerSel:       '#caption',
			loadingContainerSel:       '#loading',
			renderSSControls:          false,
			renderNavControls:         false,
			enableHistory:             true,
			autoStart:                 false,
			syncTransitions:           true,
			defaultTransitionDuration: 0,
			onSlideChange:             function(prevIndex, nextIndex) {
				// 'this' refers to the gallery, which is an extension of $('#thumbs')
				this.find('ul.thumbs').children()
					.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
					.eq(nextIndex).fadeTo('fast', 1.0);
			},
			onTransitionOut:           function(slide, caption, isSync, callback) {
				slide.fadeTo(this.getDefaultTransitionDuration(isSync), 0.0, callback);
				caption.fadeTo(this.getDefaultTransitionDuration(isSync), 0.0);
			},
			onTransitionIn:            function(slide, caption, isSync) {
				var duration = this.getDefaultTransitionDuration(isSync);
				slide.fadeTo(duration, 1.0);
				
				// Position the caption at the bottom of the image and set its opacity
				var slideImage = slide.find('img');
				caption.width(slideImage.width())
					.css({
						'bottom' : Math.floor((slide.height() - slideImage.outerHeight()) / 2),
						'left' : Math.floor((slide.width() - slideImage.width()) / 2) + slideImage.outerWidth() - slideImage.width()
					})
					.fadeTo(duration, captionOpacity);
			},
			onPageTransitionOut:       function(callback) {
				this.fadeTo('fast', 0.0, callback);
			},
			onPageTransitionIn:        function() {
				this.fadeTo('fast', 1.0);
			},
			onImageAdded:              function(imageData, $li) {
				jQueryli.opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
			}
		});

		/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

		// PageLoad function
		// This function is called when:
		// 1. after calling $.historyInit();
		// 2. after calling $.historyLoad();
		// 3. after pushing "Go Back" button of a browser
		function pageload(hash) {
			// alert("pageload: " + hash);
			// hash doesn't contain the first # character.
			if(hash) {
				jQuery.galleriffic.gotoImage(hash);
			} else {
				gallery.gotoIndex(0);
			}
		}

		// Initialize history plugin.
		// The callback is called at once by present location.hash. 
		jQuery.historyInit(pageload, "advanced.html");

		// set onlick event for buttons using the jQuery 1.3 live method
		jQuery("a[rel='history']").on('click', function(e) {
			
			if (e.button != 0) return true;

			var hash = this.href;
			hash = hash.replace(/^.*#/, '');
							
			// moves to a new page. 
			// pageload is called at once. 
			// hash don't contain "#", "?"
			jQuery.historyLoad(hash);

			return false;
		});
	});
</script>