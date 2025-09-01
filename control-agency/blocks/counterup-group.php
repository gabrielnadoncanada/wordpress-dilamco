<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<div class="event-counter position-relative<?php echo esc_attr($additional_class); ?>">
    <div class="container">
        <div class="row row-cols-2 row-cols-md-3 gy-lg-0 gy-4 justify-content-between">
        <?php
        if (!empty($counterup_group)) :
          $count = 1;
          foreach ($counterup_group as $counter) :
        ?>
          <?php if (!empty($counter['counter_title']) && !empty($counter['counter_number'])) : ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="separator d-flex align-items-center fw-extra-bold display-3">
                        <span class="odometer" data-count-to=<?php echo wp_kses_post($counter['counter_number']); ?>></span><span><?php if(!empty($counter['counter_label']))  echo  wp_kses_post($counter['counter_label']); else echo '';?></span>							
                </div>	
                <p class="fs-5 fw-bold mb-0 mt-1 mt-lg-2 mt-xxl-3"><?php echo wp_kses_post($counter['counter_title']); ?></p>								
            </div>
            <?php endif; ?>
        <?php
          $count++;
          endforeach;
        endif;
        ?>
        </div>
    </div>
</div>