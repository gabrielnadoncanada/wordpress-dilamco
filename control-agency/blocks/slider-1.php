<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-hero hero-1<?php echo esc_attr($additional_class); ?>">
    <div id="heroSlider" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="6000">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <?php
            $slide_count = 0;
            foreach ($slides as $slide) {
                $active_class = ($slide_count == 0) ? 'active' : ''; 
            ?>
                <div class="d-flex align-items-center gap-3 gap-lg-1 lh-1 <?php echo esc_attr($active_class); ?>" data-bs-target="#heroSlider" data-bs-slide-to="<?php echo esc_attr($slide_count); ?>">
                    <span class="indecators-item display-4 fw-extra-bold mb-0"><?php echo (!empty($slide['slide_sl'])) ? esc_html($slide['slide_sl']) : ''; ?></span>
                    <span class="indecators-description fw-bold mb-0"><?php echo (!empty($slide['slide_name'])) ? esc_html($slide['slide_name']) : ''; ?></span>
                </div>
            <?php
                $slide_count++;
            }
            ?>
        </div>
        <!-- /.carousel-indicators -->

        <!-- Carousel Inner -->
        <div class="carousel-inner">
            <?php
            $slide_count = 0;
            foreach ($slides as $slide) {
                $active_class = ($slide_count == 0) ? 'active' : '';
                if (!empty($slide['image_url'][0])) {
                    $slide_image_url =  wp_get_attachment_image_url($slide['image_url'][0], 'full');
                } else {
                    $slide_image_url = get_theme_file_uri('assets/images/hero-1.jpg');
                }
            ?>
                <div class="carousel-item <?php echo esc_attr($active_class); ?>">
                    <picture>
                        <img class="hero-image" src="<?php echo esc_url($slide['image_url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    </picture>
                    <div class="carousel-captions">
                        <div class="container">
                            <div class="content-text text-start">
                                <h2 class="stroke-heading display-2 fw-extra-bold d-flex flex-column">
                                    <span class="hero-heading animate-fill primary" data-heading><?php echo (!empty($slide['slide_text'])) ? esc_html($slide['slide_text']) : ''; ?></span>
                                    <svg stroke-width="2" class="text-line display-2 fw-extra-bold z-1"><text x="0%" dominant-baseline="middle" y="70%"><?php echo (!empty($slide['slide_stroke_text'])) ? esc_html($slide['slide_stroke_text']) : ''; ?></text></svg>
                                </h2>
                                <?php if (!empty($slide['slide_button_text']) && !empty($slide['slide_button_url'])) : ?>
                                <div class="architronix-button">
                                    <a href="<?php echo esc_url($slide['slide_button_url']); ?>" class="btn btn-outline-primary gap-10"><?php echo wp_kses_post($slide['slide_button_text']); ?>
                                        <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $slide_count++;
            }
            ?>
        </div>
					<div class="carousel-control-buttons d-flex flex-column gap-0 position-absolute bottom-0 end-0">
						<a class="next-btn" href="#" data-bs-target="#heroSlider" data-bs-slide="next">						
							<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
							</svg>							
						</a>						
						<a class="prev-btn" href="#" data-bs-target="#heroSlider" data-bs-slide="prev"> 														
							<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
							</svg>		
						</a>							
					</div>
                    
				</div>
                
			</section>