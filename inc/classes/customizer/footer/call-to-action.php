<?php 
return [
    'title'           => esc_attr__( 'Call to Action', 'architronix' ),
    'id'              => 'cta_section',
    'panel'          => 'footer_panel', 
    'priority'      => 20, 
    'fields'          => [ 
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'type'        => 'text',
            'id'          => 'cta_title',
            'std'          => esc_attr__('Drop Us a Line', 'architronix'),
        ],
        [
            'name'        => esc_attr__('Button Text', 'architronix'),
            'type'        => 'text',
            'id'          => 'button_text',
            'std'          => esc_attr__('Let\'s Talk', 'architronix'),
        ],
        [
            'name'        => esc_attr__('Button Link', 'architronix'),
            'type'        => 'text',
            'id'          => 'button_link',
            'std'          => '#',
        ],
        [
            'name'        => esc_attr__('Background image', 'architronix'),
            'frame_title' => esc_attr__( 'Background image', 'architronix' ),
			'type' => 'single_image',
            'id'          => 'cta_bg',
        ],
        

        
    ]
];