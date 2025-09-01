<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-about about-2 section-full-width position-relative pt-4 pt-lg-0<?php echo esc_attr($additional_class); ?>">
    <div class="about-bg bg-primary text-secondary position-relative">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <?php $image_url = control_agency_get_attachment_url($image, 'full', get_theme_file_uri('assets/images/about-image-2.jpg')); ?>
                    <div class="about-image about-image-2 overflow-hidden">
                        <img src="<?php echo esc_url($image_url) ?>" class="obeject-fit-cover wow slideInLeft responsive-image" width="584" height="823" alt="<?php bloginfo('name') ?>" style="visibility: visible; animation-name: slideInLeft;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-contents d-flex flex-column">
                        <?php if( !empty( $title )): architronix_content($title,'<h5 class="display-5">','</h5>' ); endif; ?>
                        <div class="d-flex flex-column gap-4">
                            <?php
                            if (!empty($services)):
                            foreach ($services as $service) :
                            ?>
                            <div class="about-content-inner d-flex flex-column flex-lg-row">
                                <div class="list-item-number">                                    
                                    <?php echo !empty($service['service_count']) ? '<h3 class="stroke-heading stroke-heading-2 mb-0"><svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">' . $service['service_count'] . '</text></svg></h3>' : ''; ?>
                                </div>
                                <div>
                                    <?php echo !empty($service['service_title']) ? '<h4>' . $service['service_title'] . '</h4>' : ''; ?>
                                    <?php echo !empty($service['service_desc']) ? '<p class="mb-0">' . $service['service_desc'] . '</p>' : ''; ?>
                                </div>
                            </div>
                            <?php 
                            endforeach;
                            endif; 
                            ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>						
    </div>
</section>