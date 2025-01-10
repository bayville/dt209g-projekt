<?php

/**
 * Title: Single space page-template
 * Slug: gefle-workspace/single-space-template
 * Categories: custom-pages
 * Inserter: no
 */
?>


<?php
// Get meta-data
$meta_data = [
  'price' => get_post_meta(get_the_ID(), 'price', true),
  'period' => get_post_meta(get_the_ID(), 'period', true),
  'facilities' => get_post_meta(get_the_ID(), 'facilities', true),
  'capacity' => get_post_meta(get_the_ID(), 'capacity', true)
];
?>

<main class="container d-grid grid-cols-1 bp-md:grid-cols-2-70-30 gap-y-sm mb-xl">
  <!-- Image-container -->
  <div class="single-space__img--container mb-lg bp-md:col-span-2">
    <!-- wp:post-featured-image /-->
  </div>
  <div class="single-space__content">
    <!-- wp:post-title {"level":1} /-->
    <?php
    if ($meta_data['capacity']) {
      echo ('<p class="text-blue mb-md">Antal platser: ' . esc_html($meta_data['capacity']) . '</p>');
    }
    ?>
    <h2 class="text-xl">Om platsen</h2>
    <!-- wp:post-content /-->

  </div>


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
