<?php
// Menus
add_action('init', 'register_menus');

function register_menus()
{
  register_nav_menus(
    [
      'main-menu' => 'Huvudmeny',
      'footer-menu' => 'Sidfotsmeny',
    ]
  );
}

?>