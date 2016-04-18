    // tabs
        jQuery(".tabs a").click(function(e) {
            e.preventDefault();
            jQuery(this).addClass('current');
            jQuery(this).siblings().removeClass('current');
            var tab = jQuery(this).attr('href');
            jQuery('.tab_content').not(tab).css('display', 'none');
            jQuery(tab).fadeIn();
        });
		

	<div class="tabs clearfix">
		<a href="#tab_1" class="current"><?php _e('Tab 1', 'einat');?></a>
		<a href="#tab_2"><?php _e('Tab 2', 'einat');?></a>
		<a href="#tab_3"><?php _e('Tab 3', 'einat');?></a>
	</div>
	<div id="info">
		<div id="tab_1" class="tab_content"><?php the_field('content_tab_1');?></div>
		<div id="tab_2" class="tab_content"><?php the_field('content_tab_2');?></div>
		<div id="tab_3" class="tab_content"><?php the_field('content_tab_3');?></div>
	</div>
	
	
	


	
	
	
	<?php if(get_field('components') || get_field('kosher') || get_field('values')):?>
	<div id="product_extra_info">
		<div class="tabs clearfix">
			<?php if(get_field('components')):?>
				<a class="tab before_icon components trans current" href="#tab_1"><?php _e('Components', 'einat');?></a>
			<?php endif;?>
			<?php if(get_field('kosher')):?>
				<a class="tab before_icon kosher trans<?php if(!get_field('components')) echo ' current';?>" href="#tab_2"><?php _e('Kosher', 'einat');?></a>
			<?php endif;?>
				<?php if(get_field('values')):?>
				<a class="tab before_icon values trans<?php if(!get_field('components') && !get_field('kosher')) echo ' current';?>" href="#tab_3"><?php _e('Nutrition', 'einat');?></a>
			<?php endif;?>
		</div>
		<div id="info">
			<?php if(get_field('components')):?><div id="tab_1" class="tab_content"><?php the_field('components');?></div><?php endif;?>
			<?php if(get_field('kosher')):?><div id="tab_2" class="tab_content"><?php the_field('kosher');?></div><?php endif;?>
			<?php if(get_field('values')):?><div id="tab_3" class="tab_content"><?php the_field('values');?></div><?php endif;?>
		</div>
	</div>
<?php endif;?>