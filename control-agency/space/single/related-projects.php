<?php
// Build query arguments
$query_args = [
    'post_type'      => 'controlproject',
    'posts_per_page' => isset($posts_per_page) ? $posts_per_page : 6,
    'post__not_in'   => [get_the_ID()],
];

// If specific projects are selected
if (!empty($post__in)) {
    $query_args['post__in'] = $post__in;
} else {
    // Get related projects based on taxonomy (if applicable)
    $terms = wp_get_post_terms(get_the_ID(), 'space_category', ['fields' => 'ids']);
    if (!empty($terms) && !is_wp_error($terms)) {
        $query_args['tax_query'] = [
            [
                'taxonomy' => 'project_category',
                'field'    => 'term_id',
                'terms'    => $terms,
            ],
        ];
    }
}

// Order settings
if (!empty($orderby)) {
    $query_args['orderby'] = $orderby;
}
if (!empty($order)) {
    $query_args['order'] = $order;
}

// The Query
$the_query = new WP_Query($query_args);

if ($the_query->have_posts()):
    $related_title = get_theme_mod('related_post_title', esc_attr__('Related Project', 'architronix'));

?>
<div class="container overflow-hidden pb-lg-120 pb-30">
    <?php architronix_content($related_title, '<h4 class="mb-4 mb-lg-30">', '</h4>'); ?>
    <div class="swiper blog-swiper">
        <div class="swiper-wrapper">
            <?php
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <div class="swiper-slide">
                    <?php control_agency_template_part('project/single/content-related') ?>
                </div>
            <?php
            endwhile;
            ?>
        </div> <!-- swiper-wrapper -->
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div> <!-- swiper -->
</div> <!-- container -->

             

<?php
endif;
wp_reset_postdata();

