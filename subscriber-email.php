<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://atul.com
 * @since             1.0.0
 * @package           Subscriber_Email
 *
 * @wordpress-plugin
 * Plugin Name:       subscriber email
 * Plugin URI:        https://atul.com/atul-plugin
 * Description:       email the subscriber the required details
 * Version:           1.0.0
 * Author:            atul.com/atul-plugin
 * Author URI:        https://atul.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       subscriber-email
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SUBSCRIBER_EMAIL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-subscriber-email-activator.php
 */
function activate_subscriber_email() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-subscriber-email-activator.php';
	Subscriber_Email_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-subscriber-email-deactivator.php
 */
function deactivate_subscriber_email() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-subscriber-email-deactivator.php';
	Subscriber_Email_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_subscriber_email' );
register_deactivation_hook( __FILE__, 'deactivate_subscriber_email' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-subscriber-email.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_subscriber_email() {

	$plugin = new Subscriber_Email();
	$plugin->run();

}
run_subscriber_email();
