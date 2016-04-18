<?php 
    for($i=1; $i<=4; $i++) { 
        if(is_active_sidebar('widget_'.$i)) { 
            dynamic_sidebar('widget_'.$i); 
        }
    };
?>

// register sidebar widgets

if (function_exists('register_sidebar')) {
    $sidebar_array = array(
        array('name'=>"פוטר - איזור ווידג'טים עליון",'id'=>'widgets_area_1'),
        array('name'=>"פוטר - איזור ווידג'טים תחתון",'id'=>'widgets_area_2'),
    );
    $i = 1;
    foreach($sidebar_array as $sidebar){
        register_sidebar(array(
            'name' => $sidebar['name'],
            'id' => $sidebar['id'],
            'description' => __("גרור ווידג'טים לכאן על מנת להוסיפם לפוטר", 'einat'),
            'before_widget' => '<div class="widget_'.$i.' footer_widget %2$s" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
        $i++;
    }
}



Sidebar\Footer Widgets 
<div class="footer_widgets">
	<?php if(is_active_sidebar('footer_widgets_area')) dynamic_sidebar('footer_widgets_area');?>
</div>
// Register Sidebar Widgets
if (function_exists('register_sidebar')) {
    $sidebar_array = array(
        array('name'=>'פוטר','id'=>'footer_widgets_area'),
    );
    $i = 1;
    foreach($sidebar_array as $sidebar){
        register_sidebar(array(
            'name' => $sidebar['name'],
            'id' => $sidebar['id'],
            'description' => __('גרור ווידגטים לכאן על מנת להוסיפם לפוטר', 'creditguard'),
            'before_widget' => '<div class="footer_widget col-lg-6" id="%1$s">',
            'after_widget'  => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ));
        $i++;
    }
}


OR SINGLE

<div class="footer_widgets">
	<?php if(is_active_sidebar('footer_widgets_area')) dynamic_sidebar('footer_widgets_area');?>
</div> 

register_sidebar(array(
    'name' => 'פוטר',
    'id' => 'footer_widgets_area',
    'description' => "גרור ווידג'טים לכאן על מנת להוסיפם לפוטר",
    'before_widget' => '<div class="footer_widget" id="%1$s">',
    'after_widget'  => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));