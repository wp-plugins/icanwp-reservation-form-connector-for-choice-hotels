<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://icanwp.com/plugins/
 * @since      1.0.0
 *
 * @package    CH_Reservation
 * @subpackage CH_Reservation/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    CH_Reservation
 * @subpackage CH_Reservation/includes
 * @author     Team HiWordpress <support@icanwp.com>
 */
class CH_Reservation_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		//Unregister Settings
		$settings = array(
			'ch_admin_menu' => array(
				'ch_reservation_input_choicehotels_url',
				'ch_reservation_select_style_option'
				),
			'ch_advanced_menu' => array(
				'ch_reservation_check_open_new_window',
				'ch_reservation_shortcode_text_widget'
				)
		);
		foreach($settings as $setting_section => $setting_fields){
			foreach($setting_fields as $setting_field){
				unregister_setting(
					$setting_section,
					$setting_field
				);
			}
		}
	}
}
