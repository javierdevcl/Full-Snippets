<?php 
//get hidden content 
function get_hidden_content() {
    if ( get_field('hidden_content')) {
        $hidden_content = get_field('hidden_content');
        return $hidden_content;
    }
    elseif ( is_tax() || is_category() ) {
        $queried_object = get_queried_object(); 
        $taxonomy       = $queried_object->taxonomy;
        $term_id        = $queried_object->term_id;
        if(get_field('hidden_content', $taxonomy.'_'.$term_id)) {
            $hidden_content = get_field('hidden_content', $taxonomy.'_'.$term_id);
            return $hidden_content;
        }
        elseif(get_field('default_categories_hidden_content', 'option')) {
            $hidden_content = get_field('default_categories_hidden_content', 'option');
            return $hidden_content;
        }
    } 

    if ( !isset($hidden_content) && get_field('default_hidden_content', 'option') ) {
        return get_field('default_hidden_content', 'option');
    }
}
;?>

<script>
function hiddenContent() {
    jQuery('.hidden_content_trigger').click(function() {
        jQuery(this).find('i').toggleClass('fa-plus').toggleClass('fa-minus');
        jQuery('.hidden_content').slideToggle();
        jQuery('html, body').animate({scrollTop:jQuery(document).height()}, 'slow');
    });
}
</script>

<?php if(get_hidden_content()):?>
	<div class="hidden_content_trigger sprite"><i class="fa fa-plus"></i></div>
<?php endif;?>
					
<?php if(get_hidden_content()):?>
	<div class="hidden_content">
		<div class="container">
			<?php echo get_hidden_content();?>
		</div>
	</div>
<?php endif;?>