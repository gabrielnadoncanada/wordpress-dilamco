<?php
return [
    'title'           => esc_attr__('Progress Bar Section', 'architronix'),
    'id'              => 'progress-bar-section',
    'icon'            => 'chart-pie',
    'description'     => 'Show Progress Bar',     
    'fields'          => [
        [     
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'blocks/progress-bar-section.php'
        ], 
        [
            'id'               => 'image',
            'name'             => esc_attr__('Image',  'architronix'),
            'desc'             => esc_attr__('This image will be displayed on the left side of the progress bar', 'architronix'),
            'type'             => 'single_image', 
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'architronix-900x630-cropped',
            'std'              => ''
        ],
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Type Progress Bar title', 'architronix'),
            'type'        => 'text',
            'std'         => 'Expertise Progress',
            'placeholder' => esc_attr__('Title', 'architronix'), 
                     
        ], 
        [   'name'              => esc_attr__('Click the button to add new progresss bar ', 'architronix'),
            'id'                => 'progress_bar',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {progress_name}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Progress Bar', 'architronix' ),
            'std'               => [
                [
                    'progress_name' => 'Interior Design',
                    'progress' => '95%',
                ],
                [
                    'progress_name' => 'Sustainability',
                    'progress' => '85%',
                ],
                [
                    'progress_name' => 'Decor',
                    'progress' => '90%',
                ],
                [
                    'progress_name' => 'Visualization',
                    'progress' => '93%',
                ],
            ],
            'fields'            => [       
                [
                    'name' => esc_attr__( 'Name', 'architronix' ),
                    'id'   => 'progress_name',
                    'type' => 'text',
                ],              
                [
                    'name' => esc_attr__( 'Progress', 'architronix' ),
                    'id'   => 'progress',
                    'type'    => 'text',    
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