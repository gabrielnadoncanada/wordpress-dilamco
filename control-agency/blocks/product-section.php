<?php
if ( class_exists( 'WooCommerce' ) ) : // Check if WooCommerce is active
    if(!empty($additional_class)) $additional_class = ' '.$additional_class;
    else $additional_class = '';
?>
<section class="section-shop products shop-1 section-full-width<?php echo esc_attr($additional_class); ?>">
    <div class="swiper-custom-progress position-relative">
        <div class="swiper shop-swiper">
            <div class="swiper-wrapper">
                <?php
                // Set the number of posts per page and posts to include.
                $posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
                $post__in = !empty($post__in) ? $post__in : [];
                
                // Define query arguments.
                $product_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => $posts_per_page,
                    'post__in' => $post__in,
                    'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
                );
                
                // Execute the query.
                $the_query = new WP_Query($product_args);
                
                // The Loop.
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        get_template_part('template-parts/product/content');
                    endwhile;
                endif;
                ?>
            </div>
            <!-- swiper-wrapper -->
        </div>
        <!-- swiper -->
        <div class="container">
            <div class="shop-swiper-pagination-wrapper">
                <div class="shop-swiper-pagination"></div>
                <div class="swiper-button-progress">
                    <div class="shop-progress-button-prev">
                        <svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
                        </svg>
                    </div>
                    <div class="shop-progress-button-next">
                        <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
endif; // End check for WooCommerce
?>