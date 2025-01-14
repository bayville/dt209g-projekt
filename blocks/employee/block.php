<?php
// Register the block
function register_employee_block()
{
	register_block_type('gefle-workspace/employee-block', array(
		'editor_script' => 'gefle-workspace-employee-block',
		'attributes' => array(
			'postsToShow' => array(
				'type' => 'number',
				'default' => 3,
			),
		),
		'render_callback' => 'render_employee_block', // Flytta hit
	));
}
add_action('init', 'register_employee_block');

// Render the block
function render_employee_block($attributes)
{
	$posts_to_show = isset($attributes['postsToShow']) ? $attributes['postsToShow'] : 3;
	$output = "";

	// Get all employees
	$args = array(
		'post_type' => 'employee',
		'posts_per_page' => $posts_to_show,
	);
	$employees_query = new WP_Query($args);

	// Output
	if ($employees_query->have_posts()) {
		ob_start(); // Output-buffering

		// Render layout
		include get_template_directory() . '/blocks/employee/layout-variant-1.php';


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
function enqueue_employee_block_assets()
{
	wp_enqueue_script(
		'gefle-workspace-employee-block',  // Script-name
		get_template_directory_uri() . '/blocks/employee/build/index.js',
		array('wp-blocks', 'wp-element', 'wp-editor'),
		filemtime(get_template_directory() . '/blocks/employee/build/index.js')
	);
}
add_action('enqueue_block_editor_assets', 'enqueue_employee_block_assets');
