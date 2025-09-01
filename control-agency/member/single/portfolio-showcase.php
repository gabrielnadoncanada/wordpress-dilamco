<?php
if (empty($projects)) return;
?>
<section class="section-portfolio portfolio-1 position-relative pb-5 pb-lg-120">
    <div class="container">
        <div class="section-title mb-30 mb-lg-40 mb-xxl-5">
            <?php
            if (!empty($title)) {
                control_agency_content($title, '<h2 class="fw-extra-bold display-3 lh-1 heading-title-style-2">', '</h2>');
            }
            ?>
        </div>
       
            <div class="row gy-40 gx-4">
                <?php foreach ($projects as $portfolio) : 
                    $portfolio = wp_parse_args($portfolio, [
                        'image' => '',
                        'title' => 'La Fuente Condo',
                        'project' => '',
                        'link' => '#',
                    ]);
                    extract($portfolio, EXTR_PREFIX_ALL, 'portfolio');                   
                    if(!empty($portfolio_project) && 'controlproject' === get_post_type( $portfolio_project )){
                        $portfolio_link = get_permalink($portfolio_project);
                        if(empty($portfolio_image) && has_post_thumbnail($portfolio_project)){
                            $portfolio_image = get_the_post_thumbnail_url($portfolio_project, 'architronix-530x400-cropped');
                        }
                    }
                     ?>
                    <!-- col-4 -->
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="portfolio-wrapper position-relative">
                            <div class="portfolio-image overlay">
                                <?php
                                if (!empty($portfolio_image)) :
                                ?>
                                    <img class="object-fit-cover" src="<?php echo esc_url($portfolio_image); ?>" width="416" height="338" alt="<?php esc_attr($portfolio_title) ?>">
                                <?php
                                endif;
                                ?>
                            </div>
                            <a href="<?php echo esc_url($portfolio_link) ?>" class="stretched-link portfolio-title position-absolute">
                                <?php control_agency_content($portfolio_title, '<h4 class="mb-0">', '</h4>'); ?>
                            </a>
                        </div>
                    </div>
                <?php
                endforeach;
               
                ?>
                <!-- col-4 -->
            </div>
    </div>
</section>