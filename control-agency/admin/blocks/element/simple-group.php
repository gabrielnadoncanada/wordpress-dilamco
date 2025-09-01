<?php
extract(wp_parse_args($args, [    
    'name' => '',
    'desc' => '',
    'title_name' => esc_attr__('Title', 'architronix'),
    'title_std' => '',
    'title_desc' => '',
    'group_id' => '', 
    'group_name' => '',
    'group_desc' => '',
    'group_std' => [],
    'visible' => [],
    'hidden' => [],
    'sort_desc' => false,
    'group_title' => '{#}. {title}',
]));
$fields = [
    
    [
        'type'        => 'divider',
    ],
    [
        'name'        => esc_attr($name),
        'type'        => 'custom_html',
        'desc'         => wp_kses_post($desc),
    ],
    [
        'name'        => esc_attr($title_name),
        'id'          => "{$group_id}_title",
        'type'        => 'text',
        'std'         => esc_attr($title_std),
        'desc'         =>  wp_kses_post($title_desc),
        'size' => 60,         
    ],
    [
        'name'        => esc_attr($group_name),
        'desc'         =>  wp_kses_post($group_desc),
        'id'          => $group_id,
        'type'        => 'group',
        'clone'       => true,
        'sort'       => true,
        'collapsible' => true,
        'default_state'     => 'collapsed',
        'group_title' => $group_title,
        'std'         => $group_std,
        'fields' => [
            [
                'name'        => __('Title', 'architronix'),
                'type'        => 'text',
                'id'          => 'title',
            ],
            [
                'name'        => __('Short description', 'architronix'),
                'type'        => $sort_desc? 'text' : 'textarea',
                'id'          => 'desc',
            ],
            
           
        ],
    ]
];

foreach ($fields as $key => $field) {
    if(!empty($visible)){
        $field['visible'] = $visible;
    }
    if(!empty($hidden)){
        $field['hidden'] = $hidden;
    }
    $fields[$key] = $field;
}

return $fields;