<?php 
if (!empty($gallery)) {
    $gallery = !is_array($gallery) ? explode(',', $gallery) : $gallery;
}
if(empty($gallery)) return;
?>

<div class="container section-padding-lg">	
    <div class="swiper gallerySwiper2">
        <?php if (!empty($gallery)): ?>
        <div class="swiper-wrapper">
            <?php 
            $counter = 1;
            foreach ($gallery as $key => $attachment_id) :
                $image = wp_get_attachment_image($attachment_id, 'architronix-1296x707-cropped', false, ['class' => 'img-fluid']); 
                if (empty($image) || is_wp_error($image)) continue;                                   
            ?>
            <div class="swiper-slide">
                <?php echo wp_kses_post($image); ?>
            </div>
            <?php
                $counter++;
            endforeach; 
            ?>					 
        </div>
        <?php endif; ?>
        <div class="space-gallery-button-next">
            <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
            </svg>
        </div>
        <div class="space-gallery-button-prev">
            <svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
            </svg>
        </div>
    </div>
    
    <div class="swiper gallerySwiper mt-4">
        <?php if (!empty($gallery)): ?>
        <div class="swiper-wrapper">
            <?php 
            $counter = 1;
            foreach ($gallery as $key => $attachment_id) :
                $image = wp_get_attachment_image($attachment_id, 'architronix-412x245-cropped', false, ['class' => 'img-fluid']); 
                if (empty($image) || is_wp_error($image)) continue;                                   
            ?>
            <div class="swiper-slide">
                <?php echo wp_kses_post($image); ?>
            </div>
            <?php
                $counter++;
            endforeach; 
            ?>	
        </div>
        <?php endif; ?>
    </div>
</div>

<?php 
$gallery_desc = str_replace('[post_title]', get_the_title(), $gallery_desc);
control_agency_content($gallery_desc, '<div class="container"><div class="row"><div class="col-lg-8"><div class="section-title section-separator"><p class="mb-0 subtitle py-2 py-lg-4">', '</p></div></div></div></div>'); 
?>
