<?php 
return [
    'title'           => esc_attr__( 'General settings', 'architronix' ),
    'id'              => 'footer_general_settings',
    'icon'            => 'button',
    'panel'          => 'footer_panel',
    'priority'      => 10, 
    'fields'          => [ 
        [
            'type'        => 'checkbox',
            'id'          => 'enable_cta',
            'std'       => false,
            'desc'         => esc_html__('Display Footer CTA', 'architronix'),
        ],
        [
            'type'        => 'checkbox',
            'id'          => 'enable_social_links',
            'std'       => false,
            'desc'         => esc_html__('Display Social Links', 'architronix'),
        ],
        [
            'type'        => 'checkbox',
            'id'          => 'enable_footer_company_info',
            'std'       => false,
            'desc'         => esc_html__('Display company info', 'architronix'),
        ],
        
        [
            'type'        => 'checkbox',
            'id'          => 'display_footer_address_1',
            'std'         => false,
            'desc'        => esc_html__('Display Address 1', 'architronix'),
            'visible' =>    ['enable_footer_company_info', '=', true]
        ],
        
        
        [
            'type'        => 'checkbox',
            'id'          => 'display_footer_address_2',
            'std'         => false,
            'desc'        => esc_html__('Display Address 2', 'architronix'),
            'visible' =>    ['enable_footer_company_info', '=', true]
        ],
        
        [
            'type'        => 'checkbox',
            'id'          => 'display_back_to_top',
            'std'       => true,
            'desc'         => esc_html__('Display Back to top', 'architronix'),
        ],
        [
            'type'        => 'select',
            'id'          => 'footer_bg_color',
            'std'       => 'bg-secondary',
            'name'         => esc_html__('Footer background color', 'architronix'),
            'options' 	=> [
                'bg-secondary' => 'Secondary',
                    'bg-warning' => 'Warning',
                    'bg-info' => 'Info',
                    'bg-light' => 'Light',
                    'bg-white' => 'White',
                    'bg-body' => 'Body',
            ],
        ],

        
    ]
];