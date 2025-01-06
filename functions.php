<?php

/**
 * Theme support
 */

add_theme_support('post-thumbnails'); // Featured image
require_once get_template_directory() . '/includes/theme-support/custom-logo.php'; // Add custom logo support
require_once get_template_directory() . '/includes/theme-support/menus.php';  // Menu
require_once get_template_directory() . '/includes/theme-support/svg.php';    // SVG-support
require_once get_template_directory() . '/includes/theme-support/disable-comments.php'; // Disables comments
require_once get_template_directory() . '/includes/theme-support/disable-gutenberg.php'; // Disables gutenberg för ceratin post-types


// /**
//  * Widgets
//  */

// require_once get_template_directory() . '/includes/widgets/form-widget-php'; // Add form widget

// /**
//  * Custom post types
//  */


// // CTA post type and meta box
require_once get_template_directory() . '/includes/post-types/cta-post-type.php';
require_once get_template_directory() . '/includes/meta-boxes/cta-meta-box.php';


// functions.php eller din block-registreringsfil
require_once get_template_directory() . '/blocks/cta/block.php';

