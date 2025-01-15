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
        'capability_type' => 'employee',
        'capabilities' => array(
            'edit_post' => 'edit_employee',
            'read_post' => 'read_employee',
            'delete_post' => 'delete_employee',
            'edit_posts' => 'edit_employees',
            'edit_others_posts' => 'edit_others_employees',
            'publish_posts' => 'publish_employees',
            'read_private_posts' => 'read_private_employees',
        ),
    );
    register_post_type('employee', $args);
}
add_action('init', 'create_employee');

// Give rights to admins only
function add_employee_capabilities()
{
    $role = get_role('administrator');
    if ($role) {
        $role->add_cap('edit_employee');
        $role->add_cap('read_employee');
        $role->add_cap('delete_employee');
        $role->add_cap('edit_employees');
        $role->add_cap('edit_others_employees');
        $role->add_cap('publish_employees');
        $role->add_cap('read_private_employees');
    }
}
add_action('admin_init', 'add_employee_capabilities');