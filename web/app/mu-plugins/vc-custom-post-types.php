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
                'name' => __( 'Annual Reports' ),
                'singular_name' => __( 'Annual Report' )
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
                'name' => __( 'Published Reviews' ),
                'singular_name' => __( 'Published Review' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
    // Register Special Report custom post type
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News Posts' ),
                'singular_name' => __( 'News Post' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
        )
    );
} );
