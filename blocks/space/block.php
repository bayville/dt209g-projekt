<?php
// Register the block
function register_space_block() {
    register_block_type('gefle-workspace/space-block', array(
        'editor_script' => 'gefle-workspace-space-block', // load script to recieve props
        'attributes' => array(
            'postsToShow' => array(
                'type' => 'number',
                'default' => 3,  // Default
            ),
        ),
        'render_callback' => 'render_space_block'
    ));
}
add_action('init', 'register_space_block');

// Render the block
function render_space_block($attributes) {

    // Get number of posts from the editor-script default = 3
    $posts_to_show = isset($attributes['postsToShow']) ? $attributes['postsToShow'] : 3;

    // Get all spaces
    $args = array(
        'post_type' => 'space',  // Post type
        'posts_per_page' => $posts_to_show,
    );
    $spaces_query = new WP_Query($args);

    // Build the output for render
    if ($spaces_query->have_posts()) {
        $output = '<section class="section bg-smoke spaces">';
        $output .= '<div class="container text-black">';
        $output .= '<h2 class="text-center mb-2xl">Våra spaces</h2>';
        $output .= '<div class="space__container d-grid bp-md:grid-cols-3 gap-lg">';

        while ($spaces_query->have_posts()) {
            $spaces_query->the_post();
            $output .= '<article class="spaces__card radius-md"> <div> <!--  Innehåll per space --> ';

            // Show post thumbnail
            if (has_post_thumbnail()) {
                $output .= get_the_post_thumbnail(null, 'large', array('class' => ' '));
            }

            // Post title
            $output .= '</div><div class="p-md"><h3 class="text-xl">' . get_the_title() . '</h3>';
            
            // Get price from custom field
            if ($price = get_post_meta(get_the_ID(), 'price', true)) {
                $output .= '<p class="text-sm">' . esc_html($price) . ' SEK</p>';
            }
            $output .= '<p>' . get_the_excerpt() . '</p>';
            
            $output .= '<div class="py-md"><a href="' . esc_url(get_permalink(get_the_ID())) . '" class="btn bg-yellow">Se mer info</a></div>';

            $output .= '</article>';
        }

        $output .= '</div></div></section>';
    } else {
        $output = null;
    }

    wp_reset_postdata();

    return $output;
}



// Register js for gutenberg-block
function enqueue_space_block_assets() {
    wp_enqueue_script(
        'gefle-workspace-space-block',  // Script-name
        get_template_directory_uri() . '/blocks/space/build/index.js',
        array('wp-blocks', 'wp-element', 'wp-editor'),
        filemtime(get_template_directory() . '/blocks/space/build/index.js')
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_space_block_assets');
