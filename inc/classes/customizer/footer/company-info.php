<?php 
return [
    'title'           => esc_attr__( 'Company Info', 'architronix' ),
    'id'              => 'footer_area',
    'panel'          => 'footer_panel', 
    'priority'      => 30, 
    'fields'          => [ 
        [
            'name'        => esc_attr__('Footer logo', 'architronix'),
            'type'        => 'single_image',
            'id'          => 'footer_logo',
        ],
        [
            'name'        => esc_attr__('Company slogan', 'architronix'),
            'type'        => 'textarea',
            'id'          => 'footer_social_nav_title',
            'std'          => esc_attr__('Shaping Interior Excellence', 'architronix'),
        ],
        [
            'label_description'        => __('Social links', 'architronix'),
            'id'          => 'footer_social_links',
            'type'        => 'group',
            'clone'       => true,
            'sort_clone' => true,
            'collapsible' => true,
            'default_state'     => 'collapsed',
            'group_title' => '{#}. {title} - {label}',
            'add_button'        => esc_attr__( '+ Social link', 'architronix' ),
            'std'         => architronix_footer_default('footer_social_links'),
            'fields' => [
                [
                    'name'        => __('Title', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'title',
                ],
                [
                    'name'        => __('Icon', 'architronix'),
                    'type'        => 'select_advanced',
                    'id'          => 'icon',
                    'options'     => Architronix\SVG_Icons::options('social')
                ],
                [
                    'name'        => __('Custom Label', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'label',
                    'visible'     => ['header_social_icons_icon', '=', '']
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