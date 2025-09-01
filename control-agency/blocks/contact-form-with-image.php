<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<div class="section-contact-form position-relative<?php echo esc_attr($additional_class); ?>">
    <div class="container">
        <div class="row justify-content-between gx-20 gy-30">
        <?php $image_url = control_agency_get_attachment_url($image, 'full', get_theme_file_uri('assets/images/contact-image.jpg')); ?>
            <div class="col-lg-6">
                <img src="<?php echo esc_url($image_url) ?>" class="w-100" alt="<?php bloginfo('name') ?>">
            </div>
            <div class="col-lg-6">
                <?php 
                if(!empty($form_id)){
                    echo do_shortcode('[contact-form-7 title="'.esc_attr($form_id).'"]');
                }           
                ?>
            </div>
        </div>
    </div>
</div>