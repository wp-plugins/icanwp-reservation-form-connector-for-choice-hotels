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
	<h2><?php echo esc_html( get_admin_page_title() ); ?> </h2>
	<form class="ch-reservation-admin-menu-form" method="post" action="options.php"> 
	<?php 
		settings_fields( 'ch_admin_menu' );
		do_settings_sections( 'ch_admin_menu' ); 
		submit_button(); 
	?>
	</form>
	<h4>"Reservation Form Style" field:</h4>
		<p>Depending on the option you select, the form will change the theme color to the main theme color of the hotel category. (i.e. Comfort Inn = Blue)</p>
	<h3>Configuration Instruction</h3>
		<h4>"ChoiceHotels Website URL" field:</h4>
		<ol>
			<li>Please go to the hotel's specific registration page from ChoiceHotels.com.</li>
			<li>Copy the URL (website address) of your hotel's dedicated page from ChoiceHotels.com</li>
			<li>Paste the URL into the "ChoiceHotels Website URL" field on this page.</li>
		</ol>
		<img src="<?php echo plugins_url() . '/ch-reservation/admin/assets/choicehotels-location-url.png' ?>" />
		<div class="clearfix"></div>
	<div class="ch_reservation-plugin-desc">
		<h3>How to display the form</h3>
		<p><strong>Shortcode Method:</strong> copy and paste <span class="ch_shortcode_select">&nbsp;&nbsp;&nbsp;&nbsp;<strong> [ch-reservation] </strong>&nbsp;&nbsp;&nbsp;&nbsp;</span> to the content area of any pages and or posts.</p>
		<p>Please go to "<a href="<?php echo admin_url( 'admin.php?page=ch_advanced_menu'); ?>">Advanced Options</a>" page for using a shortcode in the text widget to display the reservation form on the sidebar.</p>
		<p><strong>Choose Your Fit:</strong></p>
		<p><strong>One Row:</strong> <span class="ch_shortcode_select">&nbsp;&nbsp;&nbsp;&nbsp;<strong> [ch-reservation rows=1] </strong>&nbsp;&nbsp;&nbsp;&nbsp;</span></p><img src="<?php echo plugins_url() . '/ch-reservation/admin/assets/one-row.png' ?>" />
		<hr>
		<p><strong>Two Rows:</strong> <span class="ch_shortcode_select">&nbsp;&nbsp;&nbsp;&nbsp;<strong> [ch-reservation rows=2] </strong>&nbsp;&nbsp;&nbsp;&nbsp;</span></p><img src="<?php echo plugins_url() . '/ch-reservation/admin/assets/two-rows.png' ?>" />
		<hr>
		<p><strong>Three Rows:</strong> <span class="ch_shortcode_select">&nbsp;&nbsp;&nbsp;&nbsp;<strong> [ch-reservation rows=3] </strong>&nbsp;&nbsp;&nbsp;&nbsp;</span></p><img src="<?php echo plugins_url() . '/ch-reservation/admin/assets/three-rows.png' ?>" />
		<hr>
		<p><strong>Four Rows:</strong> <span class="ch_shortcode_select">&nbsp;&nbsp;&nbsp;&nbsp;<strong> [ch-reservation rows=4] </strong>&nbsp;&nbsp;&nbsp;&nbsp;</span></p><img src="<?php echo plugins_url() . '/ch-reservation/admin/assets/four-rows.png' ?>" />
		<div class="clearfix"></div>
		<p><i>Thank you for using our plugin! Please rate, review etc <a href="#">....</a></i></p>
	
	</div>
</div><!-- .wrap -->
