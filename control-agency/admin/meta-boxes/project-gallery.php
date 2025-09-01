<?php
return [
    [
        'title' => 'Gallery',
        'id' => 'gallery',
        'preset' => false,
        'group_title' => 'Preset {#}. Style: {template}',
        'admin_file' => 'blocks/project-gallery.php',
        'visible' => ['template', '=', 'project/single/content.php'],
        'std' => [            
            [
                'template' => 'global/section-title-1.php',
                'name' => 'Connect',
                'title' => 'Drop Us a Line',
            ],
            [
                'style' => 'global/section-title-2.php',
                'name' => 'Connect',
                'title' => 'Let\'s contact with [post_title]',
                'subtitle' => '[post_title]\'s work at Architronix has been feeatured in Design Excellence Magazine, earning him the Interior Alchemist title.',
                'title_size' => 'fs-3'
            ],
        ]
        
    ],
    
];