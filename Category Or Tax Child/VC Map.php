<?php 
//functions.php
define ('VC_MAP', 'admin/vc/module/map');
define ('VC_VIEW', '/admin/vc/view/view');

get_template_part( VC_NAP, 'courses_of_study' );

//map-courses_of_study.php (creates the fields)

<?php 

add_shortcode( 'courses_of_study', 'courses_of_study_func' );
function courses_of_study_func( $atts, $content = null) {
   $content          = wpb_js_remove_wpautop($content, true);
   $data             = array();
   $data['title']    = !empty($atts['title']) ? $atts['title'] : '';
   $data['content']  = $content;
   $data['image']    = !empty($atts['image']) ? wp_get_attachment_image_src( $atts['image'], 'icon' ) : '';
   $data['image']    = !empty($data['image'][0]) ? $data['image'][0] : '';

   set_query_var('data', $data);

   ob_start();
   
   get_template_part(VC_MAP, 'courses_of_study');

   return ob_get_clean();
}

add_action( 'vc_before_init', 'courses_of_study_integrateWithVC' );
function courses_of_study_integrateWithVC() {
   vc_map( array(
      "name" => __( "Courses of Study", "theme" ),
      "base" => "courses_of_study",
      "class" => "",
      "category" => __( "Content", "theme"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Title", "theme" ),
            "param_name" => "title",
            "value" => __( "Default param value", "theme" ),
         ),
         array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Icon", "theme" ),
            "param_name" => "image",
            "value" => __( "Default param value", "theme" ),
         ),
         array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Links", "theme" ),
            "param_name" => "content",
            "value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "theme" ),
         )
      )
   ) );
}

//view-courses_of_study.php (print the fields)

<?php get_query_var( 'data', $data );?>

<div class="courses_of_study_wrapper">
	<span class="course_icon">
		<img src="<?php echo $data['image'];?>" alt="<?php echo $data['title'];?>">
	</span>
	<span class="course_info">
		<h3><?php echo $data['title'];?></h3>
		<div class="links">
			<?php echo $data['content'];?>
		</div>
	</span>
</div>


