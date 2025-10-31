<?php

if(!file_exists( get_attached_file ( get_post_thumbnail_id( get_the_ID()) ))) return; ?>
<div class="col-md-6 ">
    <div class="gallery-contents has-fancybox gallery-post-item-<?php echo esc_attr(get_the_ID()); ?> gallery-sm" 
        style="--bs-gallery-sm-width: 100% !important; width: 100% !important; --bs-gallery-contents-hight: 450px !important; --bs-gallery-title-width: 100% !important;">
        <div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
            <div class="gallery-image-wrapper overlay h-100">
                <?php if (has_post_thumbnail()) : ?>
                    <a data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" data-fancybox="project-gallery" data-caption="<?php the_title_attribute(); ?>"
                    class="d-block w-100 h-100">
                        <img decoding="async" 
                        class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover lazy entered loaded ca-lazy-loaded" 
                        src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>" data-ll-status="loaded">
                    </a>
                <?php endif; ?>
            </div>
            <div class="gallery-info-wrapper">
                <div class="gallery-info d-flex flex-column justify-content-between align-items-start">
                    <div class="text-decoration-none link-hover-animation-1 gallery-title separator">
                        <h4 class="mb-0"><?php the_title(); ?></h4>
                    </div>
                    <?php
                    if(!empty(get_the_excerpt())): ?>
                        <p class="gallery-description"><?php echo get_the_excerpt(); ?></p>
                    <?php
                   
                    endif;
                    if(get_field('is_case_study', get_the_ID())): ?>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class=" d-inline-flex gap-10 align-items-center">
                            <?php esc_html_e('Voir le projet', 'architronix'); ?>
                            <span>
                                <svg width="20" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                                </svg>
                            </span>
                        </a>
                        
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
