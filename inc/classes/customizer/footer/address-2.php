<?php 
return [
    'title'           => esc_attr__( 'Company Address 2', 'architronix' ),
    'id'              => 'footer_company_address_2',
    'panel'          => 'footer_panel',
    'priority'      => 50, 
    'fields'          => [ 
        [
            'type'        => 'text',
            'id'          => 'address_title2',
            'std'       => esc_attr__('Address USA:', 'architronix'),
            'name'         => esc_html__('Title', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_sub_title2',
            'std'       => esc_attr__('Architronix Inc.', 'architronix'),
            'name'         => esc_html__('Subtitle', 'architronix'),
        ],
        [
            'type'        => 'textarea',
            'id'          => 'address_details2',
            'std'       => esc_attr__('208 English Road, High Point, NC 27262, USA', 'architronix'),
            'name'         => esc_html__('Address', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_phone_label2',
            'std'       => esc_attr__('Phone:', 'architronix'),
            'name'         => esc_html__('Contact Label', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_phone2',
            'std'       => esc_attr__('3368856670', 'architronix'),
            'name'         => esc_html__('Contact Number', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_email_label2',
            'std'       => esc_attr__('Email:', 'architronix'),
            'name'         => esc_html__('Contact Label', 'architronix'),
        ],
        [
            'type'        => 'text',
            'id'          => 'address_email2',
            'std'       => esc_attr__('hello@architronix.com', 'architronix'),
            'name'         => esc_html__('Email', 'architronix'),
        ],
        
        
    ]
];