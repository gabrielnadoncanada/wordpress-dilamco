<?php
$fields = [
    [
        'name' => esc_attr__('Designation', 'architronix'),
        'id'   => 'designation',
        'type' => 'text',
        'std' => 'Interior Designer',
        'size'   => 60
    ],
    [
        'name'        => esc_attr__('Services Expert in', 'architronix'),
        'id'          => "services",
        'type'        => 'post',
        'post_type'   => 'controlservice',
        'field_type'  => 'select_advanced',
        'desc'  => esc_attr__('Choose Services', 'architronix'),
        'multiple'  => true,
    ],  
    [
        'type'        => 'custom_html',
        'name'         => 'Contact information'
    ],    
    [
        'label_description' => esc_attr__('Title', 'architronix'),
        'id'   => 'contact_title',
        'type' => 'text',
        'std' => 'Contact information:',
        'size'   => 60
    ],
    [
        'label_description' => esc_attr__('Emails label', 'architronix'),
        'id'   => 'emails_title',
        'type' => 'text',
        'std' => 'Email:',
        'size'   => 60
    ],
    [
        'label_description' => esc_attr__('Emails', 'architronix'),
        'desc' => sprintf(esc_attr__('Multiple items are comma %s seperated', 'architronix'), '<code>,</code>'),
        'id'   => 'emails',
        'type' => 'text',
        'std' => 'architronix@themeperch.net',
        'size'   => 60
    ],
    [
        'label_description' => esc_attr__('Phones label', 'architronix'),
        'id'   => 'phones_title',
        'type' => 'text',
        'std' => 'Phone:',
        'size'   => 60
    ],
    [
        'label_description' => esc_attr__('Phones', 'architronix'),
        'desc' => sprintf(esc_attr__('Multiple items are comma %s seperated', 'architronix'), '<code>,</code>'),
        'id'   => 'phones',
        'type' => 'text',
        'std' => '(555) 123-4567',
        'size'   => 60
    ],   
    
    
];

$blocks = [  
    [
        'title' => 'Social Links',
        'id' => 'social_links',
        'desc' => 'Displayed social links in archive & single page',
        'group' => false,
        'admin_file' => 'blocks/element/social-links.php',
    ],  
    [
        'title' => 'Custom links',
        'id' => 'website',
        'preset' => true,                
        'admin_file' => 'blocks/element/button.php',
        'group_title' => '{#}. {title} : {style}',
        'std' => [
            [
                'title' => 'Connect to Linkedin',
                'url' => '#',
                'target' => '_blank',
                'style' => 'primary',
                'outline' => true,
                'icon' => true,
                'icon_position' => 'end',
            ]
        ]
    ],
    
];

return control_agency_add_my_block($fields, $blocks, true);