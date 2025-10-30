<?php
if (empty($projects)) return;
?>

<style>
    .section-portfolio
    {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .section-portfolio .gallery-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<section class="section-portfolio portfolio-1 position-relative pb-5 pb-lg-120">
    <div class="container">
        <div class="row gx-15 gy-30 section-padding-lg">
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
                    <div class="col-md-6 col-lg-4">
                        <div class="gallery-contents gallery-post-item-<?php echo esc_attr($portfolio_id); ?> gallery-sm" 
                        style="--bs-gallery-sm-width: 100% !important; width: 100% !important; --bs-gallery-contents-hight: 450px !important;">
                            <div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
                            <div class="gallery-image-wrapper overlay">
                                <img decoding="async" 
                                class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover lazy entered loaded ca-lazy-loaded" 
                                src="<?php echo esc_url($portfolio_image); ?>" alt="<?php esc_attr($portfolio_title) ?>" data-ll-status="loaded">
                            <div class="gallery-info-wrapper">
                                <div class="gallery-info">
                                    <a href="<?php echo esc_url($portfolio_link) ?>" class="text-decoration-none link-hover-animation-1 gallery-title separator">
                                        <h4 class="mb-0"><?php echo esc_html($portfolio_title); ?></h4>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>  
        </div>        
    </div>
   
</section>