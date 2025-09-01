<?php 
return [
    'title'           => esc_attr__('FAQs Section', 'architronix'),
    'id'              => 'faq',
    'icon'            => 'info-outline',
    'description'     => 'Display question & answer',  
    'fields'          => [
        [
           'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'blocks/faq.php'
        ],
        [
            'id'               => 'image',
            'name'             => esc_attr__('Image',  'architronix'),
            'desc'             => esc_attr__('This image will be displayed on the left side of the section', 'architronix'),
            'type'             => 'single_image', 
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'std'              => ''
        ],
        
        [   'name'        => esc_attr__('Click the button to add new FAQ:', 'architronix'),
            'id'                => 'faqs',
            'type'              => 'group',
            'tab'               => 'faq',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'   => true,
            'default_state'   => 'collapsed',
            'group_title'   => '{#}. {question}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add FAQ', 'architronix' ),
            'std'               => [
                [
                    'question' => 'What Interior Design Services Do You Offer?',
                    'answer' => 'Our interior design services encompass a wide range of offerings, including color consultation, furniture selection, space planning, decor styling, and more. We work closely with you to create spaces that reflect your vision and practical needs.',
                ],
                [
                    'question' => 'How Can You Help with Architectural Planning?',
                    'answer' => 'Our interior design services encompass a wide range of offerings, including color consultation, furniture selection, space planning, decor styling, and more. We work closely with you to create spaces that reflect your vision and practical needs.',
                ],
                [
                    'question' => 'What Do You Mean by Sustainable Design Solutions?',
                    'answer' => 'Our interior design services encompass a wide range of offerings, including color consultation, furniture selection, space planning, decor styling, and more. We work closely with you to create spaces that reflect your vision and practical needs.',
                ],
                [
                    'question' => 'What Can I Expect from Your Room Makeover Services?',
                    'answer' => 'Our interior design services encompass a wide range of offerings, including color consultation, furniture selection, space planning, decor styling, and more. We work closely with you to create spaces that reflect your vision and practical needs.',
                ],
                [
                    'question' => 'How Do Your Lighting Design Services Work?',
                    'answer' => 'Our interior design services encompass a wide range of offerings, including color consultation, furniture selection, space planning, decor styling, and more. We work closely with you to create spaces that reflect your vision and practical needs.',
                ],
                
            ],
            'fields'            => [
                
                [
                    'name' => esc_attr__( 'Question', 'architronix' ),
                    'id'   => 'question',
                    'type' => 'text',
                ],            
                        
                [
                    'name' => esc_attr__( 'Answer', 'architronix' ),
                    'id'   => 'answer',
                    'type'    => 'wysiwyg',
                    'raw'     => false,
                    'options' => [
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                        'dfw' => false,
                        'quicktags' => false,
                        'tinymce' => false
                    ],
                ],      
            ],
        ],
        [
            'name'        => esc_attr__('Add Custom Class', 'architronix'),
            'id'          => 'additional_class',
            'desc'        => esc_attr__('Type Custom Class', 'architronix'),
            'type'        => 'text',
            'std'         => '',     
        ],
    ],
];