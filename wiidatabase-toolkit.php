<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wiidatabase.de/
 * @since             1.0.0
 * @package           Wiidatabase_Toolkit
 *
 * @wordpress-plugin
 * Plugin Name:       WiiDatabase Toolkit
 * Plugin URI:        https://wiidatabase.de/
 * Description:       The WiiDatabase toolkit provides various shortcodes for WiiDatabase.de. It has only been tested with the WiiDatabase theme!
 * Version:           1.0.0
 * Author:            WiiDatabase.de
 * Author URI:        https://wiidatabase.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wiidatabase-toolkit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WIIDATABASE_TOOLKIT_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wiidatabase-toolkit-activator.php
 */
function activate_wiidatabase_toolkit()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-wiidatabase-toolkit-activator.php';
	Wiidatabase_Toolkit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wiidatabase-toolkit-deactivator.php
 */
function deactivate_wiidatabase_toolkit()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-wiidatabase-toolkit-deactivator.php';
	Wiidatabase_Toolkit_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wiidatabase_toolkit');
register_deactivation_hook(__FILE__, 'deactivate_wiidatabase_toolkit');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wiidatabase-toolkit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wiidatabase_toolkit()
{
	$plugin = new Wiidatabase_Toolkit();
	$plugin->run();
}
run_wiidatabase_toolkit();
