<section class="section-team position-relative mb-50 mb-lg-120">
    <div class="container">
        <div class="row gy-5 justify-content-between">
            <div class="col-lg-5 order-lg-1">
                <?php control_agency_render_template('member/single/thumbnail.php', $args); ?>					
            </div>
            <!-- col-5 -->
            <div class="col-lg-6 order-lg-0">
                <div class="d-flex flex-column gap-30 gap-lg-5">
                    <div>
                        <?php control_agency_content($title, '<h4 class="mb-4 mb-lg-30">', '</h4>') ?>
                        <?php the_content(); ?>                        
                    </div>
                    <?php control_agency_render_template('member/single/overview.php', $args); ?>                    
                </div>							
            </div>	
            <!-- col-6 -->
        </div>
    </div>
</section>