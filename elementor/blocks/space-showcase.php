<?php
$additional_class = !empty($additional_class) ? ' '.$additional_class : '';

$number = !empty($number) ? $number : 5; // Maximum number of terms to retrieve
$include = !empty($include) ? $include : [];
$order = !empty($order) ? $order : 'DESC';
$orderby = !empty($orderby) ? $orderby : 'count';

// Define taxonomy query arguments.
$space_args = array(
    'post_type' => 'controlspace',
    'number' => $number,
    'include' => array_filter($include),
    'order' => $order,
    'orderby' => $orderby,
);

// Execute the taxonomy query.
$spaces = get_posts($space_args);
// Initialize the counter.
$counter = 1;
?>

<div class="section-full-width swiper-custom-progress position-relative<?php echo esc_attr($additional_class); ?>">
    <div class="swiper project-category-swiper">
        <div class="swiper-wrapper">
            <?php if (!empty($spaces) && !is_wp_error($spaces)) : ?>
                <?php foreach ($spaces as $space) : 
                $featured_image = get_the_post_thumbnail_url($space->ID, 'full');
               
                if(empty($featured_image)) continue;
                ?>
                    <div class="swiper-slide">
                        <div class="gallery-contents  gallery-post-item-<?php echo esc_attr($counter); ?>" style="--bs-gallery-sm-width: 100% !important; width: 100% !important;">
                            <div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
                                <div class="gallery-image-wrapper overlay">
                                    <?php if ($featured_image) : ?>
                                        <img class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover" src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($term->name); ?>">
                                    <?php endif; ?>
                                    <div class="gallery-info-wrapper">
                                        <div class="gallery-info">
                                            <a href="<?php echo get_permalink($space->ID); ?>" class="text-decoration-none link-hover-animation-1 gallery-title separator">
                                                <h4 class="mb-0"><?php echo esc_html($space->post_title); ?></h4>
                                            </a>
                                            <p class="gallery-description"><?php echo esc_html($space->post_excerpt); ?></p>
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
                    </div>
                    <?php $counter++; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="swiper-slide">
                    <p><?php esc_html_e('No Space  found.', 'architronix'); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- swiper-wrapper -->
    </div>
    <!-- swiper -->
    <div class="container">
        <div class="project-category-swiper-pagination-wrapper">
            <div class="project-category-swiper-pagination"></div>
            <div class="swiper-button-progress">
                <div class="project-category-progress-button-prev">
                    <svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
                    </svg>
                </div>
                <div class="project-category-progress-button-next">
                    <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>


