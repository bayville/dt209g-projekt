<?php
function register_custom_block_pattern_categories() {
  if ( function_exists( 'register_block_pattern_category' ) ) {
      register_block_pattern_category(
          'custom-pages',
          array( 'label' => __( 'Sidor', 'gefle-workspace' ) )
      );
  }
}
add_action( 'init', 'register_custom_block_pattern_categories' );

?>