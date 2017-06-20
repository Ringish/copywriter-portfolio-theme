<?php
// Custom logo
add_theme_support( 'custom-logo' );

// Customizer
require get_template_directory() . '/inc/customizer.php';

// Register menu
function main_menus() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'main_menus' );

// Enqueue styles and scripts
function add_theme_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri().'/dist/styles/theme.min.css', array(), time() );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/scripts/main.min.js', array ( 'jquery' ), time(), true);

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

?>