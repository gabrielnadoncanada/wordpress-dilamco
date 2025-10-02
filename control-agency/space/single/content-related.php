<div class="swiper-slide">
    <div class="cardRecent">
        <div class="cardImage">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('architronix-670x670-cropped') ?></a>
        </div>
        <div class="cardInfo">
            <h3 class="color-900"><?php the_title(); ?></h3>            
            <div class="info-bottom">
                <?php 
                    $args = [
                        'separator' => ', ', 
                        'wrapper_class' => 'portfolio-cat font-3xl-bold color-600',
                        'disable_links' => true,
                        'slice' => -2,
                        'slice_count' => 2,
                    ];
                    control_agency_get_terms($args);                   
                ?>
                <div class="d-flex">
                    <a class="font-xl-bold color-900 link-effect text-uppercase" href="<?php the_permalink() ?>">
                    <?php echo strip_tags(control_agency_post_type_option('read_more_text', control_agency_config('space_readmore_text'))) ?>
                    </a>
                    <img class="ml-15" src="<?php echo get_theme_file_uri('assets/imgs/template/icons/arrow.svg') ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                </div>
            </div>
        </div>
    </div>
</div>