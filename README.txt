=== WiiDatabase Toolkit ===
Contributors: WiiDatabase Team
Donate link: https://wiidatabase.de/
Tags: shortcodes
Requires at least: 5.0
Tested up to: 5.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The WiiDatabase Toolkit provides various shortcodes for WiiDatabase.de. It has only been tested with the WiiDatabase theme!

== Description ==

The WiiDatabase Toolkit ships the following shortcodes:

* [color-box]
* [spoiler]

= color-box =
Displays a colored box according to its level. Supports the following arguments:

* `title`: Heading of the box (default: none)
* `level`: Color of the box: `info` = blue, `warning` = yellow, `danger` = red, `success` = green (default: `info`)
* `slim`: Shrink box (default: `false`) - NOTE: Title won't be shown!

= spoiler =
Displays an expandable spoiler. Works without JavaScript!

* `title`: Heading of the spoiler (default: "Spoiler")
* `expanded`: Expand the spoiler by default (default: `false`)

== Installation ==

1. Upload the folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. color-box shortcode
2. spoiler shortcode

== Changelog ==

= 1.0 =
* Stable release

== Upgrade Notice ==

= 1.0 =
First stable release.
