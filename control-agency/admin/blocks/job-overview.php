<?php 
return [
    'title'           => 'Job Overview',
    'id'              => 'job-overview',
    'icon'            => 'info-outline',
    'description'     => 'Display job overview',
    'fields'          => [
        [            
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'job/single/overview.php',            
        ],
        [
            'type' => 'text',
            'id'   => 'title',
            'name' => esc_attr__('Title', 'architronix'),
            'std'  => 'Job Overview'
        ], 
        [
            'name'     => __( 'Job types', 'architronix' ),
            'id'       => 'job_types',
            'std'     => control_agency_config('job_types'),
            'type'     => 'group',
            'clone'     => false,
            'collapsible' => false,
            'fields' => [
                [
                    'type' => 'text',
                    'id'   => 'label',
                    'placeholder' => esc_attr__('Types label', 'architronix'),
                ],
                [
                    'type' => 'text',
                    'id'   => 'value',
                    'placeholder' => esc_attr__('Types', 'architronix'),                   
                ],
            ],
        ],    
        [
            'name'     => __( 'Job Location', 'architronix' ),
            'id'       => 'job_location',
            'std'     => control_agency_config('job_location'),
            'type'     => 'group',
            'clone'     => false,
            'collapsible' => false,
            'fields' => [
                [
                    'type' => 'text',
                    'id'   => 'label',
                    'placeholder' => esc_attr__('Location label', 'architronix'),
                ],
                [
                    'type' => 'text',
                    'id'   => 'value',
                    'placeholder' => esc_attr__('Location', 'architronix'),
                ],
            ],
        ],
        [
            'name'     => __( 'Experience', 'architronix' ),
            'id'       => 'experience',
            'std'     => control_agency_config('experience'),
            'type'     => 'group',
            'clone'     => false,
            'collapsible' => false,
            'fields' => [
                [
                    'type' => 'text',
                    'id'   => 'label',
                    'placeholder' => esc_attr__('Experience label', 'architronix'),
                ],
                [
                    'type' => 'text',
                    'id'   => 'value',
                    'placeholder' => esc_attr__('Experience Duration', 'architronix'),
                ],
            ],
        ],
        [
            'name'     => __( 'Qualifications', 'architronix' ),
            'id'       => 'qualification',
            'std'     => control_agency_config('qualification'),
            'type'     => 'group',
            'clone'     => false,
            'collapsible' => false,
            'fields' => [
                [
                    'type' => 'text',
                    'id'   => 'label',
                    'placeholder' => esc_attr__('Qualification label', 'architronix'),
                ],
                [
                    'type' => 'text',
                    'id'   => 'value',
                    'placeholder' => esc_attr__('Qualifications', 'architronix'),                   
                ],
            ],
        ],
        [
            'name'     => __( 'Salary Range', 'architronix' ),
            'id'       => 'range',
            'std'     => control_agency_config('range'),
            'type'     => 'group',
            'clone'     => false,
            'collapsible' => false,
            'fields' => [
                [
                    'type' => 'text',
                    'id'   => 'label',
                    'placeholder' => esc_attr__('Salary range label', 'architronix'),
                ],
                [
                    'type' => 'text',
                    'id'   => 'value',
                    'placeholder' => esc_attr__('Salary Range', 'architronix'), 
                    'desc'=> esc_attr__('Text in {} will be bold  ', 'architronix'),                
                ],
            ],
        ],
        [
            'name'     => __( 'Post Date Label', 'architronix' ),
            'id'       => 'date',
            'std'     => control_agency_config('date'),
            'type'     => 'group',
            'clone'     => false,
            'collapsible' => false,
            'fields' => [
                [
                    'type' => 'text',
                    'id'   => 'label',
                    'placeholder' => esc_attr__('Post Date Label', 'architronix'),
                ],
            ],
        ], 
        [
            'name'     => __( 'Expiration date', 'architronix' ),
            'id'       => 'expire',
            'std'     => control_agency_config('expire'),
            'type'     => 'group',
            'clone'     => false,
            'collapsible' => false,
            'fields' => [
                [
                    'type' => 'text',
                    'id'   => 'label',
                    'placeholder' => esc_attr__('Expiration date label', 'architronix'),
                ],
                [
                    'type' => 'text',
                    'id'   => 'value',
                    'placeholder' => esc_attr__('Expiration date', 'architronix'),                   
                ],
            ],
        ],     
    ],
];