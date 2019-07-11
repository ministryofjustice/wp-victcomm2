<?php
/* ---------------------------------------------------------------------------------------------
SPECIFY GUTENBERG SUPPORT
------------------------------------------------------------------------------------------------ */


if (!function_exists('radcliffe_add_gutenberg_features')) :

    function radcliffe_add_gutenberg_features()
    {

        /* Gutenberg Feature Opt-Ins --------------------------------------- */

        add_theme_support('align-wide');

        /* Gutenberg Palette --------------------------------------- */

        $accent_color = get_theme_mod('accent_color') ? get_theme_mod('accent_color') : '#ca2017';

        add_theme_support('editor-color-palette', array(
            array(
                'name' => _x('Accent', 'Name of the accent color in the Gutenberg palette', 'radcliffe'),
                'slug' => 'accent',
                'color' => $accent_color,
            ),
            array(
                'name' => _x('Black', 'Name of the black color in the Gutenberg palette', 'radcliffe'),
                'slug' => 'black',
                'color' => '#222',
            ),
            array(
                'name' => _x('Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'radcliffe'),
                'slug' => 'dark-gray',
                'color' => '#444',
            ),
            array(
                'name' => _x('Medium Gray', 'Name of the medium gray color in the Gutenberg palette', 'radcliffe'),
                'slug' => 'medium-gray',
                'color' => '#666',
            ),
            array(
                'name' => _x('Light Gray', 'Name of the light gray color in the Gutenberg palette', 'radcliffe'),
                'slug' => 'light-gray',
                'color' => '#888',
            ),
            array(
                'name' => _x('White', 'Name of the white color in the Gutenberg palette', 'radcliffe'),
                'slug' => 'white',
                'color' => '#fff',
            ),
        ));

        /* Gutenberg Font Sizes --------------------------------------- */

        add_theme_support('editor-font-sizes', array(
            array(
                'name' => _x('Small', 'Name of the small font size in Gutenberg', 'radcliffe'),
                'shortName' => _x('S', 'Short name of the small font size in the Gutenberg editor.', 'radcliffe'),
                'size' => 16,
                'slug' => 'small',
            ),
            array(
                'name' => _x('Regular', 'Name of the regular font size in Gutenberg', 'radcliffe'),
                'shortName' => _x('M', 'Short name of the regular font size in the Gutenberg editor.', 'radcliffe'),
                'size' => 18,
                'slug' => 'regular',
            ),
            array(
                'name' => _x('Large', 'Name of the large font size in Gutenberg', 'radcliffe'),
                'shortName' => _x('L', 'Short name of the large font size in the Gutenberg editor.', 'radcliffe'),
                'size' => 24,
                'slug' => 'large',
            ),
            array(
                'name' => _x('Larger', 'Name of the larger font size in Gutenberg', 'radcliffe'),
                'shortName' => _x('XL', 'Short name of the larger font size in the Gutenberg editor.', 'radcliffe'),
                'size' => 32,
                'slug' => 'larger',
            ),
        ));
    }

    add_action('after_setup_theme', 'radcliffe_add_gutenberg_features');

endif;


/* ---------------------------------------------------------------------------------------------
GUTENBERG EDITOR STYLES
--------------------------------------------------------------------------------------------- */


if (!function_exists('radcliffe_block_editor_styles')) :

    function radcliffe_block_editor_styles()
    {

        $dependencies = array();

        /**
         * Translators: If there are characters in your language that are not
         * supported by the theme fonts, translate this to 'off'. Do not translate
         * into your own language.
         */
        $google_fonts = _x('on', 'Google Fonts: on or off', 'radcliffe');

        if ('off' !== $google_fonts) {
            // Register Google Fonts
            wp_register_style(
                'radcliffe-block-editor-styles-font',
                '//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic,800|Crimson+Text:400,400italic,700,700italic|Abril+Fatface:400',
                false,
                1.0,
                'all'
            );
            $dependencies[] = 'radcliffe-block-editor-styles-font';

        }

        // Enqueue the editor styles
        wp_enqueue_style(
            'radcliffe-block-editor-styles',
            get_theme_file_uri('/radcliffe-gutenberg-editor-style.css'),
            $dependencies,
            '1.0',
            'all'
        );
    }

    add_action('enqueue_block_editor_assets', 'radcliffe_block_editor_styles', 1);

endif;
