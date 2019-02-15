<?php
/*
Plugin Name:  Register VC Custom Post Types
Description:  This plugin registers the Annual Reports and Published Reviews custom post types.
*/
add_action( 'init', function() {
    // Register Annual Report custom post type
    register_post_type( 'annual-reports',
        array(
            'labels' => array(
                'name' => __( 'Annual reports' ),
                'singular_name' => __( 'Annual report' )
            ),
            'public' => true,
            'has_archive' => true,
            //'rewrite' => ['slug', 'annual-reports']
        )
    );
    // Register Published Reviews custom post type
    register_post_type( 'published-reviews',
        array(
            'labels' => array(
                'name' => __( 'Published reviews' ),
                'singular_name' => __( 'Published review' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
    // Register News custom post type
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News posts' ),
                'singular_name' => __( 'News post' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
        )
    );
    // Register news letter custom post type
    register_post_type( 'newsletters',
        array(
            'labels' => array(
                'name' => __( 'Newsletter' ),
                'singular_name' => __( 'Newsletters' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
        )
    );
} );
