<?php
/**
 * Plugin Name:       Bellhop
 * Description:       Just a simple WordPress Bellhop is a lightweight responsive bellhop button that allows for any visitors to your site to contact the front desk easily and in several ways.
 * Requires at least: 4.5
 * Tested Up To:      6.0.1
 * Version:           1.0.2
 * Author:            Ben Rothman
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       Bellhop
 *
 * @package           Bellhop
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'unauthorized' );
}

require_once('settings.php');

 class Bellhop {

	/**
	 * Bellhop class constructor
	 *
	 * @since 0.1
	 */
	public function __construct() {

		add_action( 'wp_footer', array( $this,'bh_footer_hook' ) );

		add_action( 'wp_enqueue_scripts', array( $this,'bh_enqueue_script' ) );

	}

	/**
	 * Echos the root element for React to hook onto
	 *
	 * @since 0.1
	 */
	public function bh_footer_hook() {
		echo '<div id="render_here" style="position: fixed; top: 85%; left: 90%;"></div>';
	}

	/**
	 * Enqueue the style and react used by this plugin with the settings localized.
	 *
	 * @since 0.1
	 */
	function bh_enqueue_script() {
		wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . 'build/style-index.css' );

		wp_register_script( 'Bellhop-react', plugin_dir_url( __FILE__ ) . '/build/index.js', [ 'wp-element' ], 'all', true );

		$settings = bh_get_options();

		// if ( empty( $settings['bh_field_phone'] ) && empty( $settings['bh_field_email'] ) ) {
		// 	return;
		// }


			$the_data = array(
				'phonenumber'  => $settings['bh_field_phone'],
				'emailaddress' => $settings['bh_field_email'],
			);

		wp_localize_script( 'Bellhop-react', 'bh_settings', $the_data );
			

		wp_enqueue_script( 'Bellhop-react' );

	}


 }

 new Bellhop();
