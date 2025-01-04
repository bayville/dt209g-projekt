<?php
// Enable support for custom logo
$args = array(
  'width' => 140,
  'height' => 30,
  'flex-height' => true,
  'flex-width'  => true,
  'default-image' => get_template_directory_uri() . '/img/1.jpg'
);

add_theme_support('custom-logo', $args);
?>