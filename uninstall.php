<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://icanwp.com/plugins/
 * @since      1.0.0
 *
 * @package    CH_Reservation
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
$ch_options = array(
	'ch_reservation_input_choicehotels_url',
	'ch_reservation_select_style_option',
	'ch_reservation_shortcode_text_widget',
	'ch_reservation_check_disable_auto_checkout_select',
	'ch_reservation_check_load_jquery',
	'ch_reservation_check_load_jquery_datepicker',
	'ch_reservation_check_load_jquery_spinner'
	
);
foreach($ch_options as $option){
delete_option($option);
}
