<?php 
	global $redux;	
    
	if( get_field('bc_image')) {
	   $thumb_url_src = get_field('bc_image');
	}
	elseif ( is_category() && !empty($redux['category_bc']['url']) ) {
		$thumb_url_src = $redux['category_bc']['url'];
	}
	else {
		if(!empty($redux['default_bc']) ) {
			$thumb_url_src = $redux['default_bc']['url'];
		}
	}
?>

<div class="pagetitle_wrapper cf" style="background:url(<?php echo $thumb_url_src;?>) no-repeat top center;">
	<div class="pagewrap ">
		<h1 class="bc_page_title">
			<?php			
				if(is_category()) {
					single_cat_title();
				}
				elseif(is_page()) {
					echo get_the_title();
				}
			 	elseif(is_archive() && !is_tax()) {
			 		post_type_archive_title();
				}
				elseif(is_tax()) {
					single_term_title();
				}
				elseif(is_singular()) {
					single_post_title();
				}
				elseif (is_post_type_archive()) { 
					echo post_type_archive_title();
				}			
			?>
		</h1>

		<div class="breadcrumbs">
		    <?php     
		    if (function_exists('HAG_Breadcrumbs')) { HAG_Breadcrumbs(
		        array(
		            'separator'  => ' >> ',
		            'search_label' => __("תוצאות חיפוש","livnatmeir"),
		        )
		    );
		     } ?>  
		</div>
	</div>
</div>