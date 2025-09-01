<?php 
return [
    'title'           => esc_attr__( 'Content List', 'architronix' ),
    'id'              => 'content-list',
    'icon'            => 'editor-ul',
    'description'     => 'Show your content list with different styles',   
    'fields'          => [
        [
            'name'            => 'Select Content List Style',
            'id'              => 'template_file',
            'type'            => 'select',
            'std'             => 'blocks/content-list-1.php',
            'options'         => [
                'blocks/content-list-1.php'       => 'Content List style 1',
                'blocks/content-list-2.php'       => 'Content List style 2',
                'blocks/content-list-3.php'       => 'Content List style 3',
            ],
        ],
        [
            'name'        => esc_attr__('Serial No.', 'architronix'),
            'id'          => 'serial',
            'desc'        => esc_attr__('Enter Serial Number', 'architronix'),
            'type'        => 'text',
            'std'         => '01',
            'placeholder' => esc_attr__('Serial No.', 'architronix'),
            'visible'          => ['template_file', 'in', ['blocks/content-list-1.php', 'blocks/content-list-2.php'] ],  
        ],  
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Type content title', 'architronix'),
            'type'        => 'text',
            'std'         => 'Innovation Beyond Boundaries',
            'placeholder' => esc_attr__('Title', 'architronix'),          
        ],                                   
        [
            'name'        => esc_attr__('Short Description', 'architronix'),
            'id'          => 'short_desc',
            'desc'        => esc_attr__('Write description in brief', 'architronix'),
            'type'        => 'textarea',
            'std'         => 'We thrive on challenging the norms, infusing each project with fresh, innovative perspectives that defy convention.',
            'placeholder' => esc_attr__('Short Description', 'architronix'), 
            'visible'          => ['template_file', 'in', ['blocks/content-list-1.php', 'blocks/content-list-2.php'] ],       
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