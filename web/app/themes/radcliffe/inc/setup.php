<?php

/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */

if (!function_exists('radcliffe_setup')) {

    function radcliffe_setup()
    {

        // Automatic feed
        add_theme_support('automatic-feed-links');

        // Post thumbnails
        add_theme_support('post-thumbnails', getPostTypesWithFeaturedImage());

        add_image_size('post-image', 1440, 810, array('center', 'center'));

        add_image_size('accordion-icon', 102, 100);
        add_image_size('accordion-icon-medium', 80, 79);
        add_image_size('accordion-icon-small', 51, 50);

        // Add nav menu
        register_nav_menu('primary', __('Primary Menu', 'radcliffe'));

        // Add title tag support
        add_theme_support('title-tag');

        // Make the theme translation ready
        load_theme_textdomain('radcliffe', get_template_directory() . '/languages');

        // Set content width
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 740;
        }

        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if (is_readable($locale_file)) {
            require_once($locale_file);
        }
    }

    add_action('after_setup_theme', 'radcliffe_setup');
}


/* ---------------------------------------------------------------------------------------------
ENQUEUE SCRIPTS
--------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_load_javascript_files')) {

    function radcliffe_load_javascript_files()
    {
        if (!is_admin()) {
            wp_enqueue_script(
                'radcliffe_global',
                get_template_directory_uri() . '/js/global.js',
                array('jquery'),
                '',
                true
            );
            if (is_singular()) {
                wp_enqueue_script('comment-reply');
            }
        }
    }

    add_action('wp_enqueue_scripts', 'radcliffe_load_javascript_files');
}


/* ---------------------------------------------------------------------------------------------
ENQUEUE STYLES
--------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_load_style')) {

    function radcliffe_load_style()
    {
        if (!is_admin()) {
            $dependencies = array();

            /**
             * Translators: If there are characters in your language that are not
             * supported by the theme fonts, translate this to 'off'. Do not translate
             * into your own language.
             */
            $google_fonts = _x('on', 'Google Fonts: on or off', 'radcliffe');

            if ('off' !== $google_fonts) {
                wp_enqueue_style(
                    'radcliffe_googlefonts',
                    'https://fonts.googleapis.com/css?family=Barlow:300,300i,400,400i,500,500i,600,600i,700,700i|Merriweather:300,300i,400,400i,700,700i,900,900i',
                    false,
                    null
                );
                $dependencies[] = 'radcliffe_googlefonts';
            }

// Append date style.css was modified to stylesheet URI for cache-busting
            $styleFilePath = get_template_directory() . '/style.css';
            $styleFileModificationDate = filemtime($styleFilePath);

            wp_enqueue_style(
                'radcliffe_style',
                get_template_directory_uri() . '/style.css',
                $dependencies,
                $styleFileModificationDate
            );
        }
    }

    add_action('wp_print_styles', 'radcliffe_load_style');
}


/* ---------------------------------------------------------------------------------------------
ADD EDITOR STYLES
--------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_add_editor_styles')) {

    function radcliffe_add_editor_styles()
    {
        add_editor_style('radcliffe-editor-style.css');

        /**
         * Translators: If there are characters in your language that are not
         * supported by the theme fonts, translate this to 'off'. Do not translate
         * into your own language.
         */
        $google_fonts = _x('on', 'Google Fonts: on or off', 'radcliffe');

        if ('off' !== $google_fonts) {
            $font_url = '//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic,800|Crimson+Text:400,400italic,700,700italic';
            add_editor_style(str_replace(',', '%2C', $font_url));
        }
    }

    add_action('init', 'radcliffe_add_editor_styles');
}


/* ---------------------------------------------------------------------------------------------
ADD FOOTER WIDGET AREAS
--------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_widget_areas_registration')) {

    function radcliffe_widget_areas_registration()
    {

        register_sidebar(array(
            'name' => __('Footer A', 'radcliffe'),
            'id' => 'footer-a',
            'description' => __('Widgets in this area will be shown in the left column in the footer.', 'radcliffe'),
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
            'after_widget' => '</div><div class="clear"></div></div>'
        ));

        register_sidebar(array(
            'name' => __('Footer B', 'radcliffe'),
            'id' => 'footer-b',
            'description' => __('Widgets in this area will be shown in the middle column in the footer.', 'radcliffe'),
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
            'after_widget' => '</div><div class="clear"></div></div>'
        ));
    }

    add_action('widgets_init', 'radcliffe_widget_areas_registration');

}

add_action('init', function () {
    add_image_size('report', 200);

    add_image_size('archive-news', 600, 337, array('center', 'center'));

    add_image_size('archive-news-preview', 200, 200, array('center', 'center'));
});

add_action('admin_menu', function () {
    remove_menu_page('edit.php');
});
