<?php


/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_setup' ) ) {

	function radcliffe_setup() {

		// Automatic feed
		add_theme_support( 'automatic-feed-links' );

		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-image', 1440, 9999 );

        add_image_size( 'accordion-icon', 102, 100);
        add_image_size( 'accordion-icon-small', 51, 50);


		// Add nav menu
		register_nav_menu( 'primary', __( 'Primary Menu', 'radcliffe' ) );

		// Add title tag support
		add_theme_support( 'title-tag' );

		// Make the theme translation ready
		load_theme_textdomain( 'radcliffe', get_template_directory() . '/languages' );

		// Set content width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 740;

		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}

	}
	add_action( 'after_setup_theme', 'radcliffe_setup' );

}


/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_load_javascript_files' ) ) {

	function radcliffe_load_javascript_files() {

		if ( ! is_admin() ) {
			wp_enqueue_script( 'radcliffe_global', get_template_directory_uri() . '/js/global.js', array( 'jquery' ), '', true );
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'radcliffe_load_javascript_files' );

}


/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_load_style' ) ) {

	function radcliffe_load_style() {

		if ( ! is_admin() ) {

			$dependencies = array();

			/**
			 * Translators: If there are characters in your language that are not
			 * supported by the theme fonts, translate this to 'off'. Do not translate
			 * into your own language.
			 */
			$google_fonts = _x( 'on', 'Google Fonts: on or off', 'radcliffe' );

			if ( 'off' !== $google_fonts ) {

                wp_enqueue_style('radcliffe_googlefonts', 'https://fonts.googleapis.com/css?family=Barlow:300,300i,400,400i,500,500i,600,600i,700,700i|Merriweather:300,300i,400,400i,700,700i,900,900i', false, null);
				$dependencies[] = 'radcliffe_googlefonts';

			}

			wp_enqueue_style( 'radcliffe_style', get_template_directory_uri() . '/style.css', $dependencies );

		}

	}
	add_action( 'wp_print_styles', 'radcliffe_load_style' );

}


