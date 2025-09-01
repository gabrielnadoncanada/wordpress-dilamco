<?php 
$block =  [
    'title'           => esc_attr__('Collaborators', 'architronix'),
    'id'              => 'collaborators',
    'disable_block'   => true,
    'icon'            => 'groups',
    'description'     => 'Show your team member',    
    'fields'          => [
        [
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'project/single/collaborators.php',
            
        ],    
        [
            'type'          => 'text',
            'id'            => 'name',
            'name'          => esc_attr__('Name', 'architronix'),
            'size'           => 60,
            'std'           => 'Creadits',
            'typography'    => true,
        ],    
        [
            'type'          => 'text',
            'id'            => 'title',
            'name'          => esc_attr__('Title', 'architronix'),
            'size'           => 60,
            'std'           => '[post_title]',
            'typography'    => true,
            'desc'          => sprintf(esc_attr__('Type your custom title here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<b>Post title</b>'),
        ],
        [
            'type'          => 'textarea',
            'id'            => 'subtitle',
            'name'          => esc_attr__('Subtitle', 'architronix'),
            'std'           => '[post_excerpt]',
            'typography'    => true,
            'desc'          => sprintf(esc_attr__('Type your short description here. use %s to display excerpt. Leave blank to display %s', 'architronix'), '<code>[post_excerpt]</code>', '<b>Project excerpt</b>'),    
        ],        
        [
            'type'          => 'checkbox',
            'id'            => 'enable_credits',
            'name'          => esc_attr__('Other Credits', 'architronix'),
            'std'           => true
        ],
        [
            'type'          => 'text',
            'id'            => 'credits_title',
            'name'          => esc_attr__('Name', 'architronix'),
            'size'           => 60,
            'std'           => 'Other Credits',
            'visible'    => ['enable_credits', '=', true]
        ],
        [
            'name'            => '&nbsp;',
            'id'              => "credits",
            'type'            => 'group',
            'clone'             => true,
            'sort_clone'        => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'save_state'       => false,
            'default_state'       => 'collapsed',
            'group_title'       => "{title}",
            'visible'    => ['enable_credits', '=', true],
            'std'             => [
                [
                    'image' => '',
                    'title' => 'Layero Engenharia',
                    'desc' => 'Engineers',
                    'link' => '#',
                ],
                [
                    'image' => '',
                    'title' => 'Maddison & Walker',
                    'desc' => 'Interior Supplier',
                    'link' => '#',
                ]
            ],
            'fields'        => [
                [
                    'type'          => 'single_image',
                    'id'            => 'image',
                    'name'          => esc_attr__('Image', 'architronix'),
                ],
                [
                    'type'          => 'text',
                    'id'            => 'title',
                    'name'          => esc_attr__('Title', 'architronix'),
                    'size'           => 60,
                ],                
                [
                    'type'          => 'textarea',
                    'id'            => 'desc',
                    'name'          => esc_attr__('Subtitle', 'architronix'),
                ],
                [
                    'type'          => 'text',
                    'id'            => 'link',
                    'name'          => esc_attr__('Link', 'architronix'),
                    'size'           => 60,
                ],
            ]
        ], 
            
    ],
];


return control_agency_config_my_block($block);