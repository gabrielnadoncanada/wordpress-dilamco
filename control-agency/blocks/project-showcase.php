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

<style>
   
</style>

<div class="section-full-width">
    <div class="row gx-15 gy-30 section-padding-lg <?php echo esc_attr($additional_class); ?>">
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); 
            if(!file_exists( get_attached_file ( get_post_thumbnail_id( get_the_ID()) ))) continue;
            ?>
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-contents has-fancybox gallery-post-item-<?php echo esc_attr($counter); ?> gallery-sm" 
                        style="--bs-gallery-sm-width: 100% !important; width: 100% !important; --bs-gallery-contents-hight: 450px !important;">
                        <div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
                          
                                <div class="gallery-image-wrapper overlay h-100">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" data-fancybox="project-gallery" data-caption="<?php the_title_attribute(); ?>"
                                        
                                        class="d-block w-100 h-100"
                                        >
                                            <img decoding="async" 
                                            class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover lazy entered loaded ca-lazy-loaded" 
                                            src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>" data-ll-status="loaded">
                                        </a>
                                    <?php endif; ?>
                                    <div class="gallery-info-wrapper">
                                        <div class="gallery-info d-flex flex-column justify-content-between align-items-start">
                                            <div class="text-decoration-none link-hover-animation-1 gallery-title separator">
                                                <h4 class="mb-0"><?php the_title(); ?></h4>
                                            </div>
                                            <?php
                                            if(get_field('is_case_study', get_the_ID())):
                                                ?>
                                                <a href="<?php echo esc_url(get_the_permalink()); ?>" class=" d-inline-flex gap-10 align-items-center">
                                                    <?php esc_html_e('Voir le projet', 'architronix'); ?>
                                                    <span>
                                                        <svg width="20" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <?php
                                                
                                            elseif (!empty(get_the_excerpt())):
                                                ?>
                                                <p class="gallery-description"><?php echo get_the_excerpt(); ?></p>
                                                <?php
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php esc_html_e('No Projects found.', 'architronix'); ?></p>
        <?php endif; ?>
    </div>
</div>

