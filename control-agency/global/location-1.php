<div class="swiper-slide">
    <div class="contact-details">
        <h2 class="stroke-heading">
            <svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%"><?php echo wp_kses_post($location_sl); ?></text></svg>
        </h2>
        <?php 
        architronix_content($location_title, '<h4 class="service-title">','</h4>'); 
        architronix_content($company_name, '<p class="mb-0 fw-semibold">', '</p>');
        architronix_content($address, '<p class="mb-20 contact-home">', '</p>');
        architronix_content($contact_phone, '<p class="mb-0">Phone:', '</p>');
        architronix_content($contact_email, '<p class="mb-0">Email:', '</p>');
        ?>
        <div class="mt-30">
            <a href="#" data-title="<?php echo esc_attr($location_map_title); ?>" class="link-hover-animation-1 d-inline-flex align-items-center gap-10 text-decoration-none separator btn-map-direction"> View on Map
                <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
                </svg>
            </a>
        </div>
    </div>
</div>
