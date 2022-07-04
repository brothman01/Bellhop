<?php
/**
 * Plugin Name: ConciergeWP - Easy Contact Button
 * Description: Adds a small contact button to the bottom of ever page so that customers can easily contact the front desk.
 * Author: Ben Rothman
 * Author URI: https://www.benrothman.org
 * Version: 0.1
 * Text Domain: conciergewp
 * Domain Path: /languages
 * Tested up to: 6.0
 *
 * @package ConciergeWP
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

define( 'CONCIERGEWP_PLUGIN_VERSION', '0.1' );

if ( ! class_exists( 'ConciergeWP' ) ) {

	/**
	 * Main ConciergeWP Class.
	 *
	 * @since 0.1
	 */
	final class ConciergeWP {

		/**
		 * Options class instance.
		 *
		 * @var Object
		 */
		private $conciergewp_options;

		/**
		 * ConciergeWP plugin constructor.
		 *
		 * @since 0.1
		 */
		public function __construct() {

            echo '<div class="conciergewp" style="width: 24px; height: 24px; position: fixed; top: 90%; left: 95%; border: solid red 1px;"></div>';

            add_action( 'wp_enqueue_scripts', array( $this, 'conciergeWP_scripts_styles' ) );

		}

        /**
         * Proper way to enqueue scripts and styles
         */
        function conciergeWP_scripts_styles() {
            wp_enqueue_style( 'concierge-wp-style', plugin_dir_url( __FILE__ ) . '/assets/css/conciergewp.css');
            //wp_enqueue_script( 'concierge-wp-script', get_template_directory_uri() . '/js/example.js', array( 'jquery' ), '1.0.0', true );
        }

	}

}

new ConciergeWP();
