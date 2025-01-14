<?php
// Start output buffering
?>
<section class="section bg-smoke spaces">
    <div class="container text-black">
        <h2 class="text-center mb-2xl">Våra kontor</h2>
        <div class="space__container d-grid bp-md:grid-cols-3 gap-lg">
            <?php while ($spaces_query->have_posts()) : $spaces_query->the_post(); ?>
                <article class="spaces__card radius-md">
                    <div class="spaces__card__img--container">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php echo get_the_post_thumbnail(null, 'large', array('class' => '')); ?>
                        <?php endif; ?>
                    </div>
                    <div class="p-md">
                        <h3 class="text-xl"><?php echo get_the_title(); ?></h3>
                        <?php
                        $meta_data = [
                            'price' => get_post_meta(get_the_ID(), 'price', true),
                            'period' => get_post_meta(get_the_ID(), 'period', true),
                        ];
                        
                        if ($meta_data['price'] && $meta_data['period']) : ?>
                            <p class="text-sm">
                                <?php echo esc_html($meta_data['price']); ?> SEK
                                <span>/<?php echo esc_html($meta_data['period']); ?></span>
                            </p>
                        <?php endif; ?>
                        
                        <p><?php echo get_the_excerpt(); ?></p>
                        
                        <div class="py-md">
                            <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn bg-yellow text-blue">Se mer info</a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>