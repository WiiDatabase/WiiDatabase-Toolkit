=== WiiDatabase Toolkit ===
Contributors: WiiDatabase Team
Donate link: https://wiidatabase.de/
Tags: shortcodes
Requires PHP: 8.0
Requires at least: 6.0
Tested up to: 6.0
Stable tag: 2.0
License: Unlicense

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

== Changelog ==

= 2.0 =
* Reorganize code with Autoloader
* Fix margin in boxes

= 1.0 =
* Stable release

