<?php
if(!get_theme_mod('enable_related_post', true)) return;
$related_posts = new WP_Query(architronix_related_query_args('post'));
if ($related_posts->have_posts()) :
    $related_title = get_theme_mod('related_post_title', esc_attr__('Related Post', 'architronix'));
    ?>
    <div class="container overflow-hidden pb-lg-120 pb-30">
        <?php architronix_content($related_title, '<h4 class="mb-4 mb-lg-30">', '</h4>'); ?>
        <div class="swiper blog-swiper">
            <div class="swiper-wrapper">
                <?php
                while ($related_posts->have_posts()) : $related_posts->the_post();
                ?>
                    <div class="swiper-slide">
                        <?php get_template_part('template-parts/post/content') ?>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata(); // Reset post data query
                ?>
            </div> <!-- swiper-wrapper -->
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div> <!-- swiper -->
    </div> <!-- container -->
<?php
endif;