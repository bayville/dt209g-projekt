<?php
function register_custom_block_pattern_categories() {
  if ( function_exists( 'register_block_pattern_category' ) ) {
      register_block_pattern_category(
          'custom-pages',
          array( 'label' => __( 'Sidor', 'gefle-workspace' ) )
      );

      register_block_pattern_category(
          'gefle-workspace-pattern',
          array( 'label' => __( '1. Gefle Workspace Mönster', 'gefle-workspace' ) )
      );

      register_block_pattern_category(
          'custom-widgets',
          array( 'label' => __( 'Widgets', 'gefle-workspace' ) )
      );
  }
}
add_action( 'init', 'register_custom_block_pattern_categories' );

?>