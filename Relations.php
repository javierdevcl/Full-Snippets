<?php       

    $args = array( 'post_type' => 'testimonial', 'posts_per_page' => -1 );
                
    if(is_singular("events")){
        $args["meta_query"][] = array("key"=>"advertizer_link","value"=>$post->ID,"compare"=>"LIKE");
    }
    
    $query = new WP_Query( $args );

?>

<?php if($query->have_posts()) :?>