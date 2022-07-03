<?php
/**
 * Lity Helpers Class
 *
 * @package Lity
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

if ( ! class_exists( 'Lity_Helpers' ) ) {

	/**
	 * Lity Helpers Class.
	 *
	 * @since 1.0.0
	 */
	final class Lity_Helpers {

		/**
		 * Remove element selectors from Lity.
		 *
		 * @param array        $value     Lity options array.
		 * @param string|array $selectors Element selector string or array of selectors to exclude from Lity.
		 */
		public function add_selector_exclusion( $value, $selectors ) {

			// Return the options early so our exclusions don't show up on the settings page.
			if ( is_admin() ) {

				return $value;

			}

			$excluded_element_selectors = json_decode( $value['excluded_element_selectors'], true );

			if ( is_array( $selectors ) ) {

				foreach ( $selectors as $selector ) {

					$excluded_element_selectors[] = array(
						'value' => $selector,
					);

				}
			}

			if ( is_string( $selectors ) ) {

				$excluded_element_selectors[] = array(
					'value' => $selectors,
				);

			}

			$value['excluded_element_selectors'] = json_encode( $excluded_element_selectors );

			return $value;

		}

	}

}
