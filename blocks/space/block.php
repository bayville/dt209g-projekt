<?php
// Register the block
function register_space_block()
{
	register_block_type('gefle-workspace/space-block', array(
		'editor_script' => 'gefle-workspace-space-block', // load script to recieve props
		'attributes' => array(
			'postsToShow' => array(
				'type' => 'number',
				'default' => 3,
			),
			'variant' => array(
				'type' => 'string',
				'default' => 'variant-1', // Standardlayout
			),
		),
		'render_callback' => 'render_space_block'
	));
}
add_action('init', 'register_space_block');

// Render the block
function render_space_block($attributes)
{
	$posts_to_show = isset($attributes['postsToShow']) ? $attributes['postsToShow'] : 3;
	$variant = isset($attributes['variant']) ? $attributes['variant'] : 'variant-1';
	$output = "";

	// Get all spaces
	$args = array(
		'post_type' => 'space',
		'posts_per_page' => $posts_to_show,
	);
	$spaces_query = new WP_Query($args);

	// Output
	if ($spaces_query->have_posts()) {

		ob_start(); // Output-buffering

		// Switch to choose layout
		switch ($variant) {
			case "variant-1":
				include get_template_directory() . '/blocks/space/layout-variant-1.php';
				break;
			case "variant-2":
				include get_template_directory() . '/blocks/space/layout-variant-2.php';
				break;
			case "variant-1-sidebar":
				include get_template_directory() . '/blocks/space/layout-variant-1-sidebar.php';
				break;
			case "variant-2-sidebar":
				include get_template_directory() . '/blocks/space/layout-variant-2-sidebar.php';
				break;
			default:
				include get_template_directory() . '/blocks/space/layout-variant-1.php';
		}

		// Get output-buffer
		$output = ob_get_clean();

		// Reset postdata and return output
		wp_reset_postdata();
		return $output;
	}

	wp_reset_postdata();
	return ''; // Retrurn empty strig
}


// Register js for gutenberg-block
function enqueue_space_block_assets()
{
	wp_enqueue_script(
		'gefle-workspace-space-block',  // Script-name
		get_template_directory_uri() . '/blocks/space/build/index.js',
		array('wp-blocks', 'wp-element', 'wp-editor'),
		filemtime(get_template_directory() . '/blocks/space/build/index.js')
	);
}
add_action('enqueue_block_editor_assets', 'enqueue_space_block_assets');
