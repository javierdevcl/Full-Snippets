function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'" class="'.$l['language_code'].'"></a>';
        }
    }
}


<div class="langs">
	<?php language_selector_flags();?>
</div>