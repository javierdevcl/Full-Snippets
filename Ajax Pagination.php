add_action( 'wp_ajax_nopri_ajax_pagination', 'ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'ajax_pagination' );

function ajax_function(action,data,callback){
    jQuery.post(
        MyAjax.ajaxurl,
        {
            action : action,
            data: data,
        },
        function( response ) {
            if(typeof callback != "undefined"){
                callback(response,data,action);
            }
        },
        'json'
    );
}

function ajax_pagination() {
	global $query,$cat,$posttype;

	$term_id  = isset($_POST["data"]["term_id"]) ? sanitize_text_field($_POST["data"]["term_id"]) : "";
	$taxonomy = isset($_POST["data"]["taxonomy"]) ? sanitize_text_field($_POST["data"]["taxonomy"]) : "";
	$paged    = isset($_POST["data"]["paged"]) ? sanitize_text_field($_POST["data"]["paged"]) : "";
	$posttype    = isset($_POST["data"]["post_type"]) ? sanitize_text_field($_POST["data"]["post_type"]) : "";

	if(!$term_id || !$taxonomy || !$paged){
		return;
	}
	$cat = get_term_by("id",$term_id,$taxonomy);

	$args = array(
		"post_type" => $posttype,
		"paged"	=> $paged,
		"tax_query" => array(
			array(
				"taxonomy"=>$taxonomy,
				"terms" => $term_id,
				"field"	=> "term_id"
			)
		)
	);

	set_query_var("paged", $paged);
	$query = new WP_Query($args);

	ob_start();

	get_template_part("inc/tabbed_posts");

	$posts = ob_get_clean();

	$response = array("result"=>$posts);

	echo json_encode($response);
    die();
}


TABBED POSTS

<?php
global $query,$cat,$posttype;

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                  
    <a href="<?php if(get_field('link')) the_field('link'); else the_permalink();?>" class="new-block" <?php echo get_field('link') ? 'target="_blank"' : ''?>>
        <div class="newsRoom_picWrapper">
            <?php the_post_thumbnail('post');?>
        </div>
        <div class="post_details">
            <h3 class="title"><?php the_title();?></h3>
            <div class="txt"><?php echo get_the_time('m.d.Y');?><?php echo get_field('by') ? " | By ".get_field('by') : '';?></div>
            <div class="con"><?php trim_words(22);?></div>
        </div>
    </a>
    
<?php endwhile; endif; wp_reset_query()?>

<div id="pagination" data-termid="<?php echo $cat->term_id;?>" data-tax="<?php echo $cat->taxonomy;?>" data-posttype="<?php echo $posttype;?>">
    <?php
        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
            'current' => max( 1, get_query_var('paged') ),      
            'total' => $query->max_num_pages,
            'prev_text'    => __('&lt'),
            'next_text'    => __('&gt'),
            'type'         => 'plain',
            'add_args'     => false
        ) );

    ?>   
</div>




BASIC TEMPLATE 

<div class="newroom-content">   
	<div class="container">
		<div class="newroom-in">
			<div class="new-left">
				<?php foreach ($cats as $cat): ?>    
					<div class="generalTabsScript_div">
						
						<div class="newsroomPageSonsWrapper" data-termid="<?php echo $cat->term_id;?>">
							
							<?php
								$posttype = 'post';
								$args = array(
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'term_id',
											'terms'    => $cat->term_id,
										),
									),
									'post_type'    => $posttype,
									'paged' =>  get_query_var( 'paged' )
								);

							?>
							<?php 
								$query = new WP_Query($args); 
								get_template_part("inc/tabbed_posts");
							?>
							

							<div class="clear"></div> 
						</div>

					</div>
				<?php endforeach ?>
			</div>
			<div class="new-right">
				<div class="newletter-block">

					<?php if(get_field('archive_cf_id', 'option')) echo do_shortcode('[contact-form-7 id="'.get_field('archive_cf_id', 'option').'"]');?>

					<div class="clear"></div>
				</div>
				<div class="archieve-block">
					<h5 class="title"><?php _e('Archive', 'theme');?></h5>
					<ul class="archive_ul">
						<?php $args = array(
							'type'            => 'monthly',
							'limit'           => '',
							'format'          => 'html', 
							'before'          => '',
							'after'           => '',
							'show_post_count' => false,
							'echo'            => 1,
							'order'           => 'DESC',
							'post_type'     => 'post'
						);
						wp_get_archives( $args ); ?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>