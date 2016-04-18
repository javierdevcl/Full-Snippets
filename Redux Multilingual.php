in options.php - $opt_name = 'redux_'.LANG;

in functions.php -

define('LANG', ICL_LANGUAGE_CODE);

function multi_redux() {
    global ${"redux_".LANG}, $redux;
    $redux = ${"redux_".LANG};    
}
add_action("init", "multi_redux");