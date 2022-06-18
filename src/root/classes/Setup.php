<?php

namespace WiiDatabase\Toolkit;

class Setup
{
    private string $plugin_dir;
    private string $plugin_version;

    public function __construct(string $plugin_dir, string $plugin_version)
    {
        $this->plugin_dir = $plugin_dir;
        $this->plugin_version = $plugin_version;
        add_action('wp_enqueue_scripts', [$this, 'wp_enqueue_scripts']);
    }

    public function wp_enqueue_scripts(): void
    {
        wp_enqueue_style(
            'wiidatabase-toolkit-style',
            $this->plugin_dir.'assets/css/style.css',
            [],
            $this->plugin_version
        );
    }
}
