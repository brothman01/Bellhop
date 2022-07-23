<?php
/**
 * Plugin Name:       ConciergeWP
 * Description:       Just a simple WordPress ConciergeWP is a lightweight responsive bellhop button that allows for any visitors to your site to contact the front desk easily and in several ways.
 * Requires at least: 5.9
 * Tested Up To:      6.1
 * Version:           1.0.0
 * Author:            Ben Rothman
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       conciergewp
 *
 * @package           conciergewp
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'unauthorized' );
}

 class ConciergeWP {

	/**
	 * ConciergeWP class constructor
	 *
	 * @since 0.1
	 */
	public function __construct() {

		add_action( 'wp_footer', array( $this,'cwp_footer_hook' ) );

		add_action( 'wp_enqueue_scripts', array( $this,'cwp_enqueue_script' ) );

		require_once('settings.php'); // add the settings page

	}

	/**
	 * Echos the root element for React to hook onto
	 *
	 * @since 0.1
	 */
	public function cwp_footer_hook() {
		echo '<div id="render_here" style="position: fixed; top: 85%; left: 90%;"></div>';
	}

	/**
	 * Enqueue the style and react used by this plugin with the settings localized.
	 *
	 * @since 0.1
	 */
	function cwp_enqueue_script() {
		wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . 'build/style-index.css' );

		wp_register_script( 'conciergewp-react', plugin_dir_url( __FILE__ ) . '/build/index.js', [ 'wp-element' ], 'all', true );

		$settings = get_option('cwp_options');

		$the_data = array(
			'phonenumber'  => $settings['cwp_field_phone'],
			'emailaddress' => $settings['cwp_field_email']
		);
		wp_localize_script( 'conciergewp-react', 'cwp_settings', $the_data );

		wp_enqueue_script( 'conciergewp-react' );

	}

 }

 new ConciergeWP();
