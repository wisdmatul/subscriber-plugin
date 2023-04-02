<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://atul.com
 * @since      1.0.0
 *
 * @package    Subscriber_Email
 * @subpackage Subscriber_Email/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Subscriber_Email
 * @subpackage Subscriber_Email/includes
 * @author     atul.com/atul-plugin <atul@atul.com>
 */
class Subscriber_Email_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'subscriber-email',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
