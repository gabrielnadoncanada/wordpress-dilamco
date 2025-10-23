<?php 
$block = [
    'title'           => 'Project Overview',
    'id'              => 'project-overview',
    'icon'            => 'info-outline',
    'disable_block'   => true,
    'description'     => 'Display project overview',
    'fields'          => [
        [            
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'project/single/overview.php',            
        ],
        [
            'type'          => 'single_image',
            'id'            => 'image',
            'name'          => esc_attr__('Image', 'architronix'),
            'desc'          => esc_attr__('Displayed as a single project banner', 'architronix'),
            'max_file_uploads' => 1,
            'max_status'    => false,
            'image_size'    => 'full',
        ],        
        [
            'type'          => 'text',
            'id'            => 'title',
            'name'          => esc_attr__('Title', 'architronix'),
            'typography'    => true,
            'size'           => 60,
            'std'           => '[post_title]',
            'desc'          => sprintf(esc_attr__('Type your custom title here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<b>Post title</b>'),
        ],
        [
            'type'          => 'textarea',
            'id'            => 'subtitle',
            'name'          => esc_attr__('Subtitle', 'architronix'),
            'typography'    => true,
            'std'           => '[post_excerpt]',
            'desc'          => sprintf(esc_attr__('Type your short description here. use %s to display excerpt. Leave blank to display %s', 'architronix'), '<code>[post_excerpt]</code>', '<b>Project excerpt</b>'),    
        ],        
        [
            'type'          => 'text',
            'id'            => 'overview_title',
            'name'          => esc_attr__('Overview Title', 'architronix'),
            'size'           => 60,
            'typography'    => true,
            'std'           => 'Overview [post_title]',
            'desc'          => sprintf(esc_attr__('Type your custom title here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<code>Post title</code>'),
        ],
        [
            'name'        => esc_attr__('Overviews', 'architronix'),
            'id'          => 'overviews',
            'type'        => 'group',
            'clone'       => true,
            'sort_clone'       => true,
            'collapsible' => true,
            'default_state'     => 'collapsed',
            'group_title' => '{#}. {title}: {desc}',
            'desc'          => sprintf(esc_attr__('Use %s, %s in description to get dynamic value from this project', 'architronix'), '<code>[project_types]</code> - <strong>Project Category</strong>', '<code>[collaborators]</code> - <strong>Project collaborators</strong>'),
            'std'         => [
                [
                    'title' => 'Type de projet :',
                    'desc'  => 'Cuisine sur mesure',
                ],
                [
                    'title' => 'Localisation :',
                    'desc'  => 'Montréal, QC',
                ],
                [
                    'title' => 'Matériaux principaux :',
                    'desc'  => 'Bouleau massif, contreplaqué de bouleau',
                ],
                [
                    'title' => 'Année de réalisation :',
                    'desc'  => '2025',
                ],
            ],
            'fields' => [
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
        ]       
    ],
];

$blocks = [      
    [
        'title' => 'Custom links',
        'id' => 'website',
        'preset' => true,                
        'admin_file' => 'blocks/element/button.php',
        'group_title' => '{#}. {title} : {style}',
        'std' => [
            [
                'title' => 'Technical Sheet',
                'url_type' => 'modal',
                'modal_title' => 'Download Sheet',
                'modal_content' => 'Enter modal content here....',
                'url' => '#',
                'target' => '',
                'style' => 'secondary',
                'outline' => true,
                'icon' => true,
                'icon_position' => 'end',
            ]
        ]
    ],
    
];

return control_agency_config_my_block($block, $blocks);