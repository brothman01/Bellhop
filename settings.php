<?php
 /**
 * Add the menu page
 */
function cwp_options_page() {
    add_menu_page(
        'ConciergeWP',
        'ConciergeWP',
        'manage_options',
        'cwp',
        'cwp_options_page_html'
    );
}

add_action( 'admin_menu', 'cwp_options_page' );


/**
 * Register the setting, initialize and add the section + fields to the section
 */
function cwp_settings_init() {
    // Register a new setting for "cwp" page.
    register_setting( 'cwp', 'cwp_options' );
 
    // Register a new section in the "cwp" page.
    add_settings_section(
        'cwp_settings_section',
        __( 'General', 'cwp' ), NULL,
        'cwp'
    );
 

	    // Register a new field in the "cwp_settings_section" section, on the "cwp" page.
		add_settings_field(
			'cwp_field_phone', // As of WP 4.6 this value is used only internally.
									// Use $args' label_for to populate the id inside the callback.
				__( 'Phone Number', 'cwp' ),
			'cwp_phone_cb',
			'cwp',
			'cwp_settings_section',
			array(
				'label_for'   => 'cwp_field_phone',
				'class'       => 'cwp_row',
			)
		);

        // Register a new field in the "cwp_settings_section" section, on the "cwp" page.
		add_settings_field(
			'cwp_field_email', // As of WP 4.6 this value is used only internally.
									// Use $args' label_for to populate the id inside the callback.
				__( 'Email', 'cwp' ),
			'cwp_email_cb',
			'cwp',
			'cwp_settings_section',
			array(
				'label_for'   => 'cwp_field_email',
				'class'       => 'cwp_row',
			)
		);
}
 
add_action( 'admin_init', 'cwp_settings_init' );
 
 

/**
 * Phone field callback function.
 */
function cwp_phone_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'cwp_options' );
    ?>
	<!-- output the html for the field being added -->
    <input
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            type="tel" id="phone"
            name="cwp_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
			value="<?php echo $options['cwp_field_phone'] ?>">
</input><br />
    <p className="description">This is the phone number that visitors to your site will call when they press the phone button.</p>
    <?php
}

/**
 * Email field callback function.
 */
function cwp_email_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'cwp_options' );
    ?>
	<!-- output the html for the field being added -->
    <input
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            type="email"
            name="cwp_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
			value="<?php echo $options['cwp_field_email'] ?>">
    </input><br />
    <p className="description">This is the email address that visitors to your site will email when they press the email button.</p>

    <?php
}
 
  
/**
 * Menu Page callback function
 */
function cwp_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
  
    // show error/update messages
    settings_errors( 'cwp_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "cwp"
            settings_fields( 'cwp' );

            // output setting sections and their fields.  sections are registered for "cwp", each field is registered to a section
            do_settings_sections( 'cwp' );

            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php
}