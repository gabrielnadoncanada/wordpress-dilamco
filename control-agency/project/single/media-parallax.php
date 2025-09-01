<?php 
$gallery = [];
if(!empty($parallax_image)){
    $gallery = !is_array($parallax_image)? explode(',', $parallax_image) : $parallax_image;
}
if(empty($gallery)) return;
?>
<div class="section is-mode bg-0">
    <?php 
    
        $counter = 1;
        foreach ($gallery as $key => $attachment_id) :
            $image = wp_get_attachment_image($attachment_id, 'full', false, ['class' => 'parallax-image mx-auto']); 
            if(empty($image) || is_wp_error($image)) continue;                                   
                ?>
                <div class="box-banner-section-3 text-center">
                    <?php echo wp_kses_post($image); ?>
                </div>                   
                <?php
            $counter++;
        endforeach; 
   
    $gallery_desc = str_replace('[post_title]', get_the_title(), $gallery_desc);
    control_agency_content($parallax_desc, '<div class="container"><p class="text-padding-3 font-3xl color-900 text-opacity">', '</p></div>'); 
    ?>        
    
</div>