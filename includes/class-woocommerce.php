<?php
/**
 * Lity Options Class
 *
 * @package Lity
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

if ( ! class_exists( 'Lity_WooCommerce' ) ) {

	/**
	 * Lity Options Class.
	 *
	 * @since 1.0.0
	 */
	final class Lity_WooCommerce {

		/**
		 * Helpers class instance.
		 *
		 * @var object
		 */
		private $lity_helpers;

		/**
		 * Lity options class constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			$this->lity_helpers = new Lity_Helpers();

			add_filter( 'option_lity_options', array( $this, 'woocommerce_exclusions' ), PHP_INT_MAX, 2 );
			add_filter( 'option_lity_options', array( $this, 'storefront_exclusions' ), PHP_INT_MAX, 2 );

		}

		/**
		 * Remove specific WooCommerce elements from opening in a lightbox.
		 *
		 * @param array $value lity_options value.
		 *
		 * @return array Filtered lity_options value.
		 */
		public function woocommerce_exclusions( $value ) {

			if ( ! function_exists( 'is_plugin_active' ) ) {

				include_once ABSPATH . 'wp-admin/includes/plugin.php';

			}

			return ! is_plugin_active( 'woocommerce/woocommerce.php' ) ? $value : $this->lity_helpers->add_selector_exclusion( $value, 'li.type-product .attachment-woocommerce_thumbnail' );

		}

		/**
		 * Remove specific WooCommerce Storefront theme elements.
		 *
		 * @param array $value lity_options value.
		 *
		 * @return array Filtered lity_options value.
		 */
		public function storefront_exclusions( $value ) {

			$theme = wp_get_theme( 'storefront' );

			return ! $theme->exists() ? $value : $this->lity_helpers->add_selector_exclusion( $value, '.storefront-product-pagination img' );

		}

	}

}

new Lity_WooCommerce();