/* ---------------------------------------------------------------------------------------------
   ADD EDITOR STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_add_editor_styles' ) ) {

	function radcliffe_add_editor_styles() {
		add_editor_style( 'radcliffe-editor-style.css' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$google_fonts = _x( 'on', 'Google Fonts: on or off', 'radcliffe' );

		if ( 'off' !== $google_fonts ) {
			$font_url = '//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic,800|Crimson+Text:400,400italic,700,700italic';
			add_editor_style( str_replace( ',', '%2C', $font_url ) );
		}

	}
	add_action( 'init', 'radcliffe_add_editor_styles' );

}


/* ---------------------------------------------------------------------------------------------
   ADD FOOTER WIDGET AREAS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_widget_areas_registration' ) ) {

	function radcliffe_widget_areas_registration() {

		register_sidebar( array(
			'name' 			=> __( 'Footer A', 'radcliffe' ),
			'id' 			=> 'footer-a',
			'description' 	=> __( 'Widgets in this area will be shown in the left column in the footer.', 'radcliffe' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer B', 'radcliffe' ),
			'id' 			=> 'footer-b',
			'description' 	=> __( 'Widgets in this area will be shown in the middle column in the footer.', 'radcliffe' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer C', 'radcliffe' ),
			'id' 			=> 'footer-c',
			'description' 	=> __( 'Widgets in this area will be shown in the right column in the footer.', 'radcliffe' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

	}
	add_action( 'widgets_init', 'radcliffe_widget_areas_registration' );

}


/* ---------------------------------------------------------------------------------------------
   ADD PAGINATION CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_posts_link_attributes_1' ) ) {

	function radcliffe_posts_link_attributes_1() {
		return 'class="post-nav-older"';
	}
	add_filter('next_posts_link_attributes', 'radcliffe_posts_link_attributes_1');

}

if ( ! function_exists( 'radcliffe_posts_link_attributes_2' ) ) {

	function radcliffe_posts_link_attributes_2() {
		return 'class="post-nav-newer"';
	}
	add_filter('previous_posts_link_attributes', 'radcliffe_posts_link_attributes_2');

}


/* ---------------------------------------------------------------------------------------------
   CUSTOM MORE LINK TEXT
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_custom_more_link' ) ) {

	function radcliffe_custom_more_link( $more_link, $more_link_text ) {
		return str_replace( $more_link_text, __( 'Continue reading', 'radcliffe' ), $more_link );
	}
	add_filter( 'the_content_more_link', 'radcliffe_custom_more_link', 10, 2 );

}


/* ---------------------------------------------------------------------------------------------
   BODY & POST CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_body_post_classes' ) ) {

	function radcliffe_body_post_classes( $classes ) {

		// If has post thumbnail
		$classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';

		return $classes;
	}
	add_filter( 'post_class', 'radcliffe_body_post_classes' );
	add_filter( 'body_class', 'radcliffe_body_post_classes' );

}


/* ---------------------------------------------------------------------------------------------
   ADMIN CSS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_admin_css' ) ) {

	function radcliffe_admin_css() {  ?>
			<style type="text/css">
				#postimagediv #set-post-thumbnail img {
					max-width: 100%;
					height: auto;
				}
			</style>
		<?php
	}
	add_action( 'admin_head', 'radcliffe_admin_css' );

}


/* ---------------------------------------------------------------------------------------------
   RADCLIFFE COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_comment' ) ) {

	function radcliffe_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>

		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

			<?php __( 'Pingback:', 'radcliffe' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'radcliffe' ), '<span class="edit-link">', '</span>' ); ?>

		</li>
		<?php
				break;
			default :
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

			<div id="comment-<?php comment_ID(); ?>" class="comment">

				<?php
				echo get_avatar( $comment, 150 );

				if ( $comment->user_id === $post->post_author ) {
					echo '<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" title="' . __( 'Comment by post author','radcliffe' ) . '" class="by-post-author"> ' . __( '(Post author)', 'radcliffe' ) . '</a>';
				}

				?>

				<div class="comment-inner">

					<div class="comment-header">

						<cite><?php echo get_comment_author_link(); ?></cite>

						<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date() . ' &mdash; ' . get_comment_time(); ?></a></span>

					</div>

					<div class="comment-content">

						<?php if ( '0' == $comment->comment_approved ) : ?>

							<p class="comment-awaiting-moderation"><?php __( 'Your comment is awaiting moderation.', 'radcliffe' ); ?></p>

						<?php endif; ?>

						<?php comment_text(); ?>

					</div><!-- .comment-content -->

					<div class="comment-actions">

						<?php edit_comment_link( __( 'Edit', 'radcliffe' ), '', '' ); ?>

						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'radcliffe' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

					</div><!-- .comment-actions -->

				</div><!-- .comment-inner -->

			</div><!-- .comment-## -->

		<?php
			break;
		endswitch;
	}

}


/* ---------------------------------------------------------------------------------------------
   RADCLIFFE THEME OPTIONS
   --------------------------------------------------------------------------------------------- */


class Radcliffe_Customize {

