<?php 
return [
    'title'           => esc_attr__( 'Slider', 'architronix' ),
    'id'              => 'slider',
    'icon'            => 'cover-image',
    'description'     => 'Select your slider style',   
    'fields'          => [
        [
            'name'            => 'Slider Style',
            'id'              => 'template_file',
            'type'            => 'select',
            'std'             => 'blocks/slider-1.php',
            'options'         => [
                'blocks/slider-1.php'       => 'Slider 1',
                'blocks/slider-2.php'       => 'Slider 2',
                'blocks/slider-3.php'       => 'Slider 3',
            ],
        ],
        // fields for slider 1 start 
        [
            'name'              => esc_attr__('Slides', 'architronix'),
            'id'                => 'slides',
            'type'              => 'group', 
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {slide_name}',
            'max_clone'         => 10,
            'add_button'        => __( 'Add new slide', 'architronix' ),
            'visible'          => ['template_file', '=', 'blocks/slider-1.php'],
            'std'               => [
                [
                    'slide_sl' => '01',
                    'image_url' => get_theme_file_uri('assets/images/hero-1.jpg'),
                    'slide_name' => 'Elegant Design Showcase',
                    'slide_text' => 'Elegance',
                    'slide_stroke_text' => 'Redefined',
                    'slide_button_text' => 'Explore Our Portfolio',
                    'slide_button_url' => '#',
                ],
                [
                    'slide_sl' => '02',
                    'image_url' => get_theme_file_uri('assets/images/hero-2.jpg'),
                    'slide_name' => 'Sustainable Design Focus',
                    'slide_text' => 'Greener',
                    'slide_stroke_text' => 'Tomorrow',
                    'slide_button_text' => 'Explore Our Portfolio',
                    'slide_button_url' => '#',
                ],
                [
                    'slide_sl' => '03',
                    'image_url' => get_theme_file_uri('assets/images/hero-3.jpg'),
                    'slide_name' => 'Meet Our Design Team',
                    'slide_text' => 'Space',
                    'slide_stroke_text' => 'Evolution',
                    'slide_button_text' => 'Explore Our Portfolio',
                    'slide_button_url' => '#',
                ],
                
            ],
            'fields'            => [
                [
                    'id'               => 'image_url',
                    'name'             => esc_attr__('Background image',  'architronix'),
                    'type'             => 'file_input',
                    'class'            =>'input_image',
                    'desc'             => esc_attr__('Add background image to your slide', 'architronix'),    
                ],                
                [
                    'name'        => esc_attr__('Serial', 'architronix'),
                    'id'          => 'slide_sl',
                    'desc'        => esc_attr__('Slide serial number', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Serial',   'architronix'),          
                ],
                [
                    'name'        => esc_attr__('Name', 'architronix'),
                    'id'          => 'slide_name',
                    'desc'        => esc_attr__('Name your slide', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Name',   'architronix'),          
                ],        
                [
                    'name'        => esc_attr__('Text', 'architronix'),
                    'id'          => 'slide_text',
                    'desc'        => esc_attr__('Give a title to your slider or type your texts', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Title',   'architronix'),          
                ],        
                [
                    'name'        => esc_attr__('Stroke text', 'architronix'),
                    'id'          => 'slide_stroke_text',
                    'desc'        => esc_attr__('This text will be stroked', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Stroke text',   'architronix'),          
                ],        
                [
                    'name'        => esc_attr__('Button text', 'architronix'),
                    'id'          => 'slide_button_text',
                    'desc'        => esc_attr__('Type button text', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Button text',   'architronix'),          
                ],        
                [
                    'name'        => esc_attr__('Button URL', 'architronix'),
                    'id'          => 'slide_button_url',
                    'desc'        => esc_attr__('Add the button link', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Button URL',   'architronix'),          
                ],        
            ],
        ], 
        // fields for slider 1 end
        // fields for slider 2 start 
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Type your title here', 'architronix'),
            'type'        => 'textarea',
            'std'         => 'Shaping Interior Excellence',
            'placeholder' => esc_attr__('Title', 'architronix'), 
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'],
                     
        ], 
        [
            'name'        => esc_attr__('Button 1 Text', 'architronix'),
            'id'          => 'button1_text',
            'desc'        => esc_attr__('Enter Button Text', 'architronix'),
            'type'        => 'text',
            'std'         => 'Who we are',
            'placeholder' => esc_attr__('Button Text', 'architronix'),
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'],
            
        ],         
        [
            'name'        => esc_attr__('Button 1 URL', 'architronix'),
            'id'          => 'button1_url',
            'desc'        => esc_attr__('URL for the button', 'architronix'),
            'type'        => 'text',
            'std'         => '#',
            'placeholder' => esc_attr__('Enter button URL here', 'architronix'), 
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'],
                     
        ],
        [
            'name'        => esc_attr__('Button 2 Text', 'architronix'),
            'id'          => 'button2_text',
            'desc'        => esc_attr__('Enter Button Text', 'architronix'),
            'type'        => 'text',
            'std'         => 'View Projects',
            'placeholder' => esc_attr__('Button Text', 'architronix'),
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'],
            
        ],
         
        [
            'name'        => esc_attr__('Button 2 URL', 'architronix'),
            'id'          => 'button2_url',
            'desc'        => esc_attr__('URL for the button', 'architronix'),
            'type'        => 'text',
            'std'         => '#',
            'placeholder' => esc_attr__('Enter button URL here', 'architronix'),
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'], 
                     
        ], 
        [
            'id'                => 'background',
            'name'              => esc_attr('Background Image', 'architronix'),
            'type'              => 'single_image',
            'desc'             => esc_attr__('This image will be used as background of left side', 'architronix'),
            'std'              =>'',
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'],
        ],
        [
            'id'               => 'right_image',
            'name'             => esc_attr__('Right image','architronix'),
            'desc'             => esc_attr__('This image will be displayed on right side', 'architronix'),
            'type'             => 'single_image', 
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'architronix-959x795-cropped',
            'std'              => '',
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'],
        ], 
        [   'name'              => esc_attr__('Projects ', 'architronix'),
            'id'                => 'project',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {project_title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Project', 'architronix' ),
            'visible'          => ['template_file', '=', 'blocks/slider-2.php'],
            'std'               => [
                [
                    'project_title' => 'Space Alchemy',
                    'project_image' => '',
                    'external_url' => get_theme_file_uri('assets/images/hero-5.jpg')
                ],
                [
                    'project_title' => 'Design Symphony',
                    'project_image' => '',
                    'external_url' => get_theme_file_uri('assets/images/hero-6.jpg')
                ],
                [
                    'project_title' => 'Personalized Elegance',
                    'project_image' => '',
                    'external_url' => get_theme_file_uri('assets/images/hero-7.jpg')
                ],
            ],
            'fields'            => [
                           
                [
                    'name' => esc_attr__( 'Title', 'architronix' ),
                    'id'   => 'project_title',
                    'type'    => 'text',   
                ],
                [
                    'id'               => 'external_url',
                    'name'             => esc_attr__('External URL',  'architronix'),
                    'type'             => 'file_input',
                    'desc'             => esc_attr__('Add external image url.(optional)', 'architronix'),    
                ],
                [
                    'id'               => 'project_image',
                    'name'             => esc_attr__('Project Image',  'architronix'),
                    'desc'             => esc_attr__('This will be the background image of the project title', 'architronix'),
                    'type'             => 'single_image',
                    'std'              =>''
                ], 
                
            ],
        ], 
        // fields for slider 2 end     
        // fields for slider 3 start 
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title_3',
            'desc'        => esc_attr__('Type your title here', 'architronix'),
            'type'        => 'text',
            'std'         => 'Shaping Interior',
            'placeholder' => esc_attr__('Title', 'architronix'), 
            'visible'          => ['template_file', '=', 'blocks/slider-3.php'],
                     
        ],   
        [
            'name' => esc_attr__( 'Typed Texts', 'architronix' ),
            'id'   => 'typed_texts',
            'type' => 'text',
            'std'  => array('Excellence', 'Sophistication', 'Elegance', 'Brilliance', 'Harmony'),
            'desc' => esc_attr__('This texts will have the type-writer effect', 'architronix'),
            'clone' => true,
            'visible'          => ['template_file', '=', 'blocks/slider-3.php'],
        ], 
        [
            'name'        => esc_attr__('Button Text', 'architronix'),
            'id'          => 'button3_text',
            'desc'        => esc_attr__('Enter Button Text', 'architronix'),
            'type'        => 'text',
            'std'         => 'Explore Our Portfolio',
            'placeholder' => esc_attr__('Button Text', 'architronix'),
            'visible'          => ['template_file', '=', 'blocks/slider-3.php'],
            
        ], 
        [
            'name'        => esc_attr__('Button URL', 'architronix'),
            'id'          => 'button3_url',
            'desc'        => esc_attr__('URL for the button', 'architronix'),
            'type'        => 'text',
            'std'         => '#',
            'placeholder' => esc_attr__('Enter button URL here', 'architronix'),
            'visible'          => ['template_file', '=', 'blocks/slider-3.php'],
                     
        ],
        [
            'name'             => esc_attr__('Background Video', 'architronix'),
            'id'               => 'background_video',
            'type'             => 'file_input',
            'std'              => '',
            'max_file_uploads' => 1,
            'force_delete'     => false,
            'max_status'       => true,
            'desc'        => esc_attr__('This video will be used as background', 'architronix'),
            'visible'          => ['template_file', '=', 'blocks/slider-3.php'],
        ],
        // fields for slider 3 end
        [
            'name'        => esc_attr__('Add Custom Class', 'architronix'),
            'id'          => 'additional_class',
            'desc'        => esc_attr__('Type Custom Class', 'architronix'),
            'type'        => 'text',
            'std'         => '',     
        ],
    ],
];