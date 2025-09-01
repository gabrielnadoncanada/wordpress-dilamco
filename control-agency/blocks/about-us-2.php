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
                    <div class="about-image overflow-hidden">
                        <img src="<?php echo esc_url($image_url) ?>" class="obeject-fit-cover wow slideInLeft responsive-image" width="584" height="823" alt="<?php bloginfo('name') ?>">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-contents d-flex flex-column">
                        <?php if( !empty( $title )): architronix_content($title,'<h5 class="display-5">','</h5>' ); endif; ?>
                        <?php if( !empty( $short_desc )): architronix_content($short_desc,'<p>','</p>' ); endif; ?>
                    </div>
                </div>
            </div>
        </div>						
    </div>	
</section>