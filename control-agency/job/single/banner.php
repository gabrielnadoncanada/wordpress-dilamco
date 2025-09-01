<section class="section-banner bg-primary bg-opacity-10 section-full-width position-relative pt-60 pt-lg-100">
    <div class="container">
        <div class="career-info pt-60 pt-lg-70 pt-xxl-100 pb-120 pb-lg-100 pb-xxl-130">
            <div class="row align-items-end justify-content-between">
                <div class="col-lg-7 col-xxl-6">
                    <?php 
                    $title = str_replace(['[post_title]', '[job_title]'], get_the_title(), $title);
                    control_agency_content(get_the_title(), '<h1 class="display-3 text-dark mb-20 heading-title separator">', '</h1>'); 
                    ?>
                    <?php 
                    $subtitle = str_replace(['[post_title]', '[job_title]'], get_the_title(), $subtitle);
                    $subtitle = str_replace(['[post_excerpt]', '[job_summary]'], get_the_excerpt(), $subtitle);
                    architronix_content( $subtitle, '<div><p class="fw-normal subtitle mb-40">', '</p></div>');
                     ?>
                    <div class="d-none d-lg-block">
                        <div class="d-flex align-items-center justify-content-between">
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
                    </div>
                </div>
                <?php 
                $button = get_post_meta(get_the_ID(), 'button');
                if (!empty($button)) : 
                ?>
                <div class="col-lg-3 text-lg-end">                    
                    <div class="architronix-button d-inline-flex flex-column gap-10">
                        <?php control_agency_render_block('button', $button, true); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>					
    </div>
</section>