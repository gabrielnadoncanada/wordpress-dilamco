<?php  
if(empty($args) && !is_array($args)) return;
$title = $desc = $html = $html_group = '';
$defaults = [
    'name' => '',
    'title' => '',
    'subtitle' => '',
    'desc' => '',
    'image' => '',
    'link' => false,
    'link_format' => '<a href="%s">%s</a>',
    'format_image' => '<div class="mb-3"><img src="%s" class="img-fluid" alt="%s"></div>',
    'format_name' => '<span>%s</span>',
    'format_title' => '<h4 class="mb-4 mb-lg-30">%s</h4>',
    'format_subtitle' => '<p class="fw-bold">%s</p>',
    'format_desc' => '<p class="project-overview-description mb-0">%s</p>',
    'format_group_image' => '<div class="mb-3"><img src="%s" class="img-fluid" alt="%s"></div>',
    'format_group_name' => '<span>%s</span>',
    'format_group_title' => '<p class="mb-10 fw-bold">%s</p>',
    'format_group_desc' => '<span class="team-descriptions d-inline-block mb-30">%s</span>',
    'format_group_item' => '%s',
    'format_group' => '%s',
    'format_wrapper' => '<div>%s</div>',
    'item_link_format' => '<a href="%s">%s</a>',
    'image_size' => 'medium',
    'item_image_size' => 'thumbnail',
    'required_desc' => false,
    'echo' => true,
    'group_item_from' => false,
    'group_item_to' => false,
];
$args = wp_parse_args($args, $defaults);
extract($args);

$image_url = wp_get_attachment_image_url($image, $image_size);   
if(!empty($image_url)){
    $html .= sprintf($format_image, esc_url($image_url), $title);
}

if(!empty($name)){
    $html .= sprintf($format_name, $name);
}

if(!empty($title)){
    $title = str_replace('[post_title]', get_the_title(), $title);
    if($link){
        $title = sprintf($link_format, esc_url($link), $title);
    }
    $html .= sprintf($format_title, $title);
}
if(!empty($subtitle)){
    $subtitle = str_replace('[post_title]', get_the_title(), $subtitle);
    $html .= sprintf($format_subtitle, $subtitle);
}
if(!empty($desc)){
    $desc = str_replace('[post_title]', get_the_title(), $desc);
    $html .= sprintf($format_desc, $desc);
}

if(!empty($group)) { 
    if(!empty($group_item_from) && !empty($group_item_to)){
        if(count($group) > $group_item_to){
            $group = array_slice($group, $group_item_from, $group_item_to);
        }        
    } 
      
    foreach ($group as $single) {        
        $group_image = $group_name =  $group_title = $group_link =  $group_desc = $html_single = '';
        extract(wp_parse_args($single, $defaults), EXTR_PREFIX_ALL, 'group'); 

        
        
        $group_image_url = wp_get_attachment_image_url($group_image, $item_image_size);   
        if(!empty($group_image_url)){
            $html_single .= sprintf($format_group_image, esc_url($group_image_url), $group_title);
        }

        if(!empty($group_name)){
            $group_name = str_replace('[post_title]', get_the_title(), $group_name);
            $html_single .= sprintf($format_group_name, $group_name);
        }

        if(!empty($group_title)){            
            $group_title = str_replace('[post_title]', get_the_title(), $group_title);
            if($group_link){
                $group_title = sprintf($item_link_format, esc_url($group_link), $group_title);
            }
            $html_single .= sprintf($format_group_title, $group_title);
        }
        if(!empty($group_desc)){
            $group_desc = str_replace('[post_title]', get_the_title(), $group_desc);
            $html_single .= !empty($group_desc)? sprintf($format_group_desc, $group_desc) : '';
        }

        if($required_desc && empty($group_desc)){
            $html_single = '';
        }

        if(!empty($html_single)){
            $html_group .= sprintf($format_group_item, $html_single);
        }        
    }
}

if(!empty($html_group)){
    $html .= sprintf($format_group, $html_group);
} 


if($echo){
    printf($format_wrapper, $html);
}else{
    return sprintf($format_wrapper, $html);
}
