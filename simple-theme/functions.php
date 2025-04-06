<?php
// Register stylesheets and scripts
function simple_theme_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'simple_theme_enqueue_styles');
