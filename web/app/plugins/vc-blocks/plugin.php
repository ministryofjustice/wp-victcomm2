<?php
/**
 * Plugin Name: VC Gutenberg Blocks
 * Description: Custom Gutenberg blocks for the Victims' Commissioner website
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
