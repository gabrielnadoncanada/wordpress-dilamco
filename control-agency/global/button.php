<?php
extract(wp_parse_args($args, [
    'title' => 'Get started',
    'url_type' => '',    
    'url' => '#',    
    'modal_title' => esc_attr__('Contact us', 'architronix'),
    'modal_content' => esc_attr__('Button modal content.....', 'architronix'),
    'modal_size' => '',
    'target' => '',        
    'rel' => '',
    'style' => 'primary',
    'outline' => false,
    'icon' => false,    
    'icon_position' => 'end',
    'icon_type' => 'svg',
    'icon_size' => 40,
    'icon_gap_x' => 'gap-10',
    'icon_gap_y' => 'gap-10',
    'icon_svg' => '',
    'icon_img' => '',
    'css_class' => '',
    'custom_attributes' => '',  
    'fallback_icon' => '<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path></svg>',
    'fallback_image' => get_theme_file_uri('assets/images/btn-image.jpg'),     
]));

if(empty($title) || empty($url)) return;

$modal_id = uniqid('controlAgencyModal-');
$title = str_replace('[post_title]', get_the_title(), $title);
$button_text = esc_attr($title);
$button_url = esc_url($url);


$classes = ['btn'];
switch ($style) {
    case 'link':
        $classes[] = 'btn-link justify-content-start link-hover-animation-1';
        break;
    
    default:
        $classes[] = $outline? "btn-outline-{$style}" : "btn-{$style}";
        break;
}


if($icon){
    $button_icon = '';
    switch ($icon_type) {        
        case 'img':
           
            $image = control_agency_get_attachment_url($icon_img, 'thumbnail', $fallback_image);
            $button_icon = sprintf('<img src="%1$s" alt="%3$s" width="%2$s" height="%2$s" class="%4$s"  style="%5$s">', 
                esc_url($image),
                intval($icon_size),
                esc_attr($title),
                'rounded-circle object-fit-cover',
                'width: '.intval($icon_size).'px !important; height: '.intval($icon_size).'px !important; border-radius: 50% !important;'
            );
            break;
        
        default:        
            $button_icon = !empty($icon_svg)? architronix_get_icon_svg('ui', $icon_svg, $icon_size) : $fallback_icon;
            break;
    }

    switch ($icon_position) {
        case 'top':
            $classes[] = 'd-inline-flex flex-column';
            $classes[] = $icon_gap_y;
            $button_text = "{$button_icon}{$button_text}";
            break; 

        case 'bottom':
            $classes[] = 'd-inline-flex flex-column align-items-end';
            $classes[] = $icon_gap_y;
            $button_text = "{$button_text}{$button_icon}";
            break;    

        case 'start':
            $classes[] = 'd-inline-flex align-items-center';
            $classes[] = $icon_gap_x;
            $button_text = "{$button_icon}{$button_text}";
            break;

        default:
            $classes[] = 'd-inline-flex align-items-center';
            $classes[] = $icon_gap_x;
            $button_text = "{$button_text}{$button_icon}";
            break;
    }    

}
$classes[] = $css_class;

$attributesArr = [
    'target' => $target,
];

switch ($url_type) {
    case 'modal':
        $attributesArr['data-bs-toggle'] = 'modal';
        $button_url = '#'.$modal_id;
        $attributesArr['rel'] = 'nofollow';
        break;
    
    default:
        $attributesArr['rel'] = esc_attr($rel);
        break;
}


$attributes = '';
if(!empty($attributesArr)){
    foreach ($attributesArr as $key => $value) {
        if(empty($key) || empty($value)) continue;
        $attributes .= sprintf(' %s="%s"', esc_attr($key), esc_attr($value));
    }
}


printf('<a href="%1$s" class="%3$s"%4$s>%2$s</a>',  
    $button_url, 
    $button_text,
    implode(' ', array_filter($classes)),
    $attributes
);

control_agency_load_modal($modal_id, $args);
?>

