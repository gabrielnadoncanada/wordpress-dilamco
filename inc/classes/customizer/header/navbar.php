<?php
return [
    'id'             => 'navbar_settings',
    'title'          => 'Navbar',
    'panel'          => 'header_panel',
    'priority'      => 2,
    'fields'         => [        
        [
            'name' => esc_attr__( 'Navbar icons', 'architronix' ),
            'id'   => 'navbar_icons',
            'type' => 'select',
            'clone' => true,
            'sort_clone' => true,
            'max_clone' => 2,
            'add_button' => '+',
            'std' => architronix_header_default('navbar_icons'),
            'options' => [
                'search' => 'Search',
                'cart' => 'Cart',              
            ],
        ],
        [
            'name' => esc_attr__('Shopping Cart', 'architronix'),
            'type' => 'custom_html',
            'desc' => sprintf(esc_attr__( 'Cart icon will be available in navbar when %s plugin is active','architronix' ), '<strong>Woocommerce</strong>'),
            'visible' => ['navbar_icons', 'contains', 'cart']
        ],
        [
            'name' => esc_attr__('Search Label', 'architronix'),
            'id'   => 'header_search_label',
            'type' => 'text',
            'std' => esc_attr__('Search', 'architronix'),
            'visible' => ['navbar_icons', 'contains', 'search']
        ],
        [
            'name' => esc_attr__('Placeholder text', 'architronix'),
            'id'   => 'header_search_placeholder',
            'type' => 'text',
            'std' => esc_attr__('Type & Hit Enter', 'architronix'),
            'visible' => ['navbar_icons', 'contains', 'search']
        ],
    ],
];