<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style('google/Merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:400,900i', false, null);

    wp_enqueue_style( 'radcliffe_child_style', get_stylesheet_directory_uri() . '/style.css', array( 'radcliffe_style' ) );
}


