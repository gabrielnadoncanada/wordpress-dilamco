<?php
return [
    'title'           => esc_attr__('Counter up Group', 'architronix'),
    'id'              => 'counterup-group',
    'icon'            => 'marker',
    'description'     => 'This is Counter Up Section',  
    'fields'          => [
        [
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'blocks/counterup-group.php'
        ], 
        [   'name'              => esc_attr__('Click the button to add new Counter: ', 'architronix'),
            'id'                => 'counterup_group',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {counter_title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Counter', 'architronix' ),
            'std'               => [
                [
                    'counter_title' => 'Years of experience',
                    'counter_number' => '22',
                    'counter_label' => ''
                ],
                [
                    'counter_title' => 'Projects Completed',
                    'counter_number' => '282',
                    'counter_label' => '+'
                ],
                [
                    'counter_title' => 'Square feet Covered',
                    'counter_number' => '420',
                    'counter_label' => 'k'
                ],
                [
                    'counter_title' => 'Positive Feedbacks',
                    'counter_number' => '93',
                    'counter_label' => '%'
                ]
            ],
            'fields'            => [             
                [
                    'name' => esc_attr__( 'Title', 'architronix' ),
                    'id'   => 'counter_title',
                    'type' => 'text',
                ],              
                [
                    'name' => esc_attr__( 'Counts', 'architronix' ),
                    'id'   => 'counter_number',
                    'type'    => 'text',    
                ],
                [
                    'name' => esc_attr__( 'Counter Label', 'architronix' ),
                    'id'   => 'counter_label',
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