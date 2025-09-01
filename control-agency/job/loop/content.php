<div class="career-item bg-secondary border border-1 d-flex align-items-lg-center gap-0 gap-lg-30 p-30">
    <div>
        <span class="fs-3 stroke-heading stroke-heading-2 mb-0">
            <svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold text-line-animation"><text x="0%" dominant-baseline="middle" y="70%"><?php global $control_agency_counter; printf('%02d', $control_agency_counter+1); ?></text></svg>
        </span>
    </div>
    <div class="row align-items-center justify-content-between w-100 gy-20 gy-lg-0 ms-0 ms-lg-n30 ms-xl-0">
        <div class="col-lg-3 col-xxl-4">
            <div class="job-contents">
                <?php 
                    control_agency_get_terms([
                        'separator' => ', ',
                        'taxonomy' => 'job_type',
                        'wrapper_class' => 'custom-font-style fw-bold mb-0',
                        'wrapper_tag' => 'p',
                        'link_class' => 'text-decoration-none link-hover-animation-1',
                    ]);
                ?>
                <?php the_title('<h3 class="fs-5 fw-bold mb-0"><a class="text-decoration-none link-hover-animation-1" href="'.get_permalink().'">', '</a></h3>'); ?>
            </div>
        </div>
        <!-- col-5 -->
        <div class="col-lg-3">
            <div class="job-contents">
                <?php 
                $location = get_post_meta(get_the_ID(), 'location', true);
                control_agency_content($location, '<p class="custom-font-style fw-bold mb-0">', '</p>');
                $application_deadline = get_post_meta(get_the_ID(), 'application_deadline', true);                
                $application_deadline = date(get_option('date_format'), strtotime($application_deadline));
                if(!empty($application_deadline)){
                    $label = esc_attr__('Apply before:', 'architronix');
                    $application_deadline = sprintf('<span>%s</span><span class="fw-bold"> %s</span>', $label, $application_deadline);
                    control_agency_content($application_deadline, '<p class="mb-0">', '</p>');
                }                
                ?>
            </div>
        </div>
        <!-- col-4 -->
        <div class="col-lg-3">
            <div class="job-contents">
                <?php 
                $experience = get_post_meta(get_the_ID(), 'experience', true);
                control_agency_content($experience, '<p class="custom-font-style fw-bold mb-0">', '</p>');
                $salary = get_post_meta(get_the_ID(), 'salary', true);
                $salary = control_agency_parse_text($salary, ['class' => 'fw-bold']);
                control_agency_content($salary, '<p class="mb-0">', '</p>');
                ?>
            </div>
        </div>
        <!-- col-2 -->
        <div class="col-lg-2">
            <div class="text-lg-end ms-0 ms-lg-n30 ms-xxl-0 mt-10 mt-lg-0">
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-md"><?php echo control_agency_post_type_option('read_more_text'); ?></a>

            </div>
        </div>
        <!-- col-1 -->
    </div>
</div>
<!-- career-item -->
