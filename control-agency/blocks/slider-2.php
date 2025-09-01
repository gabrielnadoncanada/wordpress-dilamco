<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-hero hero-2 position-relative overflow-hidden max-width<?php echo esc_attr($additional_class); ?>">
    <div class="bg-primary text-secondary">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="hero-inner-text vector-bg text-lg-end pe-lg-1" <?php !empty($background)? architronix_inline_background_image($background) : '' ?>>
                    <?php if( !empty( $title )): architronix_content($title,'<h2 class="huge-text hero-heading-color fw-extra-bold lh-1">','</h2>' ); endif; ?>
                    <div class="d-inline-flex flex-column flex-sm-row justify-content-lg-end gap-3 gap-md-20 mt-4 mt-xxl-5 ps-1 ps-lg-0 pe-lg-30">
                    <?php if (!empty($button1_text) && !empty($button1_url)) : ?>    
                        <a href="<?php echo esc_url($button1_url); ?>" class="btn btn-outline-secondary  btn-sm"><?php echo wp_kses_post($button1_text); ?></a>
                    <?php endif; ?>	
                    <?php if (!empty($button2_text) && !empty($button2_url)) : ?>  
                        <a href="<?php echo esc_url($button2_url); ?>" class="btn btn-secondary  btn-sm"><?php echo wp_kses_post($button2_text); ?></a>
                    <?php endif; ?>	
                    </div>
                </div>
            </div>
            <!-- col-6 -->
            <div class="col-md-6">
                <?php $right_image_url = control_agency_get_attachment_url($right_image, 'full', get_theme_file_uri('assets/images/hero-8.jpg')); ?>
                <div class="hero-image-responsive">							
                    <picture>										
                        <img src="<?php echo esc_url($right_image_url) ?>" alt="<?php bloginfo('name') ?>">
                    </picture>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>	
    
    <div class="row g-0">
        <?php
            if(!empty($project)) :
            $count = 1;
            foreach ($project as $single_project) :
            $project_title = !empty($single_project['project_title'])? $single_project['project_title'] : '';
            $external_url = !empty($single_project['external_url'])? $single_project['external_url']: get_theme_file_uri('assets/images/hero-5.jpg');
            $project_image_url = control_agency_get_attachment_url($single_project['project_image'], 'full', $external_url);
        ?>
        <div class="col-sm-6 col-lg-4">
            <div class="overlay">
                <img src="<?php echo esc_url($project_image_url) ?>" class="obeject-fit-cover wow slideInLeft responsive-image" width="635" height="405" alt="<?php echo esc_attr($project_title); ?>">
                <?php architronix_content($project_title, '<h5 class="hero-hightlighted-text hero-heading-color fw-extra-bold">', '</h5>') ?>
            </div>
        </div>
        <?php $count++;
        endforeach;
        endif;
        ?>
					
    </div>
    
</section> 