<?php 
if(!empty($gallery)){
    $gallery = !is_array($gallery) ? explode(',', $gallery) : $gallery;
}else{
    $gallery = [];
}
wp_enqueue_script('jquery-masonary')
?>

<?php if(!empty($gallery)): ?>
    <div class="section-full-width position-relative image-contents d-flex flex-column flex-xl-row align-items-xl-center gap-4 section-padding-md position-relative px-10 px-lg-0">
        <?php 
            $image_sizes = ['architronix-585x792-cropped', 'architronix-1201x792-cropped'];
            $image_count = count($gallery);
            $div_index = 0;
            
            foreach ($gallery as $key => $attachment_id) {
                if ($key % 2 == 0 && $key != 0) {
                    $div_index++;
                    echo '</div><div class="section-full-width position-relative image-contents d-flex flex-column flex-xl-row gap-4 section-padding-md position-relative px-10 px-lg-0">';
                }
                
                $size_key = ($div_index % 2 == 0) ? $key % 2 : ($key % 2 == 0 ? 1 : 0);
                $image = wp_get_attachment_image($attachment_id, $image_sizes[$size_key], false, ['class' => 'img-fluid wow fadeIn', 'data-wow-delay' => ($size_key + 1) * 0.1 . 's']); 
                $image_url = wp_get_attachment_image_url($attachment_id, $image_sizes[$size_key]);
                if(!empty($image_url)){
                    printf('<img src="%s" alt="" class="%s" data-ca-animation="fadeIn">', esc_url($image_url), esc_attr(get_the_title()), 'img-fluid h-100 object-fit-cover');
                }

                if(empty($image) || is_wp_error($image)) continue;

                
            }
        ?>
    </div>
<?php 
endif; 

if(!empty($gallery_desc)){
    $gallery_desc = str_replace('[post_title]', get_the_title(), $gallery_desc);
    control_agency_content($gallery_desc, '<div class="section-padding-md"><div class="container"><div class="row"><div class="col-lg-8"><div class="section-title section-separator"><p class="mb-0 subtitle py-2 py-lg-4">', '</p></div></div></div></div></div>'); 
}