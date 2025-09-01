<?php 
return [
    'title'           => esc_attr__( 'Social Links', 'architronix' ),
    'id'              => 'header_social_icons_settings',
    'icon'            => 'button',
    'panel'          => 'header_panel',
    'priority'      => 40, 
    'fields'          => [ 
        [
            'label_description'        => __('Social links', 'architronix'),
            'id'          => 'header_social_links',
            'type'        => 'group',
            'clone'       => true,
            'sort_clone' => true,
            'collapsible' => true,
            'default_state'     => 'collapsed',
            'group_title' => '{#}. {title} - {label}',
            'add_button'        => esc_attr__( '+ Social link', 'architronix' ),
            'std'         => architronix_header_default('header_social_links'),
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