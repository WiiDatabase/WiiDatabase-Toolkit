<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wiidatabase.de/
 * @since      1.0.0
 *
 * @package    Wiidatabase_Toolkit
 * @subpackage Wiidatabase_Toolkit/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wiidatabase_Toolkit
 * @subpackage Wiidatabase_Toolkit/includes
 * @author     WiiDatabase.de <contact@wiidatabase.de>
 */
class Wiidatabase_Toolkit_i18n
{


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain()
	{
		load_plugin_textdomain(
			'wiidatabase-toolkit',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
