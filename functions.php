<?php
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

if (!is_admin()) add_action("wp_enqueue_scripts", 11);

function register_theme_menus() {
    register_nav_menus( 
        array(
        'main-menu' =>  __( 'Main Menu' )
        )
    );
}
add_action( 'init', 'register_theme_menus' );

function rwp_theme_styles() {
    wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.min.css' );
}
add_action( 'wp_enqueue_scripts', 'rwp_theme_styles' );

function rwp_theme_js() {
	wp_enqueue_script( 'scripts_js', get_template_directory_uri() . '/js/dest/scripts.min.js' );
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