<?php
// Start output buffering
?>
<section class="section spaces">
    <div class="container text-black">
        <div class="space__container d-grid gap-lg">
            <?php while ($spaces_query->have_posts()) : $spaces_query->the_post(); ?>
                <article class="spaces__card radius-sm d-grid">
                    <div class="spaces__card__img--container">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php echo get_the_post_thumbnail(null, 'large', array('class' => 'spaces__card__img')); ?>
                        <?php endif; ?>
                    </div>
                    <div class="p-md">
                        <h3 class="text-xl"><?php echo get_the_title(); ?></h3>
                        <?php
                        $meta_data = [
                            'price' => get_post_meta(get_the_ID(), 'price', true),
                            'period' => get_post_meta(get_the_ID(), 'period', true),
                            'facilities' => get_post_meta(get_the_ID(), 'facilities', true),
                        ];

                        if ($meta_data['price'] && $meta_data['period']) : ?>
                            <p class="text-sm">
                                <?php echo esc_html($meta_data['price']); ?> SEK
                                <span>/<?php echo esc_html($meta_data['period']); ?></span>
                            </p>
                        <?php endif; ?>

                        <p>
                            <?php if ($meta_data['facilities']) {
                                echo '<p class="mb-xs">Det här ingår:</p><ul class="mt-0">';

                                // Explode each row
                                $items = explode("\n", $meta_data['facilities']);
                                foreach ($items as $item) {
                                    echo '<li>' . esc_html(trim($item)) . '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo get_the_excerpt();
                            } ?>
                        </p>

                        <div class="py-md">
                            <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn bg-yellow text-blue">Se mer info</a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>