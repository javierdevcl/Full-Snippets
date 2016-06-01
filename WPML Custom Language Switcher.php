function lang_menu_shortcode($atts) {
    ob_start();
    $languages = icl_get_languages('skip_missing=1');
        if(1 < count($languages)){
            foreach($languages as $l){
                if(!$l['active']) 
                    $langs[] = '<a href="'.$l['url'].'">'.$l['native_name'].'</a>';
            }
        echo join(', ', $langs);
    }
    return ob_get_clean();
}
add_shortcode( 'lang_menu', 'lang_menu_shortcode' );