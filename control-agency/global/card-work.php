<div class="card-work<?php echo esc_attr($class) ?>">
    <div class="card-title">
        <?php 
        $count = str_pad($count, 2, "0", STR_PAD_LEFT);
        $count = !empty($number)? $number : $count;
        control_agency_content($count, '<h1 class="color-200">', '</h1>');
        control_agency_content($title, '<h4 class="color-900">', '</h4>' ); 
        ?>
    </div>
    <div class="card-info-work">
        <div class="card-info bg-0">
            <?php control_agency_content($subtitle, '<p class="font-xl color-900 text-opacity">', '</p>' ); ?>
        </div>
        <?php if(!empty($image)): ?>
        <div class="card-image">
            <img class="parallax-image object-fit-cover" src="<?php echo esc_url($image) ?>" width="355" height="296" alt="<?php echo esc_attr($title) ?>">
        </div>
        <?php endif; ?>
    </div>
</div>