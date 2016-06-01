functions.php
-------------


add_action( 'admin_head', 'fb_add_tinymce' );
function fb_add_tinymce() {
    global $typenow;

    // Only on Post Type: post and page
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;

    add_filter( 'mce_external_plugins', 'fb_add_tinymce_plugin' );
    // Add to line 1 form WP TinyMCE
    add_filter( 'mce_buttons', 'fb_add_tinymce_button' );
}

// Inlcude the JS for TinyMCE
function fb_add_tinymce_plugin( $plugin_array ) {

    $plugin_array['fb_test'] = THEME.'/admin/admin.js';
    // Print all plugin JS path
    return $plugin_array;
}

// Add the button key for address via JS
function fb_add_tinymce_button( $buttons ) {

    array_push( $buttons, 'fb_test_button_key' );
    // Print all buttons
    return $buttons;
}


function admin_scripts() {
    wp_enqueue_script( 'admin_script', THEME . '/admin/admin.js' );
}
add_action( 'admin_enqueue_scripts', 'admin_scripts' );






admin.js
--------


jQuery(document).ready(function($) {

    tinymce.PluginManager.add( 'fb_test', function( editor, url ) {

        // Add a button that opens a window
        editor.addButton( 'fb_test_button_key', {

            text: 'כפתור',
            icon: false,
            onclick: function() {
                // Open window
                editor.windowManager.open( {
                    title: 'כפתור',
                    body: [
                    {
                        type: 'textbox',
                        name: 'title',
                        label: 'כותרת'
                    },
                    {
                        type: 'textbox',
                        name: 'subtitle',
                        label: 'כותרת משנה'
                    }
                    ],
                    onsubmit: function( e ) {
                        // Insert content when the window form is submitted
                        editor.insertContent( '[button title="'+e.data.title+'" subtitle="'+e.data.title+'"]' );

                    }

                } );
            }

        } );

    } );

});