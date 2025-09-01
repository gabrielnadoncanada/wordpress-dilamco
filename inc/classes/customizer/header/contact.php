<?php 
return [
    'title'           => esc_attr__( 'Email & Phone', 'architronix' ),
    'id'              => 'header_contact_settings',
    'icon'            => 'button',
    'panel'          => 'header_panel',
    'priority'      => 30, 
    'fields'          => [ 
        [
            'type'        => 'group',
            'id'          => 'header_phone',
            'clone'       => false,
            'fields'      => [
                [
                    'name'        => esc_attr__('Phone Label', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'label',
                    'std'          => esc_attr__('Call Us:', 'architronix'),
                ],
                [
                    'name'        => esc_attr__('Phones', 'architronix'),
                    'type'        => 'textarea',
                    'id'          => 'phones',
                    'std'          => '+(1800)456-7890',
                    'desc' => sprintf(esc_attr__( 'Multiple phone numbers are comma %s seperated','architronix' ), '<code>,</code>'),
                ],
            ]
        ],
        [
            'type'        => 'group',
            'id'          => 'header_email',
            'clone'       => false,
            'fields'      => [
                [
                    'name'        => esc_attr__('Email Label', 'architronix'),
                    'type'        => 'text',
                    'id'          => 'label',
                    'std'          => esc_attr__('Email Us:', 'architronix'),
                ],
                [
                    'name'        => esc_attr__('Emails', 'architronix'),
                    'type'        => 'textarea',
                    'id'          => 'emails',
                    'std'          => 'contact@themeperch.net',
                    'desc' => sprintf(esc_attr__( 'Multiple emails are comma %s seperated','architronix' ), '<code>,</code>'),
                ],
            ]
        ],
    ]
];