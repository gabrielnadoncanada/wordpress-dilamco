<?php
$fields = [     
    [
        'type'          => 'text',
        'id'            => 'title',
        'name'          => esc_attr__('Title', 'architronix'),
        'size'           => 60,
        'std'           => '[post_title]',
        'desc'          => sprintf(esc_attr__('Type your custom title here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<b>Post title</b>'),
    ],
    [
        'type'          => 'textarea',
        'id'            => 'subtitle',
        'name'          => esc_attr__('Subtitle', 'architronix'),
        'std'           => '[post_excerpt]',
        'desc'          => sprintf(esc_attr__('Type your short description here. use %s to display excerpt. Leave blank to display %s', 'architronix'), '<code>[post_excerpt]</code>', '<b>Project excerpt</b>'),    
    ],
       
    [
        'name'          => esc_attr__('Overviews', 'architronix'),
        'id'            => 'overviews',
        'type'          => 'group',
        'clone'         => true,
        'sort_clone'    => true,
        'collapsible'   => true,
        'max_clone'     => 5,
        'default_state' => 'collapsed',
        'group_title'   => '{#}. {title}: {desc}',
        'desc'          => sprintf(esc_attr__('Use %s in description to get dynamic value from this project', 'architronix'), '<code>[project_types]</code> - <strong>Project Category</strong>'),
        'std'           => [            
            [
                'title' => 'Location:',
                'desc' => 'Rio de Janerio',
            ],
            [
                'title' => 'Project Year:',
                'desc' => '2028',
            ],
            [
                'title' => 'Project Types:',
                'desc' => '[project_types]',
            ],
        ],
        'fields'        => [
            [
                'name'        => __('Title', 'architronix'),
                'type'        => 'text',
                'id'          => 'title',
            ],
            [
                'name'        => __('Short description', 'architronix'),
                'type'        => 'textarea',
                'id'          => 'desc',
            ],
            
           
        ],
    ],
    [
        'name'        => esc_attr__('Collaborators', 'architronix'),
        'id'          => "members",
        'type'        => 'post',
        'post_type'   => 'controlmember',
        'field_type'  => 'select_advanced',
        'desc'  => esc_attr__('Choose Collaborators', 'architronix'),
        'multiple'  => true,
    ],
    [
        'name'        => esc_attr__('Services', 'architronix'),
        'id'          => "services",
        'type'        => 'post',
        'post_type'   => 'controlservice',
        'field_type'  => 'select_advanced',
        'desc'  => esc_attr__('Choose Services', 'architronix'),
        'multiple'  => true,
    ],
    
];

return $fields;