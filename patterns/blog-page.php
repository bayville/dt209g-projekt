<?php

/**
 * Title: Blog page
 * Slug: gefle-workspace/blog-page
 * Categories: custom-pages, gefle-workspace-pattern
 */
?>

<!-- wp:group {"tagName":"main"} -->
<main class="wp-block-group"><!-- wp:group {"tagName":"section","metadata":{"categories":["gefle-workspace-pattern"],"patternName":"gefle-workspace/archive-hero","name":"Archive hero"},"className":"section","backgroundColor":"blue"} -->
<section class="wp-block-group section has-blue-background-color has-background"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:query-title {"type":"archive","showPrefix":false,"className":"archive__title"} /--></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:columns {"className":"container mt-md"} -->
<div class="wp-block-columns container mt-md"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:query {"queryId":9,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"archive__single"} -->
<!-- wp:post-featured-image /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-title /-->

<!-- wp:post-excerpt {"moreText":"Läs mer","excerptLength":30} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Lägg till text eller block som visas när en fråga inte returnerar några resultat."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%","className":"widget__sidebar"} -->
<div class="wp-block-column widget__sidebar" style="flex-basis:33.33%"><!-- wp:search {"label":"Sök","widthUnit":"%","buttonText":"Sök","metadata":{"patternName":"gefle-workspace/search-widget","name":"Search Widget"},"className":"search-widget widget__container "} /-->

<!-- wp:group {"metadata":{"patternName":"gefle-workspace/category-widget","name":"Category Widget"},"className":"widget__container p-md","layout":{"type":"constrained"}} -->
<div class="wp-block-group widget__container p-md"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Kategorier</h3>
<!-- /wp:heading -->

<!-- wp:categories {"showPostCounts":true,"className":" category-widget"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"patternName":"gefle-workspace/newsletter-widget","name":"Newsletter Widget"},"className":"widget__container","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"blue","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group widget__container has-white-color has-blue-background-color has-text-color has-background has-link-color"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Nyhetsbrev</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Få de senaste nyheterna direkt i din inkorg.</p>
<!-- /wp:paragraph -->

<!-- wp:contact-form-7/contact-form-selector {"id":704,"hash":"c6cb663","title":"Nyhetsbrev","className":"newsletter-widget"} -->
<div class="wp-block-contact-form-7-contact-form-selector newsletter-widget">[contact-form-7 id="c6cb663" title="Nyhetsbrev"]</div>
<!-- /wp:contact-form-7/contact-form-selector --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:group -->