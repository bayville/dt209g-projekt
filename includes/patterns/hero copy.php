<?php
function gefle_workspace_register_hero_pattern()
{
  register_block_pattern(
    'gefle-workspace/hero',
    [
      'title'   => __('Hero'),
      'content'     => '

<!-- wp:group {"tagName":"section","className":"section","backgroundColor":"blue"} -->
<section class="wp-block-group section has-blue-background-color has-background">

<!-- wp:group {"className":"container-m d-flex flex-column h-100 align-items-flex-start"} -->
<div class="wp-block-group container-m d-flex flex-column h-100 align-items-flex-start">
<!-- wp:heading {"className":"mb-md","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h2 class="wp-block-heading mb-md has-white-color has-text-color has-link-color">Din kreativa arbetsplats i hjärtat av staden</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"mb-lg max-width-s","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<p class="mb-lg max-width-s has-white-color has-text-color has-link-color">Flexibla kontorslösningar för entreprenörer, frilansare och team. Bli en del av vår dynamiska gemenskap.</p>
<!-- /wp:paragraph -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Boka visning</a></div>
<!-- /wp:button --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->'
    ]
  );

//   register_block_pattern(
//     'gefle-workspace/hero-no-button',
//     [
//       'title'   => __('Hero without button'),
//       'content'     => '

// <!-- wp:group {"tagName":"section","className":"section","backgroundColor":"blue"} -->
// <section class="wp-block-group section has-blue-background-color has-background"><!-- wp:group {"className":"container-m d-flex flex-column h-100 align-items-flex-start"} -->
// <div class="wp-block-group container-m d-flex flex-column h-100 align-items-flex-start"><!-- wp:heading {"className":"mb-md","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
// <h2 class="wp-block-heading mb-md has-white-color has-text-color has-link-color">Din kreativa arbetsplats i hjärtat av staden</h2>
// <!-- /wp:heading -->

// <!-- wp:paragraph {"className":"mb-lg max-width-s","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
// <p class="mb-lg max-width-s has-white-color has-text-color has-link-color">Flexibla kontorslösningar för entreprenörer, frilansare och team. Bli en del av vår dynamiska gemenskap.</p>
// <!-- /wp:paragraph --></div>
// <!-- /wp:group --></section>
// <!-- /wp:group -->'
//     ]
  // );
}
add_action('init', 'gefle_workspace_register_hero_pattern');
