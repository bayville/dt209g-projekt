<?php

/**
 * Title: News
 * Slug: gefle-workspace/news
 * Categories: posts, gefle-workspace-pattern
 */
?>
<!-- wp:group {"className":"section","layout":{"type":"constrained"}} -->
<div class="wp-block-group section"><!-- wp:heading {"textAlign":"center","className":"mb-3xl"} -->
<h2 class="wp-block-heading has-text-align-center mb-3xl">Senaste nytt</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":9,"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"className":"container "} -->
<div class="wp-block-query container"><!-- wp:post-template {"className":"archive__single "} -->
<!-- wp:post-featured-image /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-title /-->

<!-- wp:post-excerpt {"moreText":"Läs mer","excerptLength":30} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->