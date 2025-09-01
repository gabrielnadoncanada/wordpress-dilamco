<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<div class="about-content-inner d-flex flex-column flex-lg-row<?php echo esc_attr($additional_class); ?>">
    <div class="list-item-number">
        <?php if (!empty($serial)) : ?>
        <h3 class="stroke-heading stroke-heading-2 mb-0">
            <svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%"><?php echo esc_html($serial); ?></text></svg>
        </h3>
        <?php endif; ?>
    </div>									
    
    <div>
        <?php if( !empty( $title )): architronix_content($title,'<h4>','</h4>' ); endif; ?>
        <?php if( !empty( $short_desc )): architronix_content($short_desc,'<p class="mb-0">','</p>' ); endif; ?>
    </div>
</div>
