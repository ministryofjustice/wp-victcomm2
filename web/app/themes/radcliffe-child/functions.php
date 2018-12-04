<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style('google/Merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:400,900i', false, null);

    $parent_style = 'radcliffe_style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'radcliffe-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}

/**
 * Define where ACF settings file is located
 *
 * https://www.advancedcustomfields.com/resources/local-json/
 */
function acf_json_save_point( $path )
{
	// update path
	$path = WPMU_PLUGIN_DIR .  '/acf-json';

	return $path;
}
add_filter('acf/settings/save_json', __NAMESPACE__ . '\\acf_json_save_point');

/**
 * ACF schema now loaded from /mu-plugins/acf-json
 *
 * See acf_json_save_point for rationale.
 */
function acf_json_load_point( $paths )
{
	// remove original path
	unset($paths[0]);

	// append path
	$paths[] = WPMU_PLUGIN_DIR . '/acf-json';

	return $paths;
}
add_filter('acf/settings/load_json', __NAMESPACE__ . '\\acf_json_load_point');

