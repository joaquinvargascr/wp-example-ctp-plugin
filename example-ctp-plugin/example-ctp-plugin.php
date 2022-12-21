<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress or ClassicPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jvargas.site/
 * @since             1.0.0
 * @package           Example_Ctp_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Example CPT Plugin
 * Plugin URI:        https://plugin.com/example-ctp-plugin-uri/
 * Description:       The plugin registers a custom post type and custom meta field, adds a text box for managing the meta field, and displays the meta field in the WordPress REST API response for the custom post type.
 * Version:           1.0.0
 * Author:            Joaquin Vargas
 * Requires at least: 1.0.0
 * Requires PHP:      7.4
 * Tested up to:      6.1
 * Author URI:        https://jvargas.site//
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       example-ctp-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EXAMPLE_CTP_PLUGIN_VERSION', '1.0.0' );

/**
 * Define the Plugin basename
 */
define( 'EXAMPLE_CTP_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 *
 * This action is documented in includes/class-example-ctp-plugin-activator.php
 * Full security checks are performed inside the class.
 */
function ecp_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-example-ctp-plugin-activator.php';
	Example_Ctp_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 *
 * This action is documented in includes/class-example-ctp-plugin-deactivator.php
 * Full security checks are performed inside the class.
 */
function ecp_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-example-ctp-plugin-deactivator.php';
	Example_Ctp_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'ecp_activate' );
register_deactivation_hook( __FILE__, 'ecp_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-example-ctp-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * Generally you will want to hook this function, instead of callign it globally.
 * However since the purpose of your plugin is not known until you write it, we include the function globally.
 *
 * @since    1.0.0
 */
function ecp_run() {

	$plugin = new Example_Ctp_Plugin();
	$plugin->run();

}

ecp_run();
