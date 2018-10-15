<?php
/*
Plugin Name:  Register VC Custom Post Types
Description:  This plugin registers the Annual Report and Special Report custom post types.
*/
add_action( 'init', function() {
    // Register Annual Report custom post type
    register_post_type( 'annual-report',
        array(
            'labels' => array(
                'name' => __( 'Annual Reports' ),
                'singular_name' => __( 'Annual Report' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
    // Register Special Report custom post type
    register_post_type( 'special-report',
        array(
            'labels' => array(
                'name' => __( 'Special Reports' ),
                'singular_name' => __( 'Special Report' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
} );
