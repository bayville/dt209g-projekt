<?php
get_header();
?>

<main>
  <section class="section bg-yellow">
    <div class="container">
    <?php 
    // Check if there are any posts
    if (have_posts()) :
    ?>
      <h1 class="text-green hover:text-blue bg-blue hover:bg-yellow">
        <?php
        if (is_category()) {
          single_cat_title(); // Category
        } elseif (is_tag()) {
          single_tag_title(); // Tag name
        } elseif (is_archive()) {
          the_archive_title(); // Archive title
        } elseif (is_singular()) {
          the_title(); // Title for single post or page
        } else {
          bloginfo('name'); // Standard: site name
        }
        ?>
      </h1>
      
      <?php 
      // Loop through posts
      while (have_posts()) : the_post();
        echo "<h2>";
        the_title();
        echo "</h2>";
        the_content();
      endwhile;
      
    else : 
      ?>
      <h1><?php _e('Inga inlägg hittades', 'gefle-workspace'); ?></h1>
      <p><?php _e('Inga inlägg hittades.', 'gefle-workspace'); ?></p>
      
    <?php endif; ?>
    </div>
  </section>
<div class="d-grid bp-md:grid-cols-3 bp-md:justify-items-center">
  <p>1</p>
  <p>2</p>
  <p>3</p>
  <p>4</p>
  <p>5</p>
</div>


<?php
get_footer();
?>