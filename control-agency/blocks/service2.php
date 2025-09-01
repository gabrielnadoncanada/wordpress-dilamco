<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<div class="section-full-width row gx-60 gy-3 mt-n30 position-relative<?php echo esc_attr($additional_class); ?>">
    <?php
        // Set the number of posts per page and posts to include.
        $posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
        $post__in = !empty($post__in) ? $post__in : [];
        $order = !empty($order) ? $order : 'DESC';
        $orderby = !empty($orderby) ? $orderby : 'date';

        // Define query arguments.
        $project_args = array(
            'post_type' => 'controlservice',
            'posts_per_page' => $posts_per_page,
            'post__in' => array_filter($post__in),
            'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
            'order' => $order,
            'orderby' => $orderby,
        );

        // Execute the query.
        $the_query = new WP_Query($project_args);

        // Initialize the counter.
        $counter = 1;

        // Loop through the posts.
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
    ?>
    <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="service-details">
            <h2 class="stroke-heading">
                <svg stroke-width="1" class="text-line-2 fw-extra-bold">
                    <text x="0%" dominant-baseline="middle" y="70%">
                        <?php echo sprintf('%02d', $counter); ?>
                    </text>       
                </svg>
            </h2>
            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                <h4 class="service-title link-hover-animation-1 d-inline-block"><?php the_title(); ?></h4>
            </a>
            <p class="mb-0"><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>
    <?php
                $counter++; // Increment the counter.
            endwhile;
            wp_reset_postdata(); // Reset the query data.
        else :
            echo '<p>' . esc_html__('No services found.', 'architronix') . '</p>';
        endif;
    ?>
</div>
