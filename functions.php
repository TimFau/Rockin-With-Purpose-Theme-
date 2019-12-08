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
    // wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' ); //
    // wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' ); //
    wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'blogstyle_css', get_template_directory_uri() . '/blogstyle.css' );
    wp_enqueue_style( 'category_css', get_template_directory_uri() . '/css/category.css' );
}
add_action( 'wp_enqueue_scripts', 'rwp_theme_styles' );

function rwp_theme_js() {
    // wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', '', '', array('jquery') );
    //wp_enqueue_script( 'blog_js', get_template_directory_uri() . '/js/blog.js', '', '', false );
    wp_enqueue_script( 'addthis_js', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57bf9929916c5dca', '', '', false );
    //wp_enqueue_script( 'sticky-kit_js', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js', '', '', array('jquery') );
	wp_enqueue_script( 'scripts_js', get_template_directory_uri() . '/js/scripts.js', '', '', array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'rwp_theme_js' );
// Changing excerpt length
function new_excerpt_length($length) {
return 11;
}
add_filter('excerpt_length', 'new_excerpt_length');
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>