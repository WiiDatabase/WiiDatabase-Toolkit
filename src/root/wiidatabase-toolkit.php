<?php

/**
 * Plugin Name:       WiiDatabase Toolkit
 * Plugin URI:        https://wiidatabase.de/
 * Description:       The WiiDatabase toolkit provides various shortcodes for WiiDatabase.de. It has only been tested with the WiiDatabase theme!
 * Version:           __WIIDATABASE_VERSION_REPLACED_AT_BUILD__
 * Author:            WiiDatabase.de
 * Author URI:        https://wiidatabase.de/
 * License:           Unlicense
 * Requires at least: 5.8
 * Tested up to: 5.8
 * Requires PHP: 8.0
 */
require_once dirname(__FILE__).'/vendor/autoload.php';

use WiiDatabase\Toolkit;
use WiiDatabase\Toolkit\Shortcode;

new Toolkit\Setup(plugin_dir_url(__FILE__), '__WIIDATABASE_VERSION_REPLACED_AT_BUILD__');

new Shortcode\ColorBoxShortcode();
new Shortcode\SpoilerShortcode();
