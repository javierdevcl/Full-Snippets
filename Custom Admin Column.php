<?php
ADDING ACF: http://justintadlock.com/archives/2011/06/27/custom-columns-for-custom-post-types

IN TERM

// Add to admin_init function

add_filter("manage_edit-city_cat_columns", 'theme_columns'); 
 
function theme_columns($theme_columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name' => __('Name'),
        'description' => __('Description'),
        'slug' => __('Slug'),
        'posts' => __('Posts'),
        'cat_image' => __('Image')
        );
    return $new_columns;
}

// Add to admin_init function   

add_filter("manage_city_cat_custom_column", 'manage_theme_columns', 10, 3);
 
function manage_theme_columns($out, $column_name, $term_id) {
    $term = get_term($term_id, 'city_cat');
    switch ($column_name) {
        case 'cat_image': 
            // get header image url
            $image = get_field('category_image','city_cat_'.$term->term_id);
            $out .= "<img src=\"{$image['url']}\" width=\"100\" height=\"50\"/>"; 
            break;
 
        default:
            break;
    }
    return $out;    
}