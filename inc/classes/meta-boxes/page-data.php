<?php
return [
        'title' => esc_attr__('Architronix Page Data', 'architronix'),
        'id' => 'architronix-page-data',
        'post_types' => ['page'],
        'context' => 'normal',
        'priority' => 'high',
        'default_hidden' => false,
        'class' => 'control-agency-settings-page',
        'visible' => ['page_template', '!=', 'templates/blank-template.php'],
        'fields' => [ 
            [
                'id' => 'header_style',
                'type' => 'select',
                'name' => esc_attr__('Header style', 'architronix'), 
                'std' => '',
                'options' => [
                    '' => esc_attr__('Style 1 (Default)', 'architronix'),
                    'style2' => esc_attr__('Style 2 (Transparent dark)', 'architronix'),
                    'style3' => esc_attr__('Style 3 (Transparent light)', 'architronix'),                    
                ],                 
                      
            ],
            [
                'id' => 'enable_topbar',
                'type' => 'checkbox',
                'name' => esc_attr__('Enable Topbar', 'architronix'),
                'desc' => esc_attr__('Checked to enable Topbar for this page.', 'architronix'),
                'std' => false,
                'visible' => ['header_style', '!=', 'style3']
            ],
            [
                'id' => 'disable_banner',
                'type' => 'checkbox',
                'name' => esc_attr__('Disable Banner', 'architronix'),
                'desc' => esc_attr__('Checked to disable banner for this page.', 'architronix'),
                'std' => false,
            ],
            [
                'id' => 'image',
                'type' => 'single_image',
                'size' => 'full',
                'name' => esc_attr__('Banner image', 'architronix'),
                'visible' => [
                    ['disable_banner', '!=', true]
                ]
            ], 
            [
                'id' => 'prefix',
                'type' => 'text',
                'name' => esc_attr__('Name', 'architronix'),
                'size' => 60,
                'visible' => ['disable_banner', '!=', true]
            ],
            [
                'id' => 'title',
                'type' => 'text',
                'name' => esc_attr__('Title', 'architronix'),
                'placeholder' => esc_attr__('Type your title here...', 'architronix'),
                'desc'        => sprintf(esc_attr__('Use %s to display %s. ', 'architronix'), '<code>[post_title]</code>', '<strong>Page title</strong>'),
                'visible' => ['disable_banner', '!=', true]
            ],          
            [
                'id' => 'subtitle',
                'type' => 'textarea',
                'name' => esc_attr__('Subtitle', 'architronix'),
                'desc'        => sprintf(esc_attr__('Use %s to display %s. ', 'architronix'), '<code>[post_title]</code>', '<strong>Page title</strong>'),
                'visible' => ['disable_banner', '!=', true]
            ],            
            [
                'id' => 'layout',
                'type' => 'image_select',
                'name' => esc_attr__('Page layout', 'architronix'), 
                'inline' => false,        
                'std' => 'rs',
                'options' => [
                    'full' => ARCHITRONIX_ASSETS .'/layout/full-width.png',
                    'ls' => ARCHITRONIX_ASSETS .'/layout/left-sidebar.png',
                    'rs' => ARCHITRONIX_ASSETS .'/layout/right-sidebar.png',
                ], 
                'visible' => ['page_template', '=', ''],
                      
            ], 
            [
                'id' => 'sidebar',
                'type' => 'select',
                'name' => 'Sidebar',         
                'std' => 'sidebar-page',
                'options' => architronix_get_sidebar_options(),       
                'visible' => [
                    ['page_template', '=', ''],
                    ['layout', '!=', 'full']
                ] 
            ],
        ],
];