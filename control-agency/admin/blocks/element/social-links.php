<?php 
return [
    'title'           => esc_attr__( 'Social Links', 'architronix' ),
    'id'              => 'social-links',
    'icon'            => 'button',
    'description'     => '',   
    'fields'          => [
        [
            'label_description' => esc_attr__('Social links title', 'architronix'),
            'id'   => 'social_links_title',
            'type' => 'text',
            'std' => 'Social:',
            'size'   => 60
        ],  
        [
            'label_description'        => __('Social links', 'architronix'),
            'id'          => 'social_links',
            'type'        => 'group',
            'clone'       => true,
            'collapsible' => true,
            'default_state'     => 'collapsed',
            'group_title' => '{#}. {title} - {label}',
            'add_button'        => esc_attr__( '+ Social link', 'architronix' ),
            'std'         => [
                [
                    'title' => esc_attr__('Facebook', 'architronix'),
                    'label' => 'FB',
                    'icon' => '',
                    'url' => '#',
                    'css_class' => '',
                ],
                [
                    'title' => esc_attr__('Linkedin', 'architronix'),
                    'label' => 'IN',
                    'icon' => '',
                    'url' => '#',
                    'css_class' => '',
                ],
                [
                    'title' => esc_attr__('Twitter', 'architronix'),
                    'label' => 'TW',
                    'icon' => '',
                    'url' => '#',
                    'css_class' => '',
                ],
                [
                    'title' => esc_attr__('Instagram', 'architronix'),
                    'label' => 'IG',
                    'icon' => '',
                    'url' => '#',
                    'css_class' => '',
                ]
            ],
            'fields' => [
                [
                    'name'        => __('Title', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'title',
                ],
                [
                    'name'        => __('Label', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'label',
                ],
                [
                    'name'        => __('Icon', 'architronix'),
                    'type'        => 'select',
                    'id'          => 'icon',
                    'options'     => Architronix\SVG_Icons::options('social')
                ],
                [
                    'name'        => __('URL', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'url',
                ],
                [
                    'name'        => __('Extra CSS class', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'css_class',
                ],
               
            ],
        ],
    ]
];