<?php

/**
 * Title: Single post template
 * Slug: gefle-workspace/single-post-template
 * Categories: custom-pages, gefle-workspace-pattern
 * Inserter: no
 */
?>
<!-- wp:group {"className":"single-space__img--container mb-lg"} -->
<div class="wp-block-group single-space__img--container mb-lg"><!-- wp:post-featured-image /--></div>
<!-- /wp:group -->
 
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
  <div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:post-title {"level":1} /-->

    <!-- wp:post-content {"className":"paragraph-width"} /-->
  </div>
  <!-- /wp:column -->

  <!-- wp:column {"width":"33.33%","className":"widget__sidebar"} -->
  <div class="wp-block-column widget__sidebar" style="flex-basis:33.33%">
    <!-- wp:pattern {"slug":"gefle-workspace/search-widget"} -->
    <!-- wp:pattern {"slug":"gefle-workspace/category-widget"} -->
    <!-- wp:pattern {"slug":"gefle-workspace/newsletter-widget"} -->
  </div>
  <!-- /wp:column -->
</div>
<!-- /wp:columns -->