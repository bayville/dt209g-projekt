<?php
function load_theme_assets() {
    // Get theme version for cache busting
    $theme_version = wp_get_theme()->get('Version');
    
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap',
        [],
        null
    );

    // Variable for css-file
    $css_file = get_template_directory_uri() . '/css/style.css';

    // Front-end-styles
    if (!is_admin()) {
        wp_enqueue_style('theme-style', $css_file, [], $theme_version);
    }
}

// Add block-theme support
function my_block_theme_setup() {
    add_theme_support('block-templates');
    add_theme_support('block-template-parts');
    add_theme_support('core-block-patterns');
    add_theme_support('editor-styles');
    
    // Editor-styles
    add_editor_style('css/style.css');
}

add_action('after_setup_theme', 'my_block_theme_setup');
add_action('wp_enqueue_scripts', 'load_theme_assets');