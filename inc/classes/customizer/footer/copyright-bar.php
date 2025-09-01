<?php 
return [
    'title'           => esc_attr__( 'Copyright bar', 'architronix' ),
    'id'              => 'copyright_bar',
    'panel'          => 'footer_panel',
    'priority'      => 60, 
    'fields'          => [ 
        [
            'type'        => 'textarea',
            'id'          => 'made_by_text',
            'std'       => esc_html__(' Made with Love by {Themeperch}', 'architronix'),
            'name'         => esc_html__('Credit Text', 'architronix'),
            'desc' =>    esc_html__('Use {your-link-text} to apply link to credit text', 'architronix'),
        ],
        [
            'name'        => esc_attr__('Credit Link', 'architronix'),
            'type'        => 'text',
            'id'          => 'made_by_link',
            'std'          => '#',
            'desc' =>  esc_attr__('Link apply to copyright text', 'architronix'),
        ],
        [
            'type'        => 'textarea',
            'id'          => 'copyright_text',
            'std'       => architronix_default_footer_text(),
            'name'         => esc_html__('Copyright text', 'architronix'),
            'desc' =>    esc_html__('Use [date] for current year', 'architronix'),
        ],
        
        
    ]
];