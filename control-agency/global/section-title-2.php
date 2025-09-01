<?php 
extract(wp_parse_args($args, [
    'name' => '',
    'title' => '',
    'title_size' => '',
    'title_size' => '',
    'subtitle' => '',
    'subtitle_size' => '', 
]));
$title = str_replace('[post_title]', get_the_title(), $title);
$subtitle = str_replace('[post_title]', get_the_title(), $subtitle);
$title_class = 'fw-extra-bold lh-1 mb-0';
$title_class .= !empty($title_size)? " {$title_size}" : '';
$title_class .= !empty($subtitle)? " heading-title separator" : '';
$subtitle_class = 'fw-semibold mb-0 subtitle subtitle-width mt-10';
$subtitle_class .= !empty($subtitle_size)? " {$subtitle_size}" : '';
$name_class = 'scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-light lh-1';
?>


<?php architronix_content($name, '<div class="scroll-move z-0 w-100 position-absolute start-0 top-0"><span class="'.esc_attr($name_class).'">', '</span></div>'); ?>
<div class="section-title position-relative z-1" style="--bs-section-title-top-spacing: 0; --bs-border-color: currentColor;">
    <?php architronix_content($title, '<h2 class="'.esc_attr($title_class).'">', '</h2>'); ?>
    <?php architronix_content($subtitle, '<div><p class="'.esc_attr($subtitle_class).'">', '</p></div>'); ?>            
</div>


