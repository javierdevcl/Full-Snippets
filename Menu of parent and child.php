<?php 

$query = get_queried_object();

if($post->post_parent){
	//child 
    $children = wp_list_pages('sort_column=menu_order&title_li=&child_of='.$post->post_parent.'&echo=0'); 
    $parent_title = get_the_title($post->post_parent);
	$parent_url = get_permalink($post->post_parent);
	$current = '';

} else {
	//parent
    $children = wp_list_pages('sort_column=menu_order&title_li=&child_of='.$post->ID.'&echo=0');
    $parent_title = get_the_title($post->ID);
    $parent_url = get_permalink($post->ID);
    $current = 'class=current_page_item';
}




?>

<?php if ($children) : ?>

    <div class="widget">

        <ul class="family_menu">
			<li <?php echo $current;?>><a href="<?php echo $parent_url;?>"><?php echo $parent_title; ?></a></li>
            <?php echo $children; ?>
        </ul>

    </div>

<?php endif; ?>