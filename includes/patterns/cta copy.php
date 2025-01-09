<?php
function my_theme_register_cta_pattern()
{
    register_block_pattern(
        'gefle-workspace/cta',
        [
            'title'   => __('CTA'),
            'content'     => '
<!-- wp:group {"className":"section","backgroundColor":"green"} -->
<div class="wp-block-group section has-green-background-color has-background"><!-- wp:group {"className":"container text-center"} -->
<div class="wp-block-group container text-center"><!-- wp:heading {"className":"mb-md","style":{"elements":{"link":{"color":{"text":"var:preset|color|blue"}}}},"textColor":"blue"} -->
<h2 class="wp-block-heading mb-md has-blue-color has-text-color has-link-color">Redo att bli en del av vår gemenskap?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"mb-lg","style":{"elements":{"link":{"color":{"text":"var:preset|color|blue"}}}},"textColor":"blue"} -->
<p class="mb-lg has-blue-color has-text-color has-link-color">Boka en plats idag och upptäck ditt nya kreativa hem.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"blue","textColor":"white","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-blue-background-color has-text-color has-background has-link-color wp-element-button">Boka Plats</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
                ',
        ]
    );
}
add_action('init', 'my_theme_register_cta_pattern');
