<?php 
return [
    'title'           => esc_attr__('Video section', 'architronix'),
    'id'              => 'video-section',
    'icon'            => 'video-alt3',
    'description'     => 'Show your projects through captivating video',   
    'fields'          => [
        [
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'blocks/video-section.php'
        ],
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'video_title',
            'desc'        => esc_attr__('Type video title here', 'architronix'),
            'type'        => 'text',
            'std'        => esc_attr__('Step into the dynamic world of Visual Design Odyssey', 'architronix'),
            'placeholder' => esc_attr__('Video Title', 'architronix'),          
        ],
        [
            'name'        => esc_attr__('Description', 'architronix'),
            'id'          => 'video_desc',
            'desc'        => esc_attr__('Write short description for the video', 'architronix'),
            'type'        => 'textarea',
            'std'        => esc_attr__('Watch our designs come to life through captivating videos that showcase our creativity, innovation, and the transformation of spaces from concept to reality.', 'architronix'),
            'placeholder' => esc_attr__('Video Description', 'architronix'),          
        ],
        [
            'name' => esc_attr__('Content List', 'architronix'),
            'id'   => 'content_list',
            'type' => 'text',
            'std'  => array('Initial Vision ', 'Collaborative Design', 'Flawless Execution'),
            'desc' => esc_attr__('Add content as list what is described or shown on the video ', 'architronix'),
            'clone' => true
        ],
        [
            'id'               => 'video_image',
            'name'             => esc_attr__('Video Background Image',  'architronix'),
            'desc'             => esc_attr__('This image will be displayed as an background of the video play button', 'architronix'),
            'type'             => 'single_image', 
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'architronix-636x391-cropped',
            'std'              => ''
        ],
        [
            'name'        => esc_attr__('Video Link', 'architronix'),
            'id'          => 'video_url',
            'desc'        => esc_attr__('Add your video link', 'architronix'),
            'type'        => 'text',
            'std'         => 'https://www.youtube.com/watch?v=lfDZJqSrIuk',
            'placeholder' => esc_attr__('Video Link', 'architronix'), 
        ],
        [
            'name'        => esc_attr__('Button Text', 'architronix'),
            'id'          => 'button_text',
            'desc'        => esc_attr__('Enter Button Text', 'architronix'),
            'type'        => 'text',
            'std'         => 'Process of Our Work',
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
        [
            'name'        => esc_attr__('Add Custom Class', 'architronix'),
            'id'          => 'additional_class',
            'desc'        => esc_attr__('Type Custom Class', 'architronix'),
            'type'        => 'text',
            'std'         => '',     
        ],    
    ],
];