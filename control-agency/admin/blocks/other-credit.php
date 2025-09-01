<?php 
return [
    'title'           => 'Other Credits',
    'id'              => 'other-credit',
    'icon'            => 'yes-alt',
    'description'     => 'Give credit other companies worked on your project',
    'fields'          => [
        [            
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'project/single/other-credit.php',
        ],
        [
            
            'type'  => 'text',
            'id'    => 'section_title',
            'name'  => esc_attr__('Section Title', 'architronix'),
            'std'   => 'Other Credits',
        ],
        [   'name'              => esc_attr__('Click the button to add new credit ', 'architronix'),
            'id'                => 'credits',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {company_name}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add New Credit', 'architronix' ),
            'std'               => [
                [
                    'company_name' => 'Layero Engenharia',
                    'company_url' => '#',
                    'company_type' => 'Engineers'
                ],
                [
                    'company_name' => 'Maddison & Walker',
                    'company_url' => '#',
                    'company_type' => 'Interior Supplier'
                ]
            ],
            'fields'            => [
                [
                    'type' => 'single_image',
                    'id'   => 'image',
                    'name' => esc_attr__('Company Logo', 'architronix'),
                    'max_file_uploads' => 1,
                    'max_status'       => false,
                    'image_size'       => 'full',
                ],
                
                [
                    'name' => esc_attr__( 'Company Name', 'architronix' ),
                    'id'   => 'company_name',
                    'type' => 'text',
                ],  
                [
                    'name'        => esc_attr__('Company URL', 'architronix'),
                    'id'          => 'company_url',
                    'type'        => 'text',              
                ],            
                [
                    'name' => esc_attr__( 'Company Type', 'architronix' ),
                    'id'   => 'company_type',
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