<?php
$post_id = get_the_ID();
$post = get_post($post_id);
$title = $post->post_title;
$content = $post->post_content;
$count_posts = wp_count_posts('controlservice');
$total_posts = $count_posts->publish;
?>
<div class="col-sm-6 col-lg-4 col-xl-3">
    <div class="service-details position-relative">
        <h2 class="stroke-heading lh-1 mb-2">
            <svg stroke-width="1" class="text-line-2 fw-extra-bold text-line-animation"><text x="0%" dominant-baseline="middle" y="70%">
                <?php echo sprintf("%02d", $wp_query->current_post + 1); ?>
            </text></svg>
        </h2>
        <a href="<?php the_permalink() ?>" title="<?php echo control_agency_post_type_option('read_more_text') ?>" class="text-decoration-none link-hover-animation-1 stretched-link">
            <?php 
             $title = str_replace(['[post_title]', '[service_title]'], get_the_title(), $title);
            control_agency_content($title, '<h4 class="service-title d-inline-block">', '</h4>'); ?>          
        </a>
        <?php the_excerpt(); ?>
    </div>
</div>