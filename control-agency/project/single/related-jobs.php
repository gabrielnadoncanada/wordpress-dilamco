<div class="container">
    <div class="mt-30 mt-lg-70">
        <h4 class="mb-30 mb-lg-60"><?php echo esc_html_e('Other Jobs', 'architronix'); ?></h4>
        <div class="d-flex flex-column gap-30 position-relative">
            <?php
            $current_job_id = get_the_ID(); // Get the current job ID
            $posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
            $post__in = !empty($post__in) ? $post__in : [];
            $project_args = array(
                'post_type' => 'controljob',
                'posts_per_page' => $posts_per_page,
                'post__in' => $post__in,
                'post__not_in' => array($current_job_id), // Exclude the current job
                'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
            );

            $the_query = new WP_Query($project_args);
            // The Loop.
            if ($the_query->have_posts()) :
                $count = 1; // Initialize the counter
                while ($the_query->have_posts()) : $the_query->the_post();
                    $post_id = get_the_ID();
                    $post = get_post($post_id);
                    
                    $title = $post->post_title;
                    $content = $post->post_content;
                    $job_overview = get_post_meta($post_id, 'job_overview', true);
                    $type = isset($job_overview['job_types']['value']) ? $job_overview['job_types']['value'] : '';
                    $location = isset($job_overview['job_location']['value']) ? $job_overview['job_location']['value'] : '';
                    $expire = isset($job_overview['expire']['value']) ? $job_overview['expire']['value'] : '';
                    $range = isset($job_overview['range']['value']) ? $job_overview['range']['value'] : '';
                    $experience_value = isset($job_overview['experience']['value']) ? $job_overview['experience']['value'] : 0;
                    $years_of_experience = intval($experience_value);
                    if ($years_of_experience >= 5) {
                        $expertise_level = 'Expert';
                    } elseif ($years_of_experience >= 2) {
                        $expertise_level = 'Intermediate';
                    } else {
                        $expertise_level = 'Fresher';
                    }
                    ?>
                    <div class="career-item bg-secondary border border-1 d-flex align-items-lg-center gap-0 gap-lg-30 p-30">
                        <div>
                            <h3 class="stroke-heading stroke-heading-2 mb-0">
                                <svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold text-line-animation"><text x="0%" dominant-baseline="middle" y="70%"><?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?></text></svg>
                            </h3>
                        </div>
                        <div class="row align-items-center justify-content-between w-100 gy-20 gy-lg-0 ms-0 ms-lg-n30 ms-xl-0">
                            <div class="col-lg-3 col-xxl-4">
                                <div class="job-contents">
                                    <p class="custom-font-style fw-bold mb-0"><?php echo esc_html($type); ?></p>
                                    <p class="fs-5 fw-bold mb-0"><?php the_title(); ?></p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="job-contents">
                                    <p class="custom-font-style fw-bold mb-0"><?php echo esc_html($location); ?></p>
                                    <p class="mb-0 d-flex flex-column gap-0 flex-xxl-row"><span><?php echo esc_html__('Apply before:', 'architronix'); ?></span><span class="fw-bold"><?php echo esc_html($expire); ?></span></p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="job-contents">
                                    <?php control_agency_content($expertise_level, '<p class="custom-font-style fw-bold mb-0">', '</p>'); ?>
                                    <?php
                                    $text_args = [
                                        'tag' => 'span',
                                        'tagclass' => 'fw-bold',
                                    ];
                                    $range = control_agency_parse_text($range, $text_args);
                                    if (!empty($range)) {
                                        control_agency_content($range, '<p class="mb-0">', '</p>');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="text-lg-end ms-0 ms-lg-n30 ms-xxl-0 mt-10 mt-lg-0">
                                    <a href="<?php the_permalink()?>" class="btn btn-primary btn-md"><?php echo esc_html_e('Apply', 'architronix'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++; // Increment the counter
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

