<?php 
$block = [
    'title'           => esc_attr__( 'Call to Action', 'architronix' ),
    'id'              => 'call-to-action',
    'icon'            => 'migrate',
    'description'     => 'Display title, subtitle & button',   
    'fields'          => [  
        [
            'name'        => esc_attr__('Template', 'architronix'),
            'id'          => 'template',
            'type'        => 'hidden',
            'std'         => 'blocks/call-to-action.php'
            
        ], 
        [
            'name'        => esc_attr__('Background image', 'architronix'),
            'id'          => 'background_image',
            'type'        => 'single_image',
            'std'         => '',
                     
        ],                                  
    ],
];
$blocks = [
    [
        'title' => 'Call to action content',
        'id' => 'cta_text',
        'preset' => true,
        'group_title' => 'Preset {#}. Style: {template}: {title}',
        'admin_file' => 'blocks/element/section-title.php',
        'std' => [            
            [
                'style' => 'global/section-title-1.php',
                'name' => '',
                'title' => 'Drop Us a Line',
            ]            
        ]
        
    ],
    [
        'title' => 'Button',
        'id' => 'button',
        'preset' => true,
        'group_title' => '{#}. {title} : {style}',
        'admin_file' => 'blocks/element/button.php',
    ]
];
return control_agency_config_my_block($block, $blocks);