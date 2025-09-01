<?php 
return [
    'title'           => esc_attr__( 'Buttons', 'architronix' ),
    'id'              => 'header_buttons_settings',
    'panel'          => 'header_panel',
    'priority'      => 35, 
    'fields'          => [          
        [
            'label_description'        => __('Buttons', 'architronix'),
            'id'          => 'header_buttons',
            'type'        => 'group',
            'clone'       => true,
            'sort_clone' => true,
            'collapsible' => true,
            'default_state'     => 'collapsed',
            'group_title' => '{#}. {title} - {style} {url_type}',
            'add_button'        => esc_attr__( '+ Button', 'architronix' ),
            'std'         => [
                [
                    'title' => 'Contact us',
                    'url' => '#',
                    'target' => '',
                    'style' => 'primary',
                    'outline' => true,
                    'icon' => true,
                    'icon_position' => 'end',
                ]
                
            ],
            'fields' => [
                [
                    'name'        => esc_attr__('Template', 'architronix'),
                    'id'          => 'template',            
                    'type'        => 'hidden',
                    'std'         => 'global/button.php',                    
                    'attributes'  => ['value' =>'global/button.php'],                    
                ],
                [
                    'name'        => esc_attr__('Button Text', 'architronix'),
                    'id'          => 'title',            
                    'type'        => 'text',
                    'std'         => 'Contact Us',
                    'placeholder' => esc_attr__('Button Text', 'architronix'),
                    'desc'        => sprintf(esc_attr__('Type your button text here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<code>Post title</code>'),            
                ],   
                [
                    'name'            => 'Button type',
                    'id'              => 'url_type',
                    'type'            => 'select',
                    'std'             => '',
                    'options'         => [
                        ''       => 'Custom Link',                
                        'modal'       => 'Modal'
                    ],
                ],
                [
                    'name'        => esc_attr__('Button URL', 'architronix'),
                    'id'          => 'url',
                    'desc'        => esc_attr__('URL for the button', 'architronix'),
                    'type'        => 'text',
                    'std'         => '#',
                    'placeholder' => esc_attr__('Enter button URL here', 'architronix'), 
                    'visible' => ['url_type', '=', ''],                     
                ],         
                [
                    'name'        => esc_attr__('Modal title', 'architronix'),
                    'id'          => 'modal_title',
                    'type'        => 'text',
                    'std'         => esc_attr__('Contact us', 'architronix'),
                    'size'         => 60,
                    'desc'        => sprintf(esc_attr__('Type your button text here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<code>Post title</code>'),
                    'visible' => ['url_type', '=', 'modal'],
                ], 
                [
                    'name'        => esc_attr__('Modal content', 'architronix'),
                    'id'          => 'modal_content',
                    'type'        => 'textarea',
                    'std'         => esc_attr__('Button modal content.....', 'architronix'),
                    'desc'        => esc_attr__('Enter custom shortcode or description. Basic HTML tags are allowed.', 'architronix'),
                    'visible' => ['url_type', '=', 'modal'],
                ],
                [
                    'name'        => esc_attr__('Modal size', 'architronix'),
                    'id'          => 'modal_size',
                    'type'        => 'select',
                    'std'         => '',
                    'options'     => [
                        ''       => 'Default',
                        'modal-sm'       => esc_attr__('Small', 'architronix'),
                        'modal-lg'       => esc_attr__('Large', 'architronix'),
                        'modal-xl'       => esc_attr__('Extra large', 'architronix'),
                        'modal-fullscreen'       => esc_attr__('Fullscreen', 'architronix')
                    ],          
                    'visible' => ['url_type', '=', 'modal'],
                ],
                [
                    'name'            => 'Button target',
                    'id'              => 'target',
                    'type'            => 'select',
                    'std'             => '',
                    'options'         => [
                        ''       => 'Open in same tab',                
                        '_blank'       => esc_attr__('Open in new tab', 'architronix'),
                    ],
                    'visible' => ['url_type', '!=', 'modal'],
                ], 
                [
                    'name'            => 'Button rel',
                    'id'              => 'rel',
                    'type'            => 'select',
                    'std'             => '',
                    'options'         => [
                        ''       => 'None',                
                        'alternate'       => 'alternate',
                        'author'       => 'author',
                        'bookmark'       => 'bookmark',
                        'external'       => 'external',
                        'help'       => 'help',
                        'license'       => 'license',
                        'next'       => 'next',
                        'nofollow'       => 'nofollow',
                        'noopener'       => 'noopener',
                        'noreferrer'       => 'noreferrer',
                        'prev'       => 'prev',
                        'search'       => 'search',
                        'tag'       => 'tag',
                    ],
                    'desc'  => sprintf('The %s attribute specifies the relationship between the current document and the linked document,  %s', '<code>rel</code>', '<a href="https://www.w3schools.com/tags/att_a_rel.asp" target="_blank">Learn more</a>'),
                    'visible' => ['url_type', '!=', 'modal'],
                ],
                [
                    'name'        => esc_attr__('Icon', 'architronix'),
                    'id'          => 'icon',
                    'desc'        => esc_attr__('Checked to enable icon', 'architronix'),
                    'type'        => 'checkbox',
                    'std'         => false,            
                ],
                [
                    'name'        => esc_attr__('Outline', 'architronix'),
                    'id'          => 'outline',
                    'desc'        => esc_attr__('Checked to make it outline', 'architronix'),
                    'type'        => 'checkbox',
                    'std'         => false,
                    'visible' => ['style', '!=', 'link'],
                    
                ],
                [
             
                    'type'            => 'custom_html',
                    'before'          => '<div class="control-agency-group-field"><div class="rwmb-label"></div>',
                ],
                [
                    'name'            => 'Style',
                    'id'              => 'style',
                    'type'            => 'select',
                    'std'             => 'link',
                    'options'         => [
                        'link'       => 'Link',                
                        'primary'       => 'Primary',
                        'secondary'       => 'Secondary',
                        'success'       => 'Success',
                        'danger'       => 'Danger',
                        'warning'       => 'Warning',
                        'info'       => 'Info',
                        'light'       => 'Light',
                        'dark'       => 'Dark',
                    ],
                ],
                [
                    'name'            => 'Icon position',
                    'id'              => 'icon_position',
                    'type'            => 'select',
                    'std'             => 'end',
                    'options'         => [
                        'start'       => 'Start',                
                        'end'       => 'End',
                        'top'       => 'Top',
                        'bottom'       => 'Bottom'
                    ],
                    'visible' => ['icon', '!=', false],
                ],
                [
                    'name'            => 'Icon type',
                    'id'              => 'icon_type',
                    'type'            => 'select',
                    'std'             => 'svg',
                    'options'         => [
                        'svg'       => 'SVG',                
                        'img'       => 'Image'
                    ],
                    'visible' => ['icon', '!=', false],
                ],        
                [
                    'name'            => 'SVG icon',
                    'id'              => 'icon_svg',
                    'type'            => 'select',
                    'std'             => '',
                    'options'         => Architronix\SVG_Icons::options(),
                    'visible' => [
                        ['icon', '!=', false],
                        ['icon_type', '=', 'svg'],
                    ],
                ],
                [
                    'name'            => 'Icon size',
                    'id'              => 'icon_size',
                    'type'            => 'number',
                    'std'             => 40,
                    'step'              => 1,
                    'min'              => 10,
                    'max'              => 100,
                    'size'              => 10,
                    'visible' => [
                        ['icon_svg', '!=', ''],
                        ['icon_img', '!=', ''],
                        ['icon', '!=', false],
                    ],
                ],
                
                [
             
                    'type'            => 'custom_html',
                    'after'          => '</div>',
                ],
                [
                    'name'            => 'Image icon',
                    'id'              => 'icon_img',
                    'type'            => 'single_image',
                    'std'             => '',
                    'visible' => [
                        ['icon', '!=', false],
                        ['icon_type', '=', 'img'],
                    ],
                ],
                [
                    'name'        => esc_attr__('CSS class', 'architronix'),
                    'id'          => 'css_class',
                    'type'        => 'text',
                    'std'         => '',
                    'size'         => 60,
                    'placeholder' => esc_attr__('Custom CSS classes...', 'architronix'),
                ],
                                                
            ],
        ],
    ]
];