   public static function radcliffe_register( $wp_customize ) {

      //1. Define a new section (if desired) to the Theme Customizer
      $wp_customize->add_section( 'radcliffe_options',
         array(
            'title' 			=> __( 'Radcliffe Options', 'radcliffe' ),
            'priority' 			=> 35,
            'capability' 		=> 'edit_theme_options',
            'description' 		=> __( 'Allows you to customize theme settings for Radcliffe.', 'radcliffe'),
         )
      );

      $wp_customize->add_section( 'radcliffe_logo_section' , array(
		    'title'       => __( 'Logo', 'radcliffe' ),
		    'priority'    => 40,
		    'description' => __('Upload a logo to replace the default site name and description in the header','radcliffe'),
		) );

      //2. Register new settings to the WP database...
      $wp_customize->add_setting( 'accent_color',
         array(
            'default' 			=> '#ca2017',
            'type' 				=> 'theme_mod',
            'capability' 		=> 'edit_theme_options',
            'transport' 		=> 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
         )
      );

      $wp_customize->add_setting( 'radcliffe_logo',
      	array(
      		'sanitize_callback' => 'esc_url_raw'
      	)
      );

      //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
      $wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'radcliffe_accent_color',
         array(
            'label' 		=> __( 'Accent Color', 'radcliffe' ),
            'section' 		=> 'colors',
            'settings' 		=> 'accent_color',
            'priority' 		=> 10,
         )
      ) );

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'radcliffe_logo', array(
		    'label'    => __( 'Logo', 'radcliffe' ),
		    'section'  => 'radcliffe_logo_section',
		    'settings' => 'radcliffe_logo',
		) ) );

      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
   }

   public static function radcliffe_header_output() {

		echo '<!-- Customizer CSS --> ';
		echo '<style type="text/css">';

			self::radcliffe_generate_css('body a', 'color', 'accent_color');
			self::radcliffe_generate_css('body a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.blog-title a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.main-menu > li:hover > a', 'background', 'accent_color');
			self::radcliffe_generate_css('.main-menu ul a:hover', 'background', 'accent_color');
			self::radcliffe_generate_css('a.post-header:hover .post-title', 'color', 'accent_color');
			self::radcliffe_generate_css('.single .post-meta-top a:hover', 'color', 'accent_color');

			self::radcliffe_generate_css('.post-content a', 'color', 'accent_color');
			self::radcliffe_generate_css('.post-content a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.post-content fieldset legend', 'background-color', 'accent_color');
			self::radcliffe_generate_css('.post-content input[type="submit"]:hover', 'background-color', 'accent_color');
			self::radcliffe_generate_css('.post-content input[type="reset"]:hover', 'background-color', 'accent_color');
			self::radcliffe_generate_css('.post-content input[type="button"]:hover', 'background-color', 'accent_color');

			self::radcliffe_generate_css( '.post-content .has-accent-color', 'color', 'accent_color' );
			self::radcliffe_generate_css( '.post-content .has-accent-background-color', 'background-color', 'accent_color' );

			self::radcliffe_generate_css('.post-meta a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.post-author-inner h3 a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.author-links a:hover', 'background-color', 'accent_color');
			self::radcliffe_generate_css('.add-comment-title a', 'color', 'accent_color');
			self::radcliffe_generate_css('.add-comment-title a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.by-post-author', 'background-color', 'accent_color');
			self::radcliffe_generate_css('.comment-actions a', 'color', 'accent_color');
			self::radcliffe_generate_css('.comment-actions a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.comment-header cite a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.comment-header span a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.comment-content a', 'color', 'accent_color');
			self::radcliffe_generate_css('.comment-content a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.comment-actions a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('#cancel-comment-reply-link', 'color', 'accent_color');
			self::radcliffe_generate_css('#cancel-comment-reply-link:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.comment-nav-below a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.logged-in-as a', 'color', 'accent_color');
			self::radcliffe_generate_css('.logged-in-as a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.content #respond input[type="submit"]:hover', 'background-color', 'accent_color');

			self::radcliffe_generate_css('.archive-container a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.archive-nav a:hover', 'background', 'accent_color');

			self::radcliffe_generate_css('#wp-calendar tfoot a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.tagcloud a:hover', 'background', 'accent_color');
			self::radcliffe_generate_css('.tagcloud a:hover:before', 'border-right-color', 'accent_color');

			self::radcliffe_generate_css('.credits a:hover', 'color', 'accent_color');
			self::radcliffe_generate_css('.nav-toggle.active', 'background', 'accent_color');
			self::radcliffe_generate_css('.mobile-menu a:hover', 'background', 'accent_color');

			self::radcliffe_generate_css('body#tinymce.wp-editor a', 'color', 'accent_color');
			self::radcliffe_generate_css('body#tinymce.wp-editor a:hover', 'color', 'accent_color');

		echo '</style>';
		echo '<!--/Customizer CSS-->';
   }

   public static function radcliffe_live_preview() {
      wp_enqueue_script( 'radcliffe-themecustomizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '', true );
   }

   public static function radcliffe_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Radcliffe_Customize' , 'radcliffe_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Radcliffe_Customize' , 'radcliffe_header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Radcliffe_Customize' , 'radcliffe_live_preview' ) );



/* ---------------------------------------------------------------------------------------------
   SPECIFY GUTENBERG SUPPORT
------------------------------------------------------------------------------------------------ */


if ( ! function_exists( 'radcliffe_add_gutenberg_features' ) ) :

	function radcliffe_add_gutenberg_features() {

		/* Gutenberg Feature Opt-Ins --------------------------------------- */

		add_theme_support( 'align-wide' );

		/* Gutenberg Palette --------------------------------------- */

		$accent_color = get_theme_mod( 'accent_color' ) ? get_theme_mod( 'accent_color' ) : '#ca2017';

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Accent', 'Name of the accent color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'accent',
				'color' => $accent_color,
			),
			array(
				'name' 	=> _x( 'Black', 'Name of the black color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'black',
				'color' => '#222',
			),
			array(
				'name' 	=> _x( 'Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'dark-gray',
				'color' => '#444',
			),
			array(
				'name' 	=> _x( 'Medium Gray', 'Name of the medium gray color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'medium-gray',
				'color' => '#666',
			),
			array(
				'name' 	=> _x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'light-gray',
				'color' => '#888',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

		/* Gutenberg Font Sizes --------------------------------------- */

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 16,
				'slug' 		=> 'small',
			),
			array(
				'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 18,
				'slug' 		=> 'regular',
			),
			array(
				'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 24,
				'slug' 		=> 'large',
			),
			array(
				'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 32,
				'slug' 		=> 'larger',
			),
		) );

	}
	add_action( 'after_setup_theme', 'radcliffe_add_gutenberg_features' );

endif;


/* ---------------------------------------------------------------------------------------------
   GUTENBERG EDITOR STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_block_editor_styles' ) ) :

	function radcliffe_block_editor_styles() {

		$dependencies = array();

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$google_fonts = _x( 'on', 'Google Fonts: on or off', 'radcliffe' );

		if ( 'off' !== $google_fonts ) {

			// Register Google Fonts
			wp_register_style( 'radcliffe-block-editor-styles-font', '//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic,800|Crimson+Text:400,400italic,700,700italic|Abril+Fatface:400', false, 1.0, 'all' );
			$dependencies[] = 'radcliffe-block-editor-styles-font';

		}

		// Enqueue the editor styles
		wp_enqueue_style( 'radcliffe-block-editor-styles', get_theme_file_uri( '/radcliffe-gutenberg-editor-style.css' ), $dependencies, '1.0', 'all' );

	}
	add_action( 'enqueue_block_editor_assets', 'radcliffe_block_editor_styles', 1 );

endif;


/* ---------------------------------------------------------------------------------------------
   CUSTOM THEME MODIFICATIONS
   --------------------------------------------------------------------------------------------- */

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

/**
 * Function to determine if the post, with `$postId` is a report CPT;
 * either an Annual Report or a Published Review.
 *
 * @param $postId
 *
 * @return bool
 */
function isReport($postId) {
    $postType = get_post_type($postId);

    return ( 'annual-reports' === $postType || 'published-reviews' === $postType );
}

add_action( 'save_post', function($postId, $post, $update) {

    if (isReport($postId)) {

        $image = new Imagick();

        if( $reportFile = get_field('report_file', $postId) ) {

            if ( $reportFilePath = get_attached_file($reportFile['id'])){

                $image->pingImage($reportFilePath);

                update_post_meta( $postId, 'report_file_size', convertByteSizeToHumanReadable($reportFile['filesize']));

                $numberOfPages = $image->getNumberImages();

                update_post_meta( $postId, 'report_file_number_of_pages', $numberOfPages );

                update_post_meta( $postId, 'report_file_type', strtoupper($reportFile['subtype']));

            }

        }

    }

}, 10, 3);

add_action('init', function() {
    add_image_size( 'report', 200);
    add_image_size( 'archive-news', 600, 337, array( 'left', 'top' ));
});

function template($data, $slug, $name = '') {
    global $vcTemplateData;
    $vcTemplateData = $data;

    ob_start();
    get_template_part($slug, $name);
    $output = ob_get_contents();
    ob_end_clean();

    $vcTemplateData = null;
    return $output;
}

function partial($data, $slug, $name = '') {
    return template($data, 'partials/' . $slug, $name);
}

/**
 * Create ACF setting page under report menus
 */
if ( function_exists( 'acf_add_options_sub_page' ) ){
    acf_add_options_sub_page(array(
        'title'      => 'Annual Reports Settings',
        'parent'     => 'edit.php?post_type=annual-reports',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Published Reviews Settings',
        'parent'     => 'edit.php?post_type=published-reviews',
        'capability' => 'manage_options'
    ));
}

/**
 * This functions ensures that the ACF json file will now be saved
 * in a theme agnostic location, allowing ACF structures to be shared between
 * themes which may be beneficial in a multi-site scenario.
 *
 * https://www.advancedcustomfields.com/resources/local-json/
 */
function acf_json_save_point( $path ) {
    // update path
    $path = WPMU_PLUGIN_DIR .  '/acf-json';

    return $path;
}
add_filter('acf/settings/save_json', 'acf_json_save_point');

/**
 * ACF schema now loaded from /mu-plugins/ppj/acf-json
 *
 * See acf_json_save_point for rationale.
 */
function acf_json_load_point( $paths ) {
    // remove original path
    unset($paths[0]);

    // append path
    $paths[] = WPMU_PLUGIN_DIR . '/acf-json';

    return $paths;
}
add_filter('acf/settings/load_json', 'acf_json_load_point');

/**
 * The following ensures that when viewing the archive of news posts,
 * that the reports post types are also shown.
 *
 * A consequence of this is that the 'news archive' template will not be used
 * because the archive is no longer just showing news posts.
 * `archive.php` will be used instead.
 */
add_action( 'pre_get_posts', function ( $query ) {

    if( $query->is_main_query() && is_post_type_archive( ['annual-reports', 'published-reviews'] ) ) {

        $query->set( 'posts_per_page', '-1' );
        
    }

    if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'news' ) ) {

        $query->set( 'post_type', ['news', 'published-reviews', 'annual-reports']);
        $query->set( 'posts_per_page', '12' );
        $query->set( 'order', 'DESC' );

    }

});

