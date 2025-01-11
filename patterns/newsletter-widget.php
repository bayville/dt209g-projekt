<?php
/**
 * Title: Newsletter Widget
 * Slug: gefle-workspace/newsletter-widget
 */
?>

<!-- wp:group {"className":"widget__container","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"blue","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group widget__container has-white-color has-blue-background-color has-text-color has-background has-link-color"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Nyhetsbrev</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Få de senaste nyheterna direkt i din inkorg.</p>
<!-- /wp:paragraph -->

<!-- wp:contact-form-7/contact-form-selector {"id":704,"hash":"c6cb663","title":"Nyhetsbrev","className":"newsletter-widget"} -->
<div class="wp-block-contact-form-7-contact-form-selector newsletter-widget">[contact-form-7 id="c6cb663" title="Nyhetsbrev"]</div>
<!-- /wp:contact-form-7/contact-form-selector --></div>
<!-- /wp:group -->