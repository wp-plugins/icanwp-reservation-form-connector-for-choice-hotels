<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://icanwp.com/plugins/
 * @since      1.0.0
 *
 * @package    CH_Reservation
 * @subpackage CH_Reservation/admin/partials
 */
?>

<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ) . "Advanced Options"; ?></h2>
	<form class="ch-reservation-admin-menu-form" method="post" action="options.php"> 
	<?php 
		settings_fields( 'ch_advanced_menu' );
		do_settings_sections( 'ch_advanced_menu' ); 
		submit_button(); 
	?>
	</form>
</div><!-- .wrap -->
