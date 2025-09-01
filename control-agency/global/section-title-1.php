<?php 
extract(wp_parse_args($args, [
    'name' => '',
    'title' => '',    
    'subtitle' => '',
    'name_size' => '',
    'name_color' => '',
    'title_size' => '',
    'title_color' => '',
    'subtitle_size' => '',
    'subtitle_color' => '',
    'name_format' => '<div class="scroll-move scroll-move-right"><span class="%2$s">%1$s</span></div>',
    'title_format' => '<h2 class="%2$s">%1$s</h2>',
    'subtitle_format' => '<p class="%2$s">%1$s</p>',
    'wrapper_format' => '<div class="section-title-wrapper position-relative">%1$s<div class="container"><div class="section-title section-separator">%2$s%3$s</div></div></div>',
    'echo' => true
]));
$title = str_replace('[post_title]', get_the_title(), $title);
$subtitle = str_replace('[post_title]', get_the_title(), $subtitle);
$subtitle = str_replace('[post_excerpt]', get_the_excerpt(), $subtitle);
$name_classes = [
    'scrolling-text',
    'fw-extra-bold',
    'stroke-title', 
    'text-stroke',
    'stroke-opacity-20',
    'stroke-width-1',
    'lh-1',
    !empty($name_size)? "{$name_size}" : 'display-1',
    !empty($name_color)? "stroke-{$name_color}" : 'stroke-light',
    !empty($name_css_class)? $name_css_class : '',
];
$title_classes = [
    'heading-title separator',
    'fw-extra-bold',
    'lh-1',
    !empty($title_size)? "{$title_size}" : '',
    !empty($title_color)? "text-{$title_color}" : '',
    !empty($title_css_class)? $title_css_class : '',
];
$subtitle_classes = [
    'fw-semibold', 
    'mb-0', 
    'subtitle',
    'subtitle-width',
    !empty($subtitle_size)? "{$subtitle_size}" : 'fs-4',
    !empty($subtitle_color)? "text-{$subtitle_color}" : '',
    !empty($subtitle_css_class)? $subtitle_css_class : '',
];

if(!empty($name)){
    $name = sprintf($name_format, $name, implode(' ', array_filter($name_classes)));
}
if(!empty($title)){
    $title = sprintf($title_format, $title, implode(' ', array_filter($title_classes)));
}
if(!empty($subtitle)){
    $subtitle = sprintf($subtitle_format, $subtitle, implode(' ', array_filter($subtitle_classes)));
}

if($echo){
    printf($wrapper_format, $name, $title, $subtitle);
}else{
    return sprintf($wrapper_format, $name, $title, $subtitle);
}