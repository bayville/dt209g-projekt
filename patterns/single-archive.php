<?php

/**
 * Title: Single archive template
 * Slug: gefle-workspace/single-archive-template
 * Categories: custom-pages, gefle-workspace-pattern
 * Inserter: no
 */
?>


<main class="container d-grid grid-cols-1 bp-md:grid-cols-2-70-30 gap-y-sm mb-xl">


  <aside class="bg-smoke p-md radius-xs d-flex flex-column justify-content-space-between">

    <?php
    if ($meta_data['price'] && $meta_data['period']) {
      echo ('<h3 class="text-xl text-center mb-md">' . esc_html($meta_data['price']) . ' SEK <span class="text-xs">/' . esc_html($meta_data['period']) . '</span></h3>');
    }

    if ($meta_data['facilities']) {
      echo '<p >Det här ingår:</p><ul class="mt-0">';

      // Explode each row
      $items = explode("\n", $meta_data['facilities']);
      foreach ($items as $item) {
        echo '<li>' . esc_html(trim($item)) . '</li>';
      }
      echo '</ul>';
    }
    ?>
    <!-- Button -->
    <a href="#" class="btn bg-yellow text-blue text-center d-block">Boka plats</a>
  </aside>
</main>
<aside>

<div class="section bg-green">
<div class="container text-center">
<h2 class="wp-block-heading mb-md has-blue-color has-text-color has-link-color">Redo att bli en del av vår gemenskap?</h2>

<p class="mb-lg">Boka en plats idag och upptäck ditt nya kreativa hem.</p>

<div><a href="#" class="btn bg-blue text-white">Kontakta oss</a></div>

</aside>
