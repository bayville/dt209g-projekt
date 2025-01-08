<?php
function my_theme_register_block_patterns() {
    register_block_pattern(
        'my-theme/section',
        [
            'title'   => __('Section'),
            'content' => '<!-- wp:group {"className":"section"} --><div class="wp-block-group section"></div><!-- /wp:group -->',
        ]
    );
}
add_action('init', 'my_theme_register_block_patterns');