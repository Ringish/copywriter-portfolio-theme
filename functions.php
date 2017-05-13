<?php

// Featured image support
add_theme_support( 'post-thumbnails' ); 

// Scripts & Styles
function cw_enqueue_scripts() {
        wp_enqueue_style( 'cw_screen', get_template_directory_uri() . '/dist/styles/screen.min.css' );

}

add_action( 'wp_enqueue_scripts', 'cw_enqueue_scripts' );
?>