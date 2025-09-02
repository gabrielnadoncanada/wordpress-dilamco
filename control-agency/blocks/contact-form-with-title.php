<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-contact-form position-relative pt-60 pt-lg-100 pt-xxl-120<?php echo esc_attr($additional_class); ?>">
    <div class="container">
        <div class="row justify-content-between gy-5">
            <div class="col-xxl-6">
                <div class="section-title">	
                    <?php if( !empty( $title )): architronix_content($title,'<h2 class="fw-extra-bold display-3 lh-1">','</h2>' ); endif; ?>							
                </div>							
            </div>
            <div class="col-xxl-6">
                <?php 
                if(!empty($form_id)){
                    echo do_shortcode('[contact-form-7 title="'.esc_attr($form_id).'"]');
                }           
                ?>
            </div>
        </div>
    </div>
</section>