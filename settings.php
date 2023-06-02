<?php
/**
 * Bellhop
 *
 * @category  WordPress_Plugin
 * @package   Brothman-portfolio
 * @author    Ben Rothman <Ben@BenRothman.org>
 * @copyright 2023 Ben Rothman
 * @license   GPL-2.0+ https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 */

/**
 * Function to create the Bellhop options page
 *
 * @since 1.0.2
 */
function bh_options_page() {
	add_menu_page(
		'Bellhop',
		'Bellhop',
		'manage_options',
		'bh',
		'bh_options_page_html',
		'dashicons-bell'
	);
}

add_action( 'admin_menu', 'bh_options_page' );


/**
 * Helper function to get Bellhop options or return empty strings if there are no values.
 *
 * @since 1.0.2
 */
function bh_get_options() {

	$defaults = array(
		'bh_field_phone' => '',
		'bh_field_email' => '',
	);

	return get_option( 'bh_options', $defaults );

}

/**
 * Register the setting, initialize and add the section + fields to the section
 */
function bh_settings_init() {

	// Register a new setting for "bh" page.
	register_setting( 'bh', 'bh_options' );

	// Register a new section in the "bh" page.
	add_settings_section(
		'bh_settings_section',
		__( 'General', 'bh' ),
		null,
		'bh'
	);

	// Register a new field in the "bh_settings_section" section, on the "bh" page.
	add_settings_field(
		'bh_field_phone', // As of WP 4.6 this value is used only internally.
		__( 'Phone Number', 'bh' ),
		'bh_phone_cb',
		'bh',
		'bh_settings_section',
		array(
			'label_for' => 'bh_field_phone',
			'class'     => 'bh_row',
		)
	);

	// Register a new field in the "bh_settings_section" section, on the "bh" page.
	add_settings_field(
		'bh_field_email', // As of WP 4.6 this value is used only internally.
		__( 'Email', 'bh' ),
		'bh_email_cb',
		'bh',
		'bh_settings_section',
		array(
			'label_for' => 'bh_field_email',
			'class'     => 'bh_row',
		)
	);

}

add_action( 'admin_init', 'bh_settings_init' );

/**
 * Phone field callback function.
 *
 * @param Array $args : An array of the parameters to be used in the callback function to build the shortcode.
 */
function bh_phone_cb( $args ) {

	// Get the value of the setting we've registered with register_setting().
	$value = get_option( 'bh_options', 'false' ) !== 'false' ? get_option( 'bh_options' )['bh_field_phone'] : '';
	?>
	<!-- output the html for the field being added -->
	<input
			id="<?php echo esc_attr( $args['label_for'] ); ?>"
			type="tel" id="phone"
			name="bh_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
			pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
			value="<?php echo esc_html( $value ); ?>">
</input><br />
	<p className="description">This is the phone number that visitors to your site will call when they press the phone button.</p>
	<?php

}

/**
 * Email field callback function.
 *
 * @param Array $args : An array of the parameters to be used in the callback function to build the shortcode.
 */
function bh_email_cb( $args ) {
	// Get the value of the setting we've registered with register_setting().
	$value = get_option( 'bh_options', 'false' ) !== 'false' ? get_option( 'bh_options' )['bh_field_email'] : '';
	?>
	<!-- output the html for the field being added -->
	<input
			id="<?php echo esc_attr( $args['label_for'] ); ?>"
			type="email"
			name="bh_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
			value="<?php echo esc_html( $value ); ?>">
	</input><br />
	<p className="description">This is the email address that visitors to your site will email when they press the email button.</p>

	<?php
}

/**
 * Menu Page callback function
 */
function bh_options_page_html() {

	// check user capabilities.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// show error/update messages.
	settings_errors( 'bh_messages' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "bh".
			settings_fields( 'bh' );

			// output setting sections and their fields.  sections are registered for "bh", each field is registered to a section.
			do_settings_sections( 'bh' );

			// output save settings button.
			submit_button( 'Save Settings' );
			?>
		</form>
	</div>
	<?php

}
