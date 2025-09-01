<?php 
return [
    'title'           => esc_attr__( 'Contact Form Section', 'architronix' ),
    'id'              => 'contact-form-section',
    'icon'            => 'email',
    'description'     => 'This section is to show contact form',   
    'fields'          => [
        [
            'name'            => 'Select Style',
            'id'              => 'template_file',
            'type'            => 'select',
            'std'             => 'blocks/contact-form-with-title.php',
            'options'         => [
                'blocks/contact-form-with-title.php'       => 'Contact form with title',
                'blocks/contact-form-with-image.php'       => 'Contact form with image',
            ],
        ],
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Give a title to this section', 'architronix'),
            'type'        => 'text',
            'std'         => 'Have a Project in your mind?',
            'placeholder' => esc_attr__('Title', 'architronix'), 
            'visible'          => ['template_file', '=', 'blocks/contact-form-with-title.php']           
        ], 
        [
            'id'               => 'image',
            'name'             => esc_attr__('Image',  'architronix'),
            'desc'             => esc_attr__('This image will be displayed on the left side of the progress bar', 'architronix'),
            'type'             => 'single_image', 
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'architronix-638x355-cropped',
            'std'              => '',
            'visible'          => ['template_file', '=', 'blocks/contact-form-with-image.php']
        ],
        [
            'name'        => esc_attr__('Contact form', 'architronix'),
            'id'          => 'form_id',
            'desc'        => esc_attr__('Select contact form here', 'architronix'),
            'type'        => 'select',
            'options'     => architronix_wpcf7_contact_form_options(),
            'tab'         => 'contact-form',    
            'std'         => '',      
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