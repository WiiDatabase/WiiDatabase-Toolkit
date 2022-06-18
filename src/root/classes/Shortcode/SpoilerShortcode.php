<?php

namespace WiiDatabase\Toolkit\Shortcode;

class SpoilerShortcode
{
    private const SHORTCODE = 'spoiler';

    private const TITLE_ATTRIBUTE = 'title';
    private const INITIAL_STATE_ATTRIBUTE = 'initial_state';
    private const EXPANDED_ATTRIBUTE = 'expanded';

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
            self::TITLE_ATTRIBUTE => 'Spoiler',
            self::INITIAL_STATE_ATTRIBUTE => 'collapsed',
            self::EXPANDED_ATTRIBUTE => false,
        ], $atts);
        $shortcode_atts[self::EXPANDED_ATTRIBUTE] = filter_var(
            $shortcode_atts[self::EXPANDED_ATTRIBUTE],
            FILTER_VALIDATE_BOOLEAN
        );

        // Backwards compatibility with Inline Spoilers plugin
        if (self::EXPANDED_ATTRIBUTE === $shortcode_atts[self::INITIAL_STATE_ATTRIBUTE]) {
            $shortcode_atts[self::EXPANDED_ATTRIBUTE] = true;
        }

        $output = true === $shortcode_atts[self::EXPANDED_ATTRIBUTE] ? '<details open>' : '<details>';
        $output .= '<summary>'.esc_attr($shortcode_atts[self::TITLE_ATTRIBUTE]).'</summary>';
        $output .= '<div class="spoiler-body">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        $output .= '</details>';

        return $output;
    }
}
