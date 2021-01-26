<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wiidatabase.de/
 * @since      1.0.0
 *
 * @package    Wiidatabase_Toolkit
 * @subpackage Wiidatabase_Toolkit/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wiidatabase_Toolkit
 * @subpackage Wiidatabase_Toolkit/public
 * @author     WiiDatabase.de <contact@wiidatabase.de>
 */
class Wiidatabase_Toolkit_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wiidatabase-toolkit-public' . (WP_DEBUG === true ? '' : '.min') . '.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		// wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wiidatabase-toolkit-public' . (WP_DEBUG === true ? '' : '.min') . '.js', array('jquery'), $this->version, false);
	}

	/**
	 * The [color-box] shortcode.  Accepts a title plus slim mode and will display a box.
	 *
	 * @param array  $atts     Shortcode attributes. Default empty.
	 * 	Supported attributes are:
	 * 		string	$level	info, warning, danger, success
	 * 		string	$title	Heading title, won't be displayed if slim is true
	 * 		boolean $slim	Enables slim mode (default: false)
	 * @param atring $content  Shortcode content. Default null.
	 *
	 * @since    1.0.0
	 * @return string
	 */
	public function color_box_shortcode($atts, $content)
	{
		// normalize attribute keys, lowercase
		$atts = array_change_key_case((array) $atts, CASE_LOWER);

		// override default attributes with user attributes
		$shortcode_atts = shortcode_atts([
			'color' => '',
			'level' => 'info',
			'title' => '',
			'slim' => false
		], $atts);
		$shortcode_atts['slim'] = filter_var($shortcode_atts['slim'], FILTER_VALIDATE_BOOLEAN);

		// Backwards compatibility with WiiDatabase Boxes plugin
		if (!empty($shortcode_atts['color'])) {
			switch ($shortcode_atts['color']) {
				case 'blue':
					$shortcode_atts['level'] = 'info';
					break;
				case 'yellow':
					$shortcode_atts['level'] = 'warning';
					break;
				case 'red':
					$shortcode_atts['level'] = 'danger';
					break;
				case 'green':
					$shortcode_atts['level'] = 'success';
					break;
				default:
					$shortcode_atts['level'] = 'info';
			}
		}

		// start output
		// Main box
		$output = '<div class="wiidatabase-box wiidatabase-box-' . esc_attr($shortcode_atts['level']) . ($shortcode_atts['slim'] === true ? ' wiidatabase-box-slim' : '') . '">';

		// Body
		$output .= '<div class="wiidatabase-box-body">';
		if (!empty($shortcode_atts['title']) && $shortcode_atts['slim'] === false) {
			// Add title only if slim mode is not enabled
			$output .= '<h3 class="wiidatabase-box-heading">' . esc_attr($shortcode_atts['title']) . '</h3>';
		}

		// Text
		$output .= '<div class="wiidatabase-box-text">';
		$output .= do_shortcode($content);

		// Closing
		$output .= '</div>'; // ./wiidatabase-box-text
		$output .= '</div>'; // ./wiidatabase-box-body
		$output .= '</div>'; // ./wiidatabase-box

		return $output;
	}

	/**
	 * The [spoiler] shortcode.  Accepts a title and will display an expandable spoiler.
	 *
	 * @param array  $atts     Shortcode attributes. Default empty.
	 * 	Supported attributes are:
	 * 		string	$title		Spoiler title (default: "Spoiler")
	 * 		boolean $expanded	Expands the spoiler by default (default: false)
	 * @param atring $content  Shortcode content. Default null.
	 *
	 * @since    1.0.0
	 * @return string
	 */
	public function spoiler_shortcode($atts, $content)
	{
		// normalize attribute keys, lowercase
		$atts = array_change_key_case((array) $atts, CASE_LOWER);

		// override default attributes with user attributes
		$shortcode_atts = shortcode_atts([
			'title' => 'Spoiler',
			'initial_state' => 'collapsed',
			'expanded' => false
		], $atts);
		$shortcode_atts['expanded'] = filter_var($shortcode_atts['expanded'], FILTER_VALIDATE_BOOLEAN);

		// Backwards compatibility with Inline Spoilers plugin
		if ($shortcode_atts['initial_state'] === 'expanded') {
			$shortcode_atts['expanded'] = true;
		}

		// start output
		$output = $shortcode_atts['expanded'] === true ? '<details open>' : '<details>';
		$output .= '<summary>' . esc_attr($shortcode_atts['title'])  . '</summary>';
		$output .= '<div class="spoiler-body">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output .= '</details>';

		return $output;
	}
}
