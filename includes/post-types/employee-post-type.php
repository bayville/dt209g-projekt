<?php
// Create space-post-type
function create_employee()
{
    $args = array(
        'labels' => array(
            'name' => __('Anställda', 'gefle-workspace'),
            'singular_name' => __('Anställd', 'gefle-workspace'),
            'add_new' => __('Lägg till ny', 'gefle-workspace'),
            'add_new_item' => __('Lägg till ny Anställd', 'gefle-workspace'),
            'edit_item' => __('Redigera Anställd', 'gefle-workspace'),
            'new_item' => __('Ny Anställd', 'gefle-workspace'),
            'view_item' => __('Visa Anställd', 'gefle-workspace'),
            'search_items' => __('Sök Anställda', 'gefle-workspace'),
            'not_found' => __('Inga Anställda hittades', 'gefle-workspace'),
            'not_found_in_trash' => __('Inga Anställda hittade i papperskorgen', 'gefle-workspace'),
            'parent_item_colon' => '',
            'all_items' => __('Alla Anställda', 'gefle-workspace'),
            'menu_name' => __('Anställda', 'gefle-workspace'),
        ),
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'editor'),
        'menu_icon' => 'dashicons-admin-users',
        'rewrite' => array(
            'slug' => 'employee',
            'with_front' => false,
        ),
    );
    register_post_type('employee', $args);
}
add_action('init', 'create_employee');