<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
?>
<section class="section-blog blog-1<?php echo esc_attr($additional_class); ?>">		
    <div class="container">
        <div class="swiper-custom-progress position-relative">
            <div class="swiper blog-swiper">
                <div class="swiper-wrapper"> 
                    <?php
                        // Set the number of posts per page and posts to include.
                        $posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
                        $post__in = !empty($post__in) ? explode(',', $post__in) : [];
                        $order = !empty($order) ? $order : 'DESC';
                        $orderby = !empty($orderby) ? $orderby : 'date';

                        // The Query.
                        $the_query = new WP_Query([
                            'post_type' => 'post',
                            'posts_per_page' => $posts_per_page,
                            'post__in' => array_filter($post__in),
                            'order' => $order,
                            'orderby' => $orderby,
                        ]);

                        // The Loop.
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) :
                                $the_query->the_post();
                                get_template_part('template-parts/post/content');
                            endwhile;
                        endif;
                        wp_reset_postdata(); // Reset the query data.
                    ?>			
                </div>
                <!-- swiper-wrapper -->
            </div>
            <!-- swiper -->							
            <div class="blog-swiper-pagination-wrapper">
                <div class="blog-swiper-pagination"></div>						
                <div class="swiper-button-progress">	
                    <div class="blog-progress-button-prev">
                        <svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
                        </svg>
                    </div>							
                    <div class="blog-progress-button-next">
                        <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
                        </svg> 
                    </div>																
                </div>
            </div>									
        </div>	
    </div>	
</section>
