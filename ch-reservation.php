<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://icanwp.com
 * @since             1.0.0
 * @package           CH_Reservation
 *
 * @wordpress-plugin
 * Plugin Name:       iCanWP Reservation Form Connector for Choice Hotels
 * Plugin URI:        https://icanwp.com/
 * Description:       Creates a reservation form that connects with a specific hotel from ChoiceHotels.com's reservation.
 * Version:           1.4
 * Author:            Web Marketing Smart, Sean Roh, Chris Couweleers
 * Author URI:        https://icanwp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ch-reservation
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ch-reservation-activator.php
 */
function activate_ch_reservation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ch-reservation-activator.php';
	CH_Reservation_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ch-reservation-deactivator.php
 */
function deactivate_ch_reservation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ch-reservation-deactivator.php';
	CH_Reservation_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ch_reservation' );
register_deactivation_hook( __FILE__, 'deactivate_ch_reservation' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ch-reservation.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ch_reservation() {

	$plugin = new CH_Reservation();
	$plugin->run();

}
run_ch_reservation();
