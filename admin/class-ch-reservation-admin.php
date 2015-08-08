<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://icanwp.com/plugins/
 * @since      1.0.0
 *
 * @package    CH_Reservation
 * @subpackage CH_Reservation/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    CH_Reservation
 * @subpackage CH_Reservation/admin
 * @author     Team HiWordpress <support@icanwp.com>
 */
class CH_Reservation_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ch_reservation    The ID of this plugin.
	 */
	private $ch_reservation;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $ch_reservation       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ch_reservation, $version ) {

		$this->ch_reservation = $ch_reservation;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in CH_Reservation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The CH_Reservation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'css/ch-reservation-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in CH_Reservation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The CH_Reservation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	//Add Admin Page
	public function add_ch_admin_menu(){
		add_menu_page(
			'ChoiceHotels Reservation Form Connector', // The title to be displayed on this menu's corresponding page
			'ChoiceHotels', // The text to be displayed for this actual menu item
			'manage_options', // Which type of users can see this menu
			'ch_admin_menu', // The unique ID - that is, the slug - for this menu item
			array($this, 'display_ch_admin_menu'), // The name of the function to call when rendering this menu's page
			plugin_dir_url( __FILE__ ) . 'assets/admin-icon.png', // icon url
			117.711 // position
		);
		 add_submenu_page(
			'ch_admin_menu',                  // Register this submenu with the menu defined above
			'Advanced Menu Options',          // The text to the display in the browser when this menu item is active
			'Advanced Options',                  // The text for this menu item
			'manage_options',            // Which type of users can see this menu
			'ch_advanced_menu',          // The unique ID - the slug - for this menu item
			array($this, 'display_ch_admin_advanced_menu')   // The function used to render this menu's page to the screen
		);
	}

	public function display_ch_admin_menu(){
		require_once('partials/ch-reservation-admin-display.php');
	}
	public function display_ch_admin_advanced_menu(){
		require_once('partials/ch-reservation-admin-display-advanced.php');
	}
	
	function ch_reservation_init_options(){
		add_settings_section(
			'general_settings_section', // ID used to identify this section and with which to register options
			'Main Options',
			array($this, 'callback_general_settings_section'),
			'ch_admin_menu' // Page on which to add this section of options
		);
		add_settings_section(
			'advanced_settings_section', // ID used to identify this section and with which to register options
			'Advanced Options',
			array($this, 'callback_advanced_settings_section'),
			'ch_advanced_menu' // Page on which to add this section of options
		);
		add_settings_field( 
			'ch_reservation_input_choicehotels_url',                      // ID used to identify the field throughout the theme
			'ChoiceHotels Website URL',                           // The label to the left of the option interface element
			array($this, 'callback_input_choicehotels_url'),   // The name of the function responsible for rendering the option interface
			'ch_admin_menu',                          // The page on which this option will be displayed
			'general_settings_section',         // The name of the section to which this field belongs
			array(                              // The array of arguments to pass to the callback. In this case, just a description.
				'Enter the specific branch URL for ChoiceHotels'
			)
		);
		add_settings_field( 
			'ch_reservation_select_style_option',
			'Reservation Form Style',
			array($this, 'callback_select_style_option'),
			'ch_admin_menu',
			'general_settings_section',
			array(
				'Choose color style for your reservation form.'
			)
		);
		add_settings_field( 
			'ch_reservation_shortcode_text_widget',
			'Allow shortcode from the "Text" widget',
			array($this, 'callback_allow_shortcode_in_text_widget'),
			'ch_admin_menu',
			'general_settings_section',
			array(
				'Check to allow the use of shortcode in the text widget. <br /><span class="ch_warning"><strong>WARNING:</strong> This will allow the use of any shortcode from the text widget globally.</span>'
			)
		);
		add_settings_field( 
			'ch_reservation_check_disable_auto_checkout_select',
			'Disable checkout date auto select',                           
			array($this, 'callback_disable_auto_checkout_select'),
			'ch_advanced_menu',
			'advanced_settings_section',
			array(
				'Check this box to disable auto opening the checkout date box to avoid possible jquery .focus()/.datepicker("show") behavior with other plugins.'
			)
		);

		add_settings_field( 
			'ch_reservation_check_load_jquery',
			'Do Not Load jQuery',
			array($this, 'callback_load_script_jquery'),
			'ch_advanced_menu',
			'advanced_settings_section',
			array(
				'Check this box to disable loading jquery with the plugin script.'
			)
		);
		add_settings_field( 
			'ch_reservation_check_load_jquery_datepicker',
			'Do Not Load jQuery ui datepicker',                           
			array($this, 'callback_load_script_jquery_datepicker'),
			'ch_advanced_menu',
			'advanced_settings_section',
			array(
				'Check this box to disable loading jquery-ui-datepicker with the plugin script.'
			)
		);
		add_settings_field( 
			'ch_reservation_check_load_jquery_spinner',
			'Do Not Load jQuery ui spinner',                           
			array($this, 'callback_load_script_jquery_spinner'),
			'ch_advanced_menu',
			'advanced_settings_section',
			array(
				'Check this box to disable loading jquery-ui-spinner with the plugin script.'
			)
		);
		register_setting(
			'ch_admin_menu',
			'ch_reservation_input_choicehotels_url',
			array( $this, 'sanitize_url_field_no_param' ) // makes it a clean URL without ? and all the followings
		);
		register_setting(
			'ch_admin_menu',
			'ch_reservation_select_style_option'
		);
		register_setting(
			'ch_admin_menu',
			'ch_reservation_shortcode_text_widget'
		);
		register_setting(
			'ch_advanced_menu',
			'ch_reservation_check_disable_auto_checkout_select'
		);
		register_setting(
			'ch_advanced_menu',
			'ch_reservation_check_load_jquery'
		);
		register_setting(
			'ch_advanced_menu',
			'ch_reservation_check_load_jquery_datepicker'
		);
		register_setting(
			'ch_advanced_menu',
			'ch_reservation_check_load_jquery_spinner'
		);
	}
	
	function callback_general_settings_section(){
		require_once('partials/ch-reservation-admin-settings-display.php');
	}
	function callback_advanced_settings_section(){
		require_once('partials/ch-reservation-admin-settings-display-advanced.php');
	}
	function callback_allow_shortcode_in_text_widget($options){
		// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
		$html = '<input type="checkbox" id="ch_reservation_shortcode_text_widget" name="ch_reservation_shortcode_text_widget" value="1" ' . checked(1, get_option('ch_reservation_shortcode_text_widget'), false) . '/>'; 
		 
		// Here, we will take the first argument of the array and add it to a label next to the checkbox
		$html .= '<label for="ch_reservation_shortcode_text_widget"> '  . $options[0] . '</label>'; 
		 
		echo $html;
	}
	//Allow checkout date auto focus upon choosing checkin date
	function callback_disable_auto_checkout_select($options){
		$html = '<input type="checkbox" id="ch_reservation_check_disable_auto_checkout_select" name="ch_reservation_check_disable_auto_checkout_select" value="1" ' . checked(1, get_option('ch_reservation_check_disable_auto_checkout_select'), false) . '/>'; 
		$html .= '<label for="ch_reservation_check_disable_auto_checkout_select"> '  . $options[0] . '</label>'; 
		echo $html;
	}
	//Load Jquery in dependency for calling the reservation script
	function callback_load_script_jquery($options){
		$html = '<input type="checkbox" id="ch_reservation_check_load_jquery" name="ch_reservation_check_load_jquery" value="1" ' . checked(1, get_option('ch_reservation_check_load_jquery'), false) . '/>'; 
		$html .= '<label for="ch_reservation_check_load_jquery"> '  . $options[0] . '</label>'; 
		echo $html;
	}
	function callback_load_script_jquery_datepicker($options){
		$html = '<input type="checkbox" id="ch_reservation_check_load_jquery_datepicker" name="ch_reservation_check_load_jquery_datepicker" value="1" ' . checked(1, get_option('ch_reservation_check_load_jquery_datepicker'), false) . '/>'; 
		$html .= '<label for="ch_reservation_check_load_jquery_datepicker"> '  . $options[0] . '</label>'; 
		echo $html;
	}
	function callback_load_script_jquery_spinner($options){
		$html = '<input type="checkbox" id="ch_reservation_check_load_jquery_spinner" name="ch_reservation_check_load_jquery_spinner" value="1" ' . checked(1, get_option('ch_reservation_check_load_jquery_spinner'), false) . '/>'; 
		$html .= '<label for="ch_reservation_check_load_jquery_spinner"> '  . $options[0] . '</label>'; 
		echo $html;
	}
	
	function callback_input_choicehotels_url($options){	
		$html = '<input type="text" class="text-input" id="ch_reservation_input_choicehotels_url" name="ch_reservation_input_choicehotels_url" value="' . get_option('ch_reservation_input_choicehotels_url') .'" />';
		$html .= '<label for="ch_reservation_input_choicehotels_url"> '  . $options[0] . '</label>'; 
		echo $html;
	}
	
	function callback_select_style_option($options){
		$selected = get_option('ch_reservation_select_style_option');
		$styles = array(
			'' => 'No Style / I will do my own CSS.',
			'clarionhotel' => 'Clarion Hotel',
			'comfortinn' => 'Comfort Inn',
			'comfortsuites' => 'Comfort Suites',
			'econolodge' => 'Econolodge',
			'mainstaysuites' => 'MainStay Suites',
			'qualityinn' => 'Quality Inn',
			'rodewayinn' => 'Rodeway Inn',
			'sleepinn' => 'Sleep Inn',
			'suburbanhotel' => 'Suburban'
		);
		$html = '<select class="ch_reservation_select_style_option" name="ch_reservation_select_style_option">';
		foreach($styles as $style_key => $style_name){
			$html .= '<option value="' . $style_key . '" name="' . $style_key . '" ';
			if($style_key == $selected){
				$html .= 'selected="selected"';
			}
			$html .= '>' . $style_name . '</option>';
		}
		$html .= '</selected>';
		$html .= '<label for="check_open_new_window"> '  . $options[0] . '</label>'; 
		echo $html;
	}
	
	function sanitize_url_field_no_param( $input, $allowed_protocols = array( 'http', 'https' ) ) {
		$input = strtok($input, '?');
		return esc_url_raw( sanitize_text_field( rawurldecode( $input ) ), $allowed_protocols );
	}
}
