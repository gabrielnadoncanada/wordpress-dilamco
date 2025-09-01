<?php
// Set the number of posts per page and posts to include.
$posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
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
$first = true;

if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>

<div id="projectSlider" class="section-project project-1 section-full-width carousel slide carousel-fade<?php echo esc_attr($additional_class); ?>" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner text-secondary">
        <?php
        // Loop through the posts.
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
            if(!file_exists( get_attached_file ( get_post_thumbnail_id( get_the_ID()) ))) continue;
                
        ?>
        <div class="carousel-item <?php if ($first) { echo 'active'; $first = false; } ?>">
            <div class="project-contents position-relative">
                <?php if (has_post_thumbnail()) : ?>
                <div class="project-image overlay">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'mobile-project-showcase-2-thumbnail')); ?>">
                        <img class="object-fit-cover responsive-image" width="1549" height="887" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>">
                    </picture>
                </div>
                <?php endif; ?>
                
                <ul class="project-details list-unstyled mb-0 d-flex align-items-center">
                <?php
                $overviews = get_post_meta(get_the_ID(), 'overviews', true);
                if(!empty($overviews)):
                    ob_start();
                    control_agency_render_template('global/simple-group.php', [                        
                        
                        'group' => $overviews,
                        
                        'format_group_title' => '<span class="fs-5 fw-bold">%s</span>',
                        'format_group_desc' => '<span>%s</span>',
                        'format_group_item' => '<li class="d-flex flex-column gap-2 gap-xxl-10">%s</li>',
                        'format_group' => '%s',
                        'format_wrapper' => '%s',
                        'group_item_from' => -1,
                        'group_item_to' => 3,
                    ]);
                    $overview_content = ob_get_clean();
                    $poject_types = control_agency_get_terms([
                        'taxonomy' => 'project_cat', 
                        'wrapper_class' => '',
                        'link_class' => 'text-secondary text-decoration-none link-hover-animation-1'
                        ], false);

                    $overview_content = str_replace('[project_types]', $poject_types, $overview_content);	
                    
                    
                    echo do_shortcode($overview_content);	
                endif;	
                ?> 
                    <li class="architronix-button d-none d-xl-block">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-secondary gap-10"><?php echo esc_html_e('View Project', 'architronix')  ?></a>
                    </li>
                </ul>
                <div class="project-info bg-primary">
                    <h5 class="project-title fw-extra-bold"><?php the_title(); ?></h5>
                    <p class="mb-0"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?> <a class="text-decoration-none fw-extra-bold" href="<?php the_permalink(); ?>"><?php echo esc_html('see more', 'architronix'); ?> </a></p>
                    <div class="architronix-button d-block d-xl-none mt-4">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-secondary gap-10"><?php echo esc_html__('View Project', 'architronix') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            endwhile;
            wp_reset_postdata(); // Reset the query data.
        else :
            echo '<p>' . esc_html__('No projects found.', 'architronix') . '</p>';
        endif;
        ?>
    </div>
    <div class="project-carousel-buttons d-flex gap-4">
        <a href="#" class="project-prev-btn btn prev-btn prev-btn-sm" data-bs-target="#projectSlider" data-bs-slide="prev">
            <svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
            </svg>    
        </a>
        <a href="#" class="project-next-btn btn btn-primary gap-10" data-bs-target="#projectSlider" data-bs-slide="next">
           <?php echo esc_attr__('New Projects', 'architronix'); ?>                         
            <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
            </svg>    
        </a>
    </div>
</div>
