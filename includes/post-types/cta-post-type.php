<?php
// Skapa CTA-posttyp
function create_cta_cpt()
{
  $args = array(
    'labels' => array(
      'name' => __('CTAs', 'gefle-workspace'),
      'singular_name' => __('CTA', 'gefle-workspace'),
      'add_new' => 'Lägg till ny',
      'add_new_item' => __('Lägg till ny CTA', 'gefle-workspace'),
      'edit_item' => __('Redigera CTA', 'gefle-workspace'),
      'new_item' => __('Ny CTA', 'gefle-workspace'),
      'view_item' => __('Visa CTA', 'gefle-workspace'),
      'search_items' => __('Sök CTAs', 'gefle-workspace'),
      'not_found' => __('Inga CTAs hittades', 'gefle-workspace'),
      'not_found_in_trash' => __('Inga CTAs hittade i papperskorgen', 'gefle-workspace'),
      'parent_item_colon' => '',
      'all_items' => __('Alla CTAs', 'gefle-workspace'),
      'menu_name' => __('Call to Action', 'gefle-workspace'),
    ),
    'public' => true,
    'has_archive' => false, // Disable archive
    'show_in_rest' => true, // Allow to be found in api
    'supports' => array('title'), // Support title
    'menu_icon' => 'dashicons-megaphone', // Icon
  );
  register_post_type('cta', $args);
}
add_action('init', 'create_cta_cpt');
?>