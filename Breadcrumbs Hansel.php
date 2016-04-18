	<div class="breadcrumbs">
		<?php     
			if(!is_singular('product')) {
			    if (function_exists('HAG_Breadcrumbs')) { HAG_Breadcrumbs(
			        array(
			            'separator'  => '<span class="bc_sep"> » </span>',
			            'search_label' => __('תוצאות חיפוש','TEXTDOMAIN'),
			            '404_label' => __('404 - העמוד אינו נמצא','TEXTDOMAIN'),
			        )
				);
			}
		} ?> 
		
		<?php if(is_singular('product')):
			$terms = get_the_terms($post, 'product_cat');
			
			foreach ($terms as $term) {
				if($term->parent) {
					$parent = get_term_by( 'id', $term->parent, 'product_cat' );
					break;
				}
			}

		?>
			<p id="breadcrumbs" itemprop="breadcrumb">
				<a href="<?php echo home_url();?>"><?php _e('דף הבית ', 'theme');?></a>
				<span class="bc_sep"> » </span>
				<a href="<?php echo get_post_type_archive_link('product');?>"><?php _e('מוצרים', 'theme');?></a>
				<?php if($parent):?>
				<span class="bc_sep"> » </span>
				<a href="<?php echo get_term_link($parent);?>"><?php echo $parent->name;?></a>
				<?php endif;?>
				<span class="bc_sep"> » </span>
				<a href="<?php echo get_term_link($term);?>"><?php echo $term->name;?></a>
				<span class="bc_sep"> » </span>
				<span class="current"><?php the_title();?></span>
			</p>
		<?php endif;?>
	</div>