<?php
// Set the number of posts per page and posts to include.
$posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
$post__in = !empty($post__in) ? $post__in : [];
$order = !empty($order) ? $order : 'DESC';
$orderby = !empty($orderby) ? $orderby : 'date';


// Define query arguments.
$member_args = array(
    'post_type' => 'controlmember',
    'posts_per_page' => $posts_per_page,
    'post__in' => array_filter($post__in),
    'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
    'order' => $order,
    'orderby' => $orderby,
);

// Execute the query.
$the_query = new WP_Query($member_args);
$counter = 1; // Initialize the counter.

if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>

<section class="section-team team-1<?php echo esc_attr($additional_class); ?>">
    <div class="team-inner">
        <div class="container">
            <div class="row gx-30 gy-100 gy-lg-130 section-padding-lg our-teams">
                <?php
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();

                        $designation = get_post_meta(get_the_ID(), 'designation', true);
                        $social_links = get_post_meta(get_the_ID(), 'social_links', true);

                        if ($counter % 3 == 1) :
                ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="team-wrapper team-style-1 position-relative">
                                    <?php if (!empty($social_links)) :
                                        control_agency_render_template('global/social-links.php', [
                                            'title' => '',
                                            'social_links' => $social_links,
                                        ]);
                                    endif; ?>

                                    <div class="team-author-image overflow-hidden">
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')); ?>" width="412" height="505" class="object-fit-cover wow slideInLeft" alt="image" style="visibility: visible; animation-name: slideInLeft;">
                                    </div>
                                    <a href="<?php the_permalink() ?>" class="text-decoration-none stretched-link">
                                        <div class="team-details">
                                            <div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
                                                <div>
                                                    <span class="team-line-horizontal"></span>
                                                    <span class="team-line-vertical"></span>
                                                    <h5 class="author-name"><?php the_title(); ?></h5>
                                                    <?php architronix_content($designation, '<p class="mb-0">', '</p>'); ?>
                                                </div>
                                                <div class="team-arrow-icon">
                                                    <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                <?php
                        elseif ($counter % 3 == 2) :
                ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="team-wrapper team-style-2 position-relative">
                                    <?php if (!empty($social_links)) :
                                        control_agency_render_template('global/social-links.php', [
                                            'title' => '',
                                            'social_links' => $social_links,
                                        ]);
                                    endif; ?>
                                    <div class="team-author-image overflow-hidden">
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')); ?>" width="412" height="505" class="object-fit-cover wow slideInLeft" alt="image" style="visibility: visible; animation-name: slideInLeft;">
                                    </div>
                                    <a href="<?php the_permalink() ?>" class="text-decoration-none stretched-link">
                                        <div class="team-details">
                                            <div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
                                                <div>
                                                    <span class="team-line-horizontal"></span>
                                                    <span class="team-line-vertical"></span>
                                                    <h5 class="author-name author-border-bottom"><?php the_title(); ?></h5>
                                                    <?php architronix_content($designation, '<p class="mb-0">', '</p>'); ?>
                                                </div>
                                                <div class="team-arrow-icon">
                                                    <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                <?php
                        else :
                ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="team-wrapper position-relative">
                                    <?php if (!empty($social_links)) :
                                        control_agency_render_template('global/social-links.php', [
                                            'title' => '',
                                            'social_links' => $social_links,
                                        ]);
                                    endif; ?>
                                    <div class="team-author-image overflow-hidden">
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')); ?>" width="412" height="505" class="object-fit-cover wow slideInLeft" alt="image" style="visibility: visible; animation-name: slideInLeft;">
                                    </div>
                                    <a href="<?php the_permalink() ?>" class="text-decoration-none stretched-link">
                                        <div class="team-details">
                                            <div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
                                                <div>
                                                    <span class="team-line-horizontal"></span>
                                                    <span class="team-line-vertical"></span>
                                                    <h5 class="author-name"><?php the_title(); ?></h5>
                                                    <?php architronix_content($designation, '<p class="mb-0">', '</p>'); ?>
                                                </div>
                                                <div class="team-arrow-icon">
                                                    <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                <?php
                        endif;
                        $counter++; // Increment the counter.
                    endwhile;
                    wp_reset_postdata(); // Reset the query data.
                else :
                    echo '<p>' . esc_html__('No team members found.', 'architronix') . '</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
