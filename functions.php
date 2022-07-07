<?php
/**
 * Plugin Name:       ConciergeWP
 * Description:       Just a simple WordPress ConciergeWP is a lightweight responsive bellhop button that allows for any visitors to your site to contact the front desk easily and in several ways.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Ben Rothman
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       conciergewp
 *
 * @package           conciergewp
 */


 add_action( 'wp_footer', 'footer_hook' );
 
 function footer_hook() {
 	echo '<div id="render_here" style="width: 24px; height: 24px; background: red; position: fixed; top: 85%; left: 90%;"></div>';
 }
 
function enqueue_script() {
	wp_enqueue_script( 'test', plugin_dir_url( __FILE__ ) . '/build/index.js', array( 'wp-element' ), '0.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_script' );
