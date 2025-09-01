<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-expertise section-full-width position-relative<?php echo esc_attr($additional_class); ?>">	
    <div class="expertise-wrapper bg-secondary overflow-x-hidden">
        <div class="row align-items-center">
            <?php $image_url = control_agency_get_attachment_url($image, 'full', get_theme_file_uri('assets/images/expertise.jpg')); ?>
            <div class="col-lg-6">
                <div class="expertise-image overflow-hidden">
                    <img src="<?php echo esc_url($image_url) ?>" class="img-fluid w-100 wow slideInLeft" alt="<?php bloginfo('name') ?>">
                </div>
            </div>
            <!-- col-6 -->
            <div class="col-lg-6">
                <div class="container">
                    <div class="expertise-inner py-40 py-lg-0">
                        <?php if( !empty( $title )): architronix_content($title,'<h4 class="mb-4 mb-xxl-40">','</h4>' ); endif; ?>
                        <div class="d-flex flex-column gap-4 gap-xl-30">
                        <?php
                        if (!empty($progress_bar)) :
                            $count = 1;
                            foreach ($progress_bar as $progress_bar_single) :
                                if (empty($progress_bar_single['progress_name']) || empty($progress_bar_single['progress']))  continue;
                                    $progress_bar_single['count'] = $count;
                                    control_agency_render_template('global/progress-bar.php', $progress_bar_single); 
                            
                                $count++;
                            endforeach;
                        endif;
                        ?>
                        </div>									
                    </div>
                </div>
                
            </div>
            <!-- col-6 -->
        </div>
    </div>    
</section>
<!--Expertise Section ======================-->