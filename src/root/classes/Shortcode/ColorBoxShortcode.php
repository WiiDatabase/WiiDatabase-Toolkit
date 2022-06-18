<?php

namespace WiiDatabase\Toolkit\Shortcode;

class ColorBoxShortcode
{
    private const SHORTCODE = 'color-box';

    private const COLOR_ATTRIBUTE = 'color';
    private const LEVEL_ATTRIBUTE = 'level';
    private const TITLE_ATTRIBUTE = 'title';
    private const SLIM_ATTRIBUTE = 'slim';

    public function __construct()
    {
        add_shortcode(self::SHORTCODE, [$this, 'render']);
    }

    public function render(string|array $atts, ?string $content = null): string
    {
        if (is_string($atts)) {
            $atts = [];
        }

        $atts = array_change_key_case($atts, CASE_LOWER);

        $shortcode_atts = shortcode_atts([
            self::COLOR_ATTRIBUTE => '',
            self::LEVEL_ATTRIBUTE => 'info',
            self::TITLE_ATTRIBUTE => '',
            self::SLIM_ATTRIBUTE => false,
        ], $atts);
        $shortcode_atts[self::SLIM_ATTRIBUTE] = filter_var(
            $shortcode_atts[self::SLIM_ATTRIBUTE],
            FILTER_VALIDATE_BOOLEAN
        );

        // Backwards compatibility with WiiDatabase Boxes plugin
        if (!empty($shortcode_atts['color'])) {
            $shortcode_atts[self::LEVEL_ATTRIBUTE] = match ($shortcode_atts[self::COLOR_ATTRIBUTE]) {
                'yellow' => 'warning',
                'red' => 'danger',
                'green' => 'success',
                default => 'info',
            };
        }

        $output = sprintf(
            '<div class="wiidatabase-box wiidatabase-box-%1$s%2$s" role="alert">',
            esc_attr($shortcode_atts[self::LEVEL_ATTRIBUTE]),
            esc_attr($shortcode_atts[self::SLIM_ATTRIBUTE] ? ' wiidatabase-box-slim' : '')
        );

        $output .= '<div class="wiidatabase-box-body">';

        if (false === $shortcode_atts[self::SLIM_ATTRIBUTE] && !empty($shortcode_atts[self::TITLE_ATTRIBUTE])) {
            $output .= sprintf(
                '<h3 class="wiidatabase-box-heading">%1$s</h3>',
                esc_html($shortcode_atts[self::TITLE_ATTRIBUTE])
            );
        }

        // Text
        $output .= '<div class="wiidatabase-box-text">';
        $output .= do_shortcode($content);

        $output .= '</div>'; // ./wiidatabase-box-text
        $output .= '</div>'; // ./wiidatabase-box-body
        $output .= '</div>'; // ./wiidatabase-box

        return $output;
    }
}
