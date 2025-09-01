<?php 
return [
    'title'           => esc_attr__('Section Title', 'architronix'),
    'id'              => 'title-section',
    'icon'            => 'editor-paste-text',
    'description'     => 'Provide an appropriate title and brief overview for the section',
    'fields'          => [
        [
            'name'  => 'Title Style',
            'type' => 'select',
            'id' => 'template_file',
            'std' => 'blocks/title-section-1.php',
            'options' => [
               'blocks/title-section-1.php' =>  'Title Style 1',
               'blocks/title-section-2.php' =>  'Title Style 2',
            ]
        ],
        
        [
            'name'        => esc_attr__('Section Name', 'architronix'),
            'id'          => 'section_name',
            'desc'        => esc_attr__('Type your section title here which will move on scrolling', 'architronix'),
            'type'        => 'text',
            'std'        => esc_attr__('About Us', 'architronix'),
            'placeholder' => esc_attr__('Section Name',   'architronix'),          
        ],
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Type your section title here', 'architronix'),
            'type'        => 'text',
            'std'        => esc_attr__('Foundations of Architronix', 'architronix'),
            'placeholder' => esc_attr__('Title', 'architronix'),          
        ],
        [
            'name'        => esc_attr__('Short Description', 'architronix'),
            'id'          => 'short_desc',
            'desc'        => esc_attr__('Write short description for the section', 'architronix'),
            'type'        => 'textarea',
            'std'        => esc_attr__('Crafting Architectural Designing and Masterpieces Interior Wonders', 'architronix'),
            'placeholder' => esc_attr__('Short Description', 'architronix'),          
        ], 
        [
            'name'        => esc_attr__('Button Text', 'architronix'),
            'id'          => 'button_text',
            'desc'        => esc_attr__('If you don\'t need it, just leave it blank.', 'architronix'),
            'type'        => 'text',
            'std'         => 'Contact Us',
            'placeholder' => esc_attr__('Button Text', 'architronix'),
            'visible'          => ['template_file', '=', 'blocks/title-section-2.php' ],
            
        ],
        [
            'name'        => esc_attr__('Button URL', 'architronix'),
            'id'          => 'button_url',
            'desc'        => esc_attr__('URL for the button', 'architronix'),
            'type'        => 'text',
            'std'         => '#',
            'placeholder' => esc_attr__('Enter button URL here', 'architronix'), 
            'visible'          => ['template_file', '=', 'blocks/title-section-2.php' ],               
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