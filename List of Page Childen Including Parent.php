<?php
	if($post->post_parent) $parent_id=$post->post_parent; else $parent_id=$post->ID;
	$pages = get_pages(array('child_of'=>$parent_id,'sort_column'=>'menu_order'));
?>
<div class="pages">
	<div class="pagewrap">
		<ul class="pagelist clearfix">
			<li><a href="<?php echo get_permalink($parent_id);?>"><?php echo get_the_title($parent_id);?></a></li>
			<?php foreach ($pages as $page): ?>
				<li<?php if($post->ID == $page->ID) { echo " class='current_page'"; };?>>
					<a href="<?php echo get_permalink($page->ID);?>"><h2><?php echo $page->post_title;?></h2></a>
				</li>	
			<?php endforeach ?>
		</ul>
	</div>
</div>
<?php get_footer();?>