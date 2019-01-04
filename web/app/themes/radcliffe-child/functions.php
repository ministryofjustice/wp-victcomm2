<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style('google/Merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:400,900i', false, null);

    wp_enqueue_style( 'radcliffe_child_style', get_stylesheet_directory_uri() . '/style.css', array( 'radcliffe_style' ) );
}


/**
 * Filter the except length to 30 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Convert byte size to human readable
 *
 * @param $bytes
 *
 * @return string
 */
function convertByteSizeToHumanReadable($bytes) {
    error_log('convertByteSizeToHumanReadable');
    if ($bytes > 0)
    {
        $unit = intval(log($bytes, 1024));
        $units = array('B', 'KB', 'MB', 'GB');

        if (array_key_exists($unit, $units) === true)
        {
            return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
        }
    }

    return $bytes;
}

add_action('init', function() {
    add_image_size( 'report', 200);
});
