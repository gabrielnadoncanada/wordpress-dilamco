<section class="section-career position-relative pt-lg-100 pb-60 pb-lg-100 pt-lg-5 pb-xxl-120">
    <div class="container">
        <div class="row gy-5 justify-content-between">
            <div class="col-lg-4 order-lg-1">
                <div class="overflow-hidden sticky-elements">
                    <?php control_agency_render_template('job/single/overview.php', $args); ?>								
                </div>							
            </div>
            <!-- col-4 -->
            <div class="col-lg-7 order-lg-0">
                
                <div class="mb-30">
                    <?php 
                        $title = str_replace(['[post_title]', '[job_title]'], get_the_title(), $title);
                        control_agency_content($title, '<h4 class="mb-4 mb-lg-30">', '</h4>'); 
                        
                        $content = apply_filters( 'the_content', get_the_content() );
                        $content = str_replace(['<p><strong>', '<p>', '<ul>', '<ol>'], ['<p class="mt-40"><strong class="fw-bold">', '<p class="mb-30">', '<ul class="mb-0 career-lists d-flex flex-column gap-4 gap-lg-30 ps-40 ps-lg-100 ps-xxl-120">', '<ol class="mb-0 career-lists d-flex flex-column gap-4 gap-lg-30 ps-40 ps-lg-100 ps-xxl-120">' ], $content);

                        echo apply_filters( 'the_content', $content );                  
                    ?>						
                </div>

            </div>	
            <!-- col-7 -->
        </div>
        <!-- row -->

        <?php control_agency_render_template('job/single/related-jobs.php', $args); ?>
        
    </div>
</section>