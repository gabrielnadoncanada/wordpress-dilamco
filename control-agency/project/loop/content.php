<?php
global $control_agency_counter;
$designation = get_post_meta(get_the_ID(), 'designation', true);
$read_more_text = control_agency_post_type_option('read_more_text');

$wraper_class = $control_agency_counter % 2 == 0? ' project-overview-1' : ' project-overview-1';
$row_class = $control_agency_counter % 2 == 1? ' flex-lg-row-reverse' : '';
$image_class = $control_agency_counter % 2 == 0? ' direction-rtl me-n100' : ' ms-n100';
$animation = $control_agency_counter % 2 == 1? 'slideRighttoLeft' : 'slideLefttoRight';
$animation_content = $control_agency_counter % 2 == 0? 'slideInLeft' : 'slideInRight';
?>
<div class="mb-lg-100 mb-40<?php echo esc_attr($wraper_class) ?>">
    <div class="row align-items-center position-relative gx-0<?php echo esc_attr($row_class) ?>">
        <div class="col-lg-6 <?php if (wp_is_mobile()) echo 'overflow-hidden'; ?>">
            <div class="<?php echo esc_attr($image_class) ?>">
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'architronix-1050x700-cropped')); ?>"  width="1000" height="750" class="object-fit-cover responsive-image" alt="<?php the_title() ?>">
            </div>
        </div>
        <!-- col-9 -->
        <div class="col-lg-6 z-1 overflow-hidden">
            <div class="project-overview-details bg-primary text-secondary" data-ca-animation="<?php echo esc_attr($animation_content) ?>" data-ca-duration="1000ms">
                <div>
                    <?php
                    $overviews = get_post_meta(get_the_ID(), 'overviews', true); 
                    if(!empty($overviews))
                    ob_start();
                    control_agency_render_template('global/simple-group.php', [                        
                        'title' => get_the_title(),
                        'desc' => get_the_excerpt(),
                        'group' => $overviews,
                        'format_title' => '<h5 class="display-5 fw-extra-bold mb-0">%s</h5>',
                        'format_desc' => '<p class="project-overview-description mb-0">%s</p>',
                        'format_group_title' => '<span class="col-4 fw-extra-bold">%s</span>',
                        'format_group_desc' => '<p class="mb-0">%s</p>',
                        'format_group_item' => '<li><div class="row row-cols-2">%s</div></li>',
                        'format_group' => '<ul class="project-overview-list list-unstyled mb-0 d-flex flex-column gap-10">%s</ul>',
                        'format_wrapper' => '%s'
                    ]);
                    $overview_content = ob_get_clean();
                    $poject_types = control_agency_get_terms([
                        'taxonomy' => 'project_cat', 
                        'wrapper_class' => '',
                        'link_class' => 'text-secondary text-decoration-none link-hover-animation-1'
                        ], false);

                    $overview_content = str_replace('[project_types]', $poject_types, $overview_content);
                    echo do_shortcode($overview_content);	
                    ?>                   
                    
                    <div class="mt-4 mt-lg-30 mt-xxl-40">
                        <a href="<?php the_permalink() ?>" class="btn btn-link link-hover-animation-1 d-inline-flex gap-10 align-items-center"><?php echo esc_html($read_more_text); ?><span>
                                <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                                </svg></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- col-3 -->
    </div>
    <!-- row -->
</div>
<!-- project-overview-1 -->
