<?php
// Create space-post-type
function create_space_cpt()
{
    $args = array(
        'labels' => array(
            'name' => __('Platser', 'gefle-workspace'),
            'singular_name' => __('Plats', 'gefle-workspace'),
            'add_new' => __('Lägg till ny', 'gefle-workspace'),
            'add_new_item' => __('Lägg till ny plats', 'gefle-workspace'),
            'edit_item' => __('Redigera Plats', 'gefle-workspace'),
            'new_item' => __('Ny Plats', 'gefle-workspace'),
            'view_item' => __('Visa Plats', 'gefle-workspace'),
            'search_items' => __('Sök Platser', 'gefle-workspace'),
            'not_found' => __('Inga Platser hittades', 'gefle-workspace'),
            'not_found_in_trash' => __('Inga Platser hittade i papperskorgen', 'gefle-workspace'),
            'parent_item_colon' => '',
            'all_items' => __('Alla Platser', 'gefle-workspace'),
            'menu_name' => __('Platser', 'gefle-workspace'),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'editor'),
        'menu_icon' => 'dashicons-desktop',
        'rewrite' => array(
            'slug' => 'kontor',
            'with_front' => false,
        ),
        'capability_type' => 'space',
        'capabilities' => array(
            'edit_post' => 'edit_space',
            'read_post' => 'read_space',
            'delete_post' => 'delete_space',
            'edit_posts' => 'edit_spaces',
            'edit_others_posts' => 'edit_others_spaces',
            'publish_posts' => 'publish_spaces',
            'read_private_posts' => 'read_private_spaces',
        ),
        'map_meta_cap' => true,
    );
    register_post_type('space', $args);
}
add_action('init', 'create_space_cpt');

// Give rights to admins only
function add_space_capabilities()
{
    $role = get_role('administrator');
    if ($role) {
        $role->add_cap('edit_space');
        $role->add_cap('read_space');
        $role->add_cap('delete_space');
        $role->add_cap('edit_spaces');
        $role->add_cap('edit_others_spaces');
        $role->add_cap('publish_spaces');
        $role->add_cap('read_private_spaces');
    }
}
add_action('admin_init', 'add_space_capabilities');