<?php
return [
    'title'           => 'Member Overview',
    'id'              => 'member',
    'disable_block'   => true,
    'icon'            => 'info-outline',
    'description'     => 'Display project overview',
    'fields'          => [
        [
            'name' => 'general',
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'member/single/overview.php',
        ],
        [
            'name' => esc_attr__('Section Name', 'architronix'),
            'id'   => 'title',
            'type' => 'text',
            'std' => 'Architect',
            'size'   => 60
        ],
        [
            'name' => esc_attr__('Member Name', 'architronix'),
            'id'   => 'name',
            'type' => 'text',
            'std' => 'Russell Otten',
            'size'   => 60
        ],
        [
            'name' => esc_attr__('Designation', 'architronix'),
            'id'   => 'designation',
            'type' => 'text',
            'std' => 'Interior Alchemist',
            'size'   => 60
        ],
        [
            'name'        => esc_attr__('Content', 'architronix'),
            'type'        => 'custom_html',
            'desc'         => 'Editor content will be displayed',
        ],
        [
            'name'        => esc_attr__('Button Text', 'architronix'),
            'id'          => 'button_text',
            'desc'        => esc_attr__('Enter Button Text', 'architronix'),
            'type'        => 'text',
            'std'         => 'Connect to LinkedIn',
            'placeholder' => esc_attr__('Button Text', 'architronix'),
            
        ],
        [
            'name'        => esc_attr__('Button URL', 'architronix'),
            'id'          => 'button_url',
            'desc'        => esc_attr__('URL for the button', 'architronix'),
            'type'        => 'text',
            'std'         => '#',
            'placeholder' => esc_attr__('Enter button URL here', 'architronix'),             
        ],  
        
    ],
    
];