<?php
/**
 * Corporate Staffing Settings
 *
 * This file registers all of Corporate Staffing specific Theme Settings, accessible from
 * Genesis --> Corporate Staffing Settings.
 *
 * NOTE: Change out "CSS" in this file with name of theme and delete this note
 */ 
 
/**
 * Registers a new admin page, providing content and corresponding menu item
 * for the Child Theme Settings page.
 *
 * @since 1.0.0
 *
 * @package css
 * @subpackage CSS_Settings
 */
class CSS_Settings extends Genesis_Admin_Boxes {
	
	/**
	 * Create an admin menu item and settings page.
	 * @since 1.0.0
	 */
	function __construct() {
		
		// Specify a unique page ID. 
		$page_id = 'css';
		
		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => __( 'Corporate Staffing Settings', 'css' ),
				'menu_title'  => __( 'Corporate Staffing Settings', 'css' ),
				'capability' => 'manage_options',
			)
		);
		
		// Set up page options. These are optional, so only uncomment if you want to change the defaults
		$page_ops = array(
		//	'screen_icon'       => 'options-general',
		//	'save_button_text'  => 'Save Settings',
		//	'reset_button_text' => 'Reset Settings',
		//	'save_notice_text'  => 'Settings saved.',
		//	'reset_notice_text' => 'Settings reset.',
		);		
		
		// Give it a unique settings field. 
		// You'll access them from genesis_get_option( 'option_name', 'css-settings' );
		$settings_field = 'css-settings';
		
		// Set the default values
		$default_settings = array(
			'wsm_copyright' => 'My Name, All Rights Reserved',
			'wsm_credit' => 'Website by Web Savvy Marketing',
			'wsm_gforms_placeholder' => 0,
		);
		
		// Create the Admin Page
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		// Initialize the Sanitization Filter
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );
			
	}

	/** 
	 * Set up Sanitization Filters
	 * @since 1.0.0
	 *
	 * See /lib/classes/sanitization.php for all available filters.
	 */	
	function sanitization_filters() {
	
	genesis_add_option_filter( 'no_html', $this->settings_field,
			array(
				'wsm_header_logo',
				'wsm_header_logo_url',
			)) ;
		
		genesis_add_option_filter( 'safe_html', $this->settings_field,
			array(
				'wsm_copyright',
				'wsm_credit',
			) );
	}
	
	/**
	 * Set up Help Tab
	 * @since 1.0.0
	 *
	 * Genesis automatically looks for a help() function, and if provided uses it for the help tabs
	 * @link http://wpdevel.wordpress.com/2011/12/06/help-and-screen-api-changes-in-3-3/
	 */
	 function help() {
	 	$screen = get_current_screen();

		$screen->add_help_tab( array(
			'id'      => 'sample-help', 
			'title'   => 'Sample Help',
			'content' => '<p>Help content goes here.</p>',
		) );
	 }
	
	/**
	 * Register metaboxes on Child Theme Settings page
	 * @since 1.0.0
	 */
	function metaboxes() {	
		add_meta_box('wsm_header_info_metabox', 'Header Info', array( $this, 'wsm_header_info_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_footer_info_metabox', 'Footer Info', array( $this, 'wsm_footer_info_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_gforms_placeholders_metabox', 'Gravity Forms Auto Placeholders', array( $this, 'wsm_gforms_placeholders_metabox' ), $this->pagehook, 'main', 'high');
	}
	
	/**
	 * Footer Info Metabox
	 * @since 1.0.0
	 */
	function wsm_header_info_metabox() {

		echo '<p><strong>Logo Right:</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_logo' ) . '" id="' . $this->get_field_id( 'wsm_header_logo' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_logo' ) ) . '" size="70" /></p>';
		
		echo '<p><strong>Logo URL:</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_header_logo_url' ) . '" id="' . $this->get_field_id( 'wsm_header_logo_url' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_header_logo_url' ) ) . '" size="70" /></p>';

	}
	
	/**
	 * Footer Info Metabox
	 * @since 1.0.0
	 */
	function wsm_footer_info_metabox() {

		echo '<p><strong>Copyright Info:</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_copyright' ) . '" id="' . $this->get_field_id( 'wsm_copyright' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_copyright' ) ) . '" size="70" /></p>';

		echo '<p><strong>Credit Info:</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_credit' ) . '" id="' . $this->get_field_id( 'wsm_credit' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_credit' ) ) . '" size="70" /></p>';

	}
	
	/**
	* Gravity Forms Auto Placeholders Metabox
    * @since 2.0.0
    */
    function wsm_gforms_placeholders_metabox() {

        echo '<input type="checkbox" name="' . $this->get_field_name( 'wsm_gforms_placeholder' ) . '" id="' . $this->get_field_id( 'wsm_gforms_placeholder' ) . '" value="1"';
        checked( 1, $this->get_field_value( 'wsm_gforms_placeholder' ) ); echo '/>';
                
        echo '<label for="' . $this->get_field_id( 'wsm_gforms_placeholder' ) . '">' . __( 'Only convert labels to placeholders on forms or form items with the class <strong><em>gforms_placeholder</em></strong>', 'wsm' ) . '</label>';
        echo '<p><em>' . __( 'By default, leaving this unchecked will apply the effect to all Gravity Form fields.', 'wsm' ) . '</em></p>';
                        
    }
	
	
	
}

/**
 * Add the Theme Settings Page
 * @since 1.0.0
 */
function css_add_settings() {
	global $_child_theme_settings;
	$_child_theme_settings = new CSS_Settings;	 	
}
add_action( 'genesis_admin_menu', 'css_add_settings' );

/**
 * Add Soliloquy key
 *
 * @since 1.0.0
 */
// Soliloquy License
if ( ! get_option( 'soliloquy_license_key' ) )
	update_option( 'soliloquy_license_key', SOLILOQUY_LICENSE_KEY );