/**
 * The layout of the site requires that there are images present for all posts.
 * If the user does not upload an accompanying image, a placeholder image will be used instead.
 * The following two hooks create a `Placeholder` category, which can be used by the user
 * to specify images that have been uploaded to the media library to act as these placeholder images.
 */
add_action( 'admin_init' , function () {

    wp_create_category('Placeholder');

});

add_action( 'init' , function () {

    register_taxonomy_for_object_type( 'category', 'attachment' );

});

// Ensure that the `archive-news` image size is available for PDF thumbnails as well
add_filter( 'fallback_intermediate_image_sizes', function( $fallback_sizes, $metadata ) {

    $fallback_sizes[] = 'archive-news';

    return $fallback_sizes;

}, 10, 2 );

// Allow user to select only PDFs in the media library
add_filter( 'post_mime_types', function ( $post_mime_types ) {

    $post_mime_types['application/pdf'] = [
        __( 'PDFs' ),
        __( 'Manage PDFs' ),
        _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' )
    ];

    return $post_mime_types;
} );

function get_common_date_format() {
    return "j F Y";
}

add_shortcode( 'accordion-preview', function ( $atts ){

    return partial([
        'post-id' => $atts['post-id'],
        'accordion-with-icon' => get_field ('icon_accordion', $atts['post-id'])
    ], 'accordion-preview');

});

