<?php
// Enque script in editor to force post-thumbnail and title


function lock_publish_until_thumbnail() {

  // Affected post-types
  $screens = array('space', 'employee');
  
  // Current post-type
  $screen = get_current_screen();

  if (in_array($screen->post_type, $screens)) {
      wp_enqueue_script(
          'lock-publish-thumbnail',
          get_template_directory_uri() . '/js/lock-post.js',
          ['wp-data', 'wp-edit-post']

      );
  }
}
add_action('admin_enqueue_scripts', 'lock_publish_until_thumbnail');
