<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<div class="swiper-slide<?php echo esc_attr($additional_class); ?>">
    <div class="service-details">
        <?php if (!empty($serial)) : ?>
        <h2 class="stroke-heading">
            <svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%"><?php echo esc_html($serial); ?></text></svg>
        </h2>
        <?php endif; ?>										
        <?php if( !empty( $title )): architronix_content($title,'<h4>','</h4>' ); endif; ?>
        <?php if( !empty( $short_desc )): architronix_content($short_desc,'<p class="mb-0">','</p>' ); endif; ?>
    </div>									
</div>