=== iCanWP Reservation Form Connector for Choice Hotels ===
Contributors: devcon1
Tags: choicehotels reservation, choice hotel reservation, choicehotels booking, choice hotel booking
Requires at least: 3.0.1
Tested up to: 4.2.2
Stable tag: 4.2.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates reservation form that connects with Choicehotels.com reservation system.

== Description ==
iCanWP Reservation Form Connector for Choice Hotels is developed for Wordpress hosted ChoiceHotel websites to have own reservation form that connects to the dedicated hotel's reservation page on ChoiceHotels.com. This feature makes the reservation process easier for the hotel's customers and prevents them to go directly to the ChoiceHotels.com and compare against competitors. As of July 30th, 2015, it is confirmed to work with the following franchise of ChoiceHotels:

* Ascend Hotel Collection
* Comfort Inn
* Comfort Suites
* Sleep Inn
* Quality Inn
* Clarion
* MainStay Suites
* Suburban
* Econolodge
* Rodeway Inn
* Any other branches or franchise of ChoiceHotels using ChoiceHotels.com

== Installation ==
This section describes how to install the plugin and get it working.

1. Upload 'ch-reservation' directory to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use shortcode '[ch-reservation rows=1]' in posts or pages. The plugin is responsive, but has required minimum width. Please use between 1 ~ 4 options in the 'rows=' section of the shortcode to adjust the display width on your desired section of the website.
4. If you enable 'Allow Shortcode from the "Text" widget', you can also use it in the text widget.

Please see the detailed screenshot and guide in the plugin settings or from the website https://icanwp.com/plugins/choicehotels-plugin/ 


== Uninstall ==

* All saved options will be deleted from the database. Use disable plugin if you are going to use the plugin again.


== Frequently Asked Questions ==

1. Does it use jQuery in noConflice mode for Wordpress?
Yes.
2. Is the display setting responsive?
Yes.
3. Does it work on mobile setting?
Yes.


== Screenshots ==

1. screenshot-options.jpg shows the basic configuration options for the plugin.
2. screenshot-advanced-options.jpg shows the advanced options you can use to disable/enable jQuery and its extensions to avoid possible conflict with poorly developed plugins.
3. screenshot-shortcodes.jpg shows the shortcode options users can use to display the reservation form.

== Changelog ==
= 1.0 =
* Base version was released

= 1.1 =
* Do shortcode in widget area has made in options

= 1.2 =
* Different rows setting became available for width compatibility in different sized area display

= 1.3 =
* Advanced options include loading/not loading jQuery, jQuery datepicker, jQuery ui spinner through the dependency to avoid possible conflict with other plugins

= 1.4 =
* Selection of any day for check-in made available regardless of the checkout date to improve usability.

== Support ==
* This plugin is provided as is without any warranty. However, this plugin will be tested and updated periodically to work with the ChoiceHotels' reservation system and latest version of WordPress.
* All supports maybe available voluntarily by the development team.
* Any suggestions, complaints, support requests are happily accepted via email at support@icanwp.com

== Limitation ==
* Please use only 1 reservation form per page or post to use it without any error.