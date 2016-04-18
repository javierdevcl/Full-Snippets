<?php 

function get_sites_by_region($region_id){
    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'region_cat',
                'field'    => 'term_id',
                'terms'    => $region_id,
            ),
        ),
        'post_type'    => 'site',
        'posts_per_page' => -1,
    );

    $posts = get_posts($args);

    $post__in = array();
    if($posts){
        foreach($posts as $post){
            $post__in[] = $post->ID;
        }
    }

    return $post__in;
}


<?php 

global $product_cat_id, $region_cat_id,$wpdb;

$args = array(
    'post_type'    => 'product',
    'posts_per_page' => -1,
);

if($product_cat_id){
     $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $product_cat_id,
            ),
     );

}
if($region_cat_id){
    $sites = get_sites_by_region($region_cat_id);


    if($sites){
        $sql = "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='sites' AND (";
        foreach($sites as $site_id){
            $and[] = " meta_value LIKE '%\"{$site_id}\"%' ";
        }
        $sql = $sql.implode(" OR ",$and);
        $sql.=")";
  
        $results = $wpdb->get_results($sql);

        if($results){
            foreach($results as $post_id){
                $post__in[] = $post_id->post_id;
            }
            $args["post__in"] = $post__in;
        }
    }
}