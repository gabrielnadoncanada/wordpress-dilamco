<!--Feedback Section ====================== -->
<section class="section-feedback feedback-1 text-secondary<?php echo !empty($css_class)? ' '.esc_attr($css_class) : ''; ?>">
    <div class="container">
        <div class="feedback-wrapper position-relative bg-cover"<?php echo architronix_inline_background_image($background_image, 'cover'); ?>>
            <div class="feedback-content d-flex flex-column gap-4 flex-lg-row align-items-lg-end justify-content-lg-around">
                <div class="content-cta feedback-title">
                    <?php control_agency_render_block('cta_text', $cta_text, true); ?>                    
                </div>
                
                <div class="architronix-button d-flex flex-column gap-10">
                    <?php control_agency_render_block('button', $button, true); ?>
                </div>	
               					
            </div>
        </div>
    </div>
</section>
<!--Feedback Section ====================== -->


