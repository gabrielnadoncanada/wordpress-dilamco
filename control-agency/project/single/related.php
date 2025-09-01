<?php
// The Query.
$query_args = control_agency_get_query_args($query, 'controlproject');
$the_query = new WP_Query( $query_args );
if ( $the_query->have_posts() ):
?>
<section class="section is-mode bg-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php 
                if(!empty($title)){
                    $title = control_agency_parse_text($title, ['tagclass' => 'stroke-900 no-stroke']);
                    control_agency_content($title, '<h3 class="color-900">', '</h3>'); 
                }
                control_agency_content($subtitle, '<h2 class="heading-1 color-900">', '</h2>');
                ?>
                  
            </div>
            <div class="col-md-4 position-relative">
                <div class="box-button-slider-bottom">
                    <div class="swiper-button-prev swiper-button-prev-group-1 swiper-button-prev-style1">
                        <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                        </svg>
                    </div>
                    <div class="swiper-button-next swiper-button-next-group-1 swiper-button-next-style1">
                        <svg class="icon-16" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-slider-padding-left mt-90 pb-160">
        <div class="box-swiper">
            <div class="swiper-container swiper-group-2">
                <div class="swiper-wrapper">
                    <?php while ( $the_query->have_posts() ):  $the_query->the_post();  ?>
                    <?php control_agency_template_part('project/single/content-related'); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
endif;
wp_reset_postdata();