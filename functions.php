<?php

/**
 * Theme support
 */

add_theme_support('post-thumbnails'); // Featured image
require_once get_template_directory() . '/includes/theme-support/custom-logo.php'; // Add custom logo support
require_once get_template_directory() . '/includes/theme-support/custom-block-categories.php';  // Menu
require_once get_template_directory() . '/includes/theme-support/svg.php';    // SVG-support
require_once get_template_directory() . '/includes/theme-support/disable-comments.php'; // Disables comments
require_once get_template_directory() . '/includes/theme-support/block-template-support.php'; // Add block theme-support

// /**
//  * Widgets
//  */


// /**
//  * Custom post types
//  */


// // CTA post type and meta box
require_once get_template_directory() . '/includes/post-types/space-post-type.php';
require_once get_template_directory() . '/includes/meta-boxes/space-meta-box.php';

/**
* Custom blocks
*/

// Import space block
require_once get_template_directory() . '/blocks/space/block.php';

