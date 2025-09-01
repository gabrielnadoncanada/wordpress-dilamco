<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = ''; 
if (!empty($title) && !empty($counter_number)) : ?>
<div class="col-md-6 col-lg-4 col-xl-3<?php echo esc_attr($additional_class); ?>">
    <div class="separator d-flex align-items-center fw-extra-bold display-3">
            <span class="odometer" data-count-to=<?php echo esc_attr($counter_number); ?>></span>							
    </div>	
    <p class="fs-5 fw-bold mb-0 mt-1 mt-lg-2 mt-xxl-3"><?php echo esc_html($title); ?></p>								
</div>
<?php endif; ?>