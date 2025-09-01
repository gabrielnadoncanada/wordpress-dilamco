<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-testimonial testimonial-1 section-full-width<?php echo esc_attr($additional_class); ?>">
    <!-- section-title-wrapper -->
    <div class="swiper-custom-progress position-relative mt-n30">
        <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">
                <?php 
                if( !empty($testimonials) ):
                foreach( $testimonials as $testimonial): 
                ?>
                <div class="swiper-slide">
                    <div class="testimonial-wrapper d-flex gap-10 gap-lg-3 gap-xl-4 align-items-baseline">
                        <div class="testimonial-quote-icon text-secondary">
                            <svg width="121" height="96" viewBox="0 0 121 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M66 95.9453V67.8453C66 49.9188 70.3834 35.0608 79.3087 23.4338C88.2594 11.5728 101.429 3.96088 118.603 0.485051L121 0V26.5397L119.446 26.895C112.752 28.4251 107.289 31.271 102.982 35.3906L102.981 35.392C99.4937 38.7208 97.0251 42.565 95.5542 46.9453H115V95.9453H66ZM92.9 48.9453C93.0636 48.2677 93.2476 47.601 93.4521 46.9453C94.9981 41.988 97.714 37.6546 101.6 33.9453C106.2 29.5453 112 26.5453 119 24.9453V2.44531C118.327 2.58156 117.66 2.72424 117 2.87334C101.189 6.44484 89.1554 13.7022 80.9 24.6453C72.3 35.8453 68 50.2453 68 67.8453V93.9453H113V48.9453H92.9ZM0 95.9453V67.8453C0 49.9188 4.38341 35.0609 13.3086 23.4339C22.2593 11.5729 35.4286 3.96089 52.6033 0.485051L55 0V26.5397L53.4456 26.895C46.7516 28.4251 41.2893 31.271 36.9825 35.3906L36.981 35.392C33.4937 38.7208 31.0251 42.565 29.5542 46.9453H49V95.9453H0ZM26.9 48.9453C27.0636 48.2677 27.2476 47.601 27.4521 46.9453C28.9981 41.988 31.714 37.6546 35.6 33.9453C40.2 29.5453 46 26.5453 53 24.9453V2.44531C52.3268 2.58156 51.6601 2.72424 51 2.87334C35.1887 6.44484 23.1554 13.7022 14.9 24.6453C6.3 35.8453 2 50.2453 2 67.8453V93.9453H47V48.9453H26.9Z" />
                            </svg>
                        </div>
                        <div class="testimonial-details">
                            <?php
                            if( !empty($testimonial['client_quote'] ) ):
                                architronix_content($testimonial['client_quote'], '<p>', '</p>');
                            endif;
                             ?>
                            <div class="testimonial-author">
                            <?php
                            if(!empty($testimonial['client_name'])):
                                architronix_content($testimonial['client_name'], '<h6 class="fw-extra-bold testimonial-author-name">', '</h6>');
                            endif;
                            if(!empty($testimonial['client_organization'])):
                                architronix_content($testimonial['client_organization'], '<span class="fw-medium">', '</span>');
                            endif;
                             ?>
                            </div>
                        </div>
                    </div>
                </div>                
                <?php 
                endforeach;    
                endif; 
                ?>
                <!-- swiper-slide -->
            </div>
            <!-- swiper-wrapper -->
        </div>
        <!-- swiper testimonial-swiper -->
        <div class="container">
            <div class="testimonial-swiper-pagination-wrapper">
                <div class="testimonial-swiper-pagination"></div>
                <div class="swiper-button-progress">
                    <div class="testimonial-progress-button-prev">
                        <svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
                        </svg>
                    </div>
                    <div class="testimonial-progress-button-next">
                        <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>