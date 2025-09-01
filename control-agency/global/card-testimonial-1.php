<div class="cardTestimonials<?php echo !empty($number)? ' cardTestimonialsStyle2' : ''; ?> card-testimonial-1">
    <?php 
        $count = !empty($number)? $number : '';
        control_agency_content($count, '<div class="cardNumber color-100"><span class="display-1">', '</span></div>');
        control_agency_content($desc, '<div class="cardInfo postion-relative z-index-1"><p class="font-3xl color-900 text-opacity">', '</p></div>' ); 
    ?>
    <div class="cardAuthor">
        <div class="box-author">
            <?php if(!empty($image)): ?>
            <img class="scoll-reduce-border-radius object-fit-cover" width="80" height="80" src="<?php echo esc_attr($image) ?>" alt="<?php echo esc_attr($name) ?>">
            <?php endif; ?>
            <div class="author-info">
                <?php 
                control_agency_content($name, '<span class="heading-5 color-900 author-name">', '</span>'); 
                control_agency_content($designation, '<span class="font-lg color-600 department">', '</span>'); 
                ?>
            </div>
        </div>
    </div>
</div>
