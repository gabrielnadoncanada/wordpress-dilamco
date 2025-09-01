<section class="section-service position-relative pb-lg-120 pb-60">
    <div class="container">
        <div class="row justify-content-between gy-5 gy-lg-0">
            <div class="col-lg-7">
                <?php 
                if(has_post_thumbnail()){
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    printf('<div class="service-single-image mb-30 mb-lg-5"><img src="%1$s" class="%3$s" alt="%2$s"></div>', esc_url($image_url), esc_attr(get_the_title()), 'img-fluid object-fit-cover');
                }
                ?>
                <div class="d-flex flex-column gap-30 gap-lg-5">
                    <div class="entry-content wp-block-group">
                    <?php
                    control_agency_content($title, '<h4 class="mb-4 mb-lg-30">', '</h4>');
                    the_content();
                    ?>	
                    </div>
                    <?php control_agency_render_template('service/single/overview.php', $args); ?>
                </div>			
            </div>
            <!-- col-5 -->
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-5 gap-lg-70 sticky-elements">
                    <?php control_agency_render_template('service/single/sidebar.php', $args); ?>
                </div>							
            </div>	
            <!-- col-6 -->
        </div>
    </div>
</section>