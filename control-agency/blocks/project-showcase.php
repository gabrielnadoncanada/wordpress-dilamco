<?php
$additional_class = !empty($additional_class) ? ' '.$additional_class : '';

$posts_per_page = 5; // Maximum number of posts to retrieve
$post__in = !empty($post__in) ? $post__in : [];
$order = !empty($order) ? $order : 'DESC';
$orderby = !empty($orderby) ? $orderby : 'date';

// Define query arguments.
$project_args = array(
    'post_type' => 'controlproject',
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
?>

<div class="horizontal-accordion d-flex<?php echo esc_attr($additional_class); ?>">
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); 
        if(!file_exists( get_attached_file ( get_post_thumbnail_id( get_the_ID()) ))) continue;
        ?>
            <div class="gallery-contents gallery-sm gallery-post-item-<?php echo esc_attr($counter); ?>">
                <div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
                    <div class="gallery-image-wrapper overlay">
                        <?php if (has_post_thumbnail()) : ?>
                            <img class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="gallery-info-wrapper">
                            <div class="gallery-info">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none link-hover-animation-1 gallery-title separator">
                                    <h4 class="mb-0"><?php the_title(); ?></h4>
                                </a>
                                <p class="gallery-description"><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                    <h3 class="gallery-item stroke-heading stroke-heading-2 mb-0">
                        <svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold">
                            <text x="0%" dominant-baseline="middle" y="70%"><?php echo sprintf('%02d', $counter); ?></text>
                        </svg>
                    </h3>
                </div>
            </div>
            <?php $counter++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p><?php esc_html_e('No Projects found.', 'architronix'); ?></p>
    <?php endif; ?>
</div>


