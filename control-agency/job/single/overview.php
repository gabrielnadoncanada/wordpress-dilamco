<?php
if(!empty($job_overviews)):
    ob_start();
    control_agency_render_template('global/simple-group.php', [                        
        'title' => $job_overviews_title,
        'desc' => '',
        'group' => $job_overviews,
        'format_title' => '<h4 class="mb-40 fw-semibold">%s</h4>',
        'format_group_title' => '<span class="fs-5 fw-bold">%s</span>',
        'format_group_desc' => '<span>%s</span>',
        'format_group_item' => '<li class="d-flex flex-column gap-2 gap-xxl-10 mb-2">%s</li>',
        'format_group' => '<ul class="project-details-list list-unstyled mb-0 gap-30 d-flex flex-row flex-lg-column flex-wrap flex-lg-nowrap gap-3">%s</ul>',
        'format_wrapper' => '<div class="project-details-wrapper bg-primary text-secondary">%s</div>',
        'required_desc' => true
    ]);
    $overview_content = ob_get_clean();
    $job_types = control_agency_get_terms([
        'taxonomy' => 'job_type', 
        'wrapper_class' => '',
        'link_class' => 'text-secondary text-decoration-none btn-link-hover-animation-1'
        ], false);    	

    $salary = get_post_meta(get_the_ID(), 'salary', true);    
    $salary = control_agency_parse_text($salary, ['class' => 'fw-bold']);

    $application_deadline = get_post_meta(get_the_ID(), 'application_deadline', true);                
    $application_deadline = date(get_option('date_format'), strtotime($application_deadline));
    
    $dynamic_vars = [
        'job_types' => $job_types,
        'job_experience' => get_post_meta(get_the_ID(), 'experience', true),
        'job_salary' => $salary,
        'job_location' => get_post_meta(get_the_ID(), 'location', true),
        'application_deadline' => $application_deadline,
        'job_qualifications' => get_post_meta(get_the_ID(), 'qualifications', true),
        'job_posted' => get_the_date(get_option('date_format'), get_the_ID()),
    ];
    foreach ($dynamic_vars as $key => $value) {
        $overview_content = str_replace("[{$key}]", $value, $overview_content);
    }
    
    
    echo do_shortcode($overview_content);
endif;		
?> 

