<?php function register_cta_block() {
  if (!function_exists('register_block_type')) {
      return;
  }

  // Register block
  register_block_type('gefle-workspace/cta', array(
      'editor_script' => 'cta-editor-script',
      'editor_style'  => 'cta-editor-style',
      'attributes' => array(
          'content' => array(
              'type' => 'string',
              'source' => 'html',
              'selector' => 'p',
              'default' => ''
          )
      ),
      'render_callback' => 'cta_block_render'
  ));
}
add_action('init', 'register_cta_block');

// Editor-assets
function enqueue_cta_editor_assets() {
  // Editor scripts
  wp_register_script(
      'cta-editor-script',
      get_template_directory_uri() . '/blocks/cta/build/index.js',
      array(
          'wp-blocks',
          'wp-i18n',
          'wp-element',
          'wp-block-editor',
          'wp-components'
      ),
      filemtime(get_template_directory() . '/blocks/cta/build/index.js')
  );

  // Editor style
  wp_register_style(
      'cta-editor-style',
      get_template_directory_uri() . '/css/style.css',
      array('wp-edit-blocks'),
      filemtime(get_template_directory() . '/css/style.css')
  );
}
add_action('enqueue_block_editor_assets', 'enqueue_cta_editor_assets');


?>