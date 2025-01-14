<?php
// Start output buffering
?>
<section class="section bg-smoke">
    <div class="container text-black">
        <h2 class="text-center mb-2xl">Våra medarbetare</h2>
        <div class="d-grid bp-md:grid-cols-3 gap-lg">
            <?php while ($employees_query->have_posts()) : $employees_query->the_post(); ?>
                <article class="radius-md">
                    <div class="">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php echo get_the_post_thumbnail(null, 'large', array('class' => 'radius-xs')); ?>
                        <?php endif; ?>
                    </div>
                    <div class="">
                        <h3 class="text-xl"><?php echo get_the_title(); ?></h3>
                        <?php
                        $meta_data = [
                            'email' => get_post_meta(get_the_ID(), 'email', true),
                            'phone' => get_post_meta(get_the_ID(), 'phone', true),
                            'role' => get_post_meta(get_the_ID(), 'role', true),
                        ];

                        if ($meta_data['role']) : ?>
                        <p><?php echo esc_html($meta_data['role']); ?></p>
                        <?php endif; ?>
                        
                        <?php  if ($meta_data['email']) : ?>
                            <a class="employee__link" href="mailto:<?php echo esc_html($meta_data['email']); ?>"><?php echo esc_html($meta_data['email']); ?></a>
                        <?php endif; ?>
                        
                        <?php  if ($meta_data['phone']) : ?>
                            <a class="employee__link" href="tel:<?php echo esc_html($meta_data['phone']); ?>"><?php echo esc_html($meta_data['phone']); ?></a>
                        <?php endif; ?>
                        
                        <p><?php echo get_the_excerpt(); ?></p>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>