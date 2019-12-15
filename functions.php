<?php
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

function register_theme_menus() {
    register_nav_menus( 
        array(
        'main-menu' =>  __( 'Main Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus' );

function rwp_theme_styles() {
    wp_enqueue_style( 'style_css', get_template_directory_uri() . '/css/dest/styles.min.css' );
}
add_action( 'wp_enqueue_scripts', 'rwp_theme_styles' );

function rwp_theme_js() {
    wp_enqueue_script( 'addthis_js', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57bf9929916c5dca', '', '', false );
	wp_enqueue_script( 'scripts_js', get_template_directory_uri() . '/js/dest/scripts.min.js', '', '', array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'rwp_theme_js' );
//Changing excerpt length
function get_excerpt(){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 105);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}
?>