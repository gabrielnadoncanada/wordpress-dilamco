<?php
return [
    'title'           => 'Portfolio Showcase',
    'id'              => 'portfolio-showcase',
    'icon'            => 'portfolio',
    'description'     => 'Display Portfolio Showcase',
    'fields'          => [
        [
            'name' => 'general',
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'member/single/portfolio-showcase.php',
        ],
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Type your title here', 'architronix'),
            'type'        => 'text',
            'std'         => 'Portfolio Showcase',
            'placeholder' => esc_attr__('Title',   'architronix'),      
        ],
        [
            'name'            => '&nbsp;',
            'id'              => "projects",
            'type'            => 'group',
            'clone'             => true,
            'sort_clone'        => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'save_state'       => false,
            'default_state'       => 'collapsed',
            'group_title'       => "{title}",
            'std'             => [
                [
                    'image' => get_theme_file_uri('assets/images/portfolio-1.jpg'),
                    'title' => 'MFA Lakeside Brielle',
                    'project' => '',
                    'link' => '#',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/portfolio-2.jpg'),
                    'title' => 'Bovio House',
                    'project' => '',
                    'link' => '#',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/portfolio-3.jpg'),
                    'title' => 'La Fuente Condo',
                    'project' => '',
                    'link' => '#',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/portfolio-4.jpg'),
                    'title' => 'Pixel House',
                    'project' => '',
                    'link' => '#',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/portfolio-5.jpg'),
                    'title' => 'La Fuente Condo',
                    'project' => '',
                    'link' => '#',
                ]
            ],
            'fields'        => [                
                [
                    'type'          => 'file_input',
                    'id'            => 'image',
                    'name'          => esc_attr__('Image', 'architronix'),
                    'class'          => 'image-input',
                ],
                [
                    'type'          => 'text',
                    'id'            => 'title',
                    'name'          => esc_attr__('Title', 'architronix'),
                    'size'           => 60,
                ], 
                [
                    'name'        => esc_attr__('Project', 'architronix'),
                    'id'          => "project",
                    'type'        => 'post',
                    'post_type'   => 'controlproject',
                    'field_type'  => 'select_advanced',
                    'desc'  => esc_attr__('Select a project', 'architronix'),
                    'multiple'  => false,
                ],                
                [
                    'type'          => 'text',
                    'id'            => 'link',
                    'name'          => esc_attr__('Custom Link', 'architronix'),
                    'size'          => 60,
                ],
                
            ]
        ], 
    ]
    
];