define ('THEME', get_template_directory_uri());
define('CHILD', get_stylesheet_directory_uri());

function sweethome_child_enqueue() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, THEME . '/style.css' );
    wp_enqueue_style( 'child-style', CHILD . '/style.css', array( $parent_style ));
    wp_enqueue_script( 'script', CHILD . '/js/script.js', array('jquery'), NULL, true );
}

add_action( 'wp_enqueue_scripts', 'sweethome_child_enqueue' );

style.css

/*
Theme Name: SweetHome Child
Author: Faton
Description: Sweethome - Responsive Real Estate WordPress Theme
Version: 1.0.0
Template: sweethome
Text Domain: swh
*/

@import url("../sweethome/style.css");
