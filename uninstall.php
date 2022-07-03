<?php
/**
 * Handle cleaning up after the plugin on uninstall.
 *
 * @since 1.0.0
 * @package Lity
 */

// exit if uninstall constant is not defined.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {

	exit;

}

delete_transient( 'lity_media' );
delete_option( 'lity_options' );
