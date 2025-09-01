<?php 
return [
    'title'           => esc_attr__( 'Company Address 1', 'architronix' ),
    'id'              => 'footer_company_address_1',
    'panel'          => 'footer_panel',
    'priority'      => 40, 
    'fields'          => [ 
        [
            'type'        => 'text',
            'id'          => 'address_title',
            'std'       => esc_attr__('Address Spain:', 'architronix'),
            'name'         => esc_html__('Title', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_sub_title',
            'std'       => esc_attr__('Architronix,', 'architronix'),
            'name'         => esc_html__('Subtitle', 'architronix'),
        ],
        [
            'type'        => 'textarea',
            'id'          => 'address_details',
            'std'       => esc_attr__('Avda. Valencia, 3, 46891, Palomar (Valencia), SPAIN', 'architronix'),
            'name'         => esc_html__('Address', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_phone_label',
            'std'       => esc_attr__('Phone:', 'architronix'),
            'name'         => esc_html__('Contact Label', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_phone',
            'std'       => esc_attr__('34962398486', 'architronix'),
            'name'         => esc_html__('Contact Number', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_email_label',
            'std'       => esc_attr__('Email:', 'architronix'),
            'name'         => esc_html__('Contact Label', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_email',
            'std'       => esc_attr__('hello@architronix.com', 'architronix'),
            'name'         => esc_html__('Email', 'architronix'),
        ],
        
        
    ]
];