add_shortcode( 'latest_news', function ( $atts ) {

    $output = '';
    $postsPerPage = (isset($atts['amount'])) ? $atts['amount'] : 3;
    $the_query = new WP_Query( [
        'posts_per_page' => $postsPerPage,
        'post_type' => ['news', 'published-reviews', 'annual-reports'],
    ] );

    if ( $the_query->have_posts() ) {

        while ( $the_query->have_posts() ) {

            $the_query->the_post();
            $postType = get_post_type_object(get_post_type());
            $postTypeName = $postType->labels->singular_name;

            $output .= partial([

                'date-format' => get_common_date_format(),
                'post-type-name' => $postTypeName,

            ], 'latest-news');
        }

        wp_reset_postdata();

    } else {

        $output = '<p>No news posts found</p>';

    }

    return $output;

});

$placeholders = get_posts([
    'category_name' => 'placeholder',
    'post_type' => 'attachment',
]);

function getThumbnail(&$placeholderCounter) {
    global$placeholders;

    $postType = get_post_type();

    if ( $postType === 'annual-reports' || $postType === 'published-reviews' ) {
        $reportFile = get_field('report_file', get_the_ID());
        return wp_get_attachment_image($reportFile['id'], [600, 337], true);
    }

    if ( has_post_thumbnail() ) {
        return get_the_post_thumbnail( get_the_ID(), 'archive-news' );
    }

    if ( is_array($placeholders) && sizeof($placeholders) > 0) {
        $index = ++$placeholderCounter % sizeof($placeholders);
        return wp_get_attachment_image( $placeholders[$index]->ID,'archive-news', true);
    }

    return '';
}

?>
