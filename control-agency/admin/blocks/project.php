<?php 
return [
    'title'           => esc_attr__('Project', 'architronix'),
    'id'              => 'project',
    'icon'            => 'welcome-widgets-menus',
    'description'     => 'Give a quick, clear snapshot of your company project detail to the visitors',    
    'fields'          => [
        [
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'blocks/project.php'
        ],
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Type your project title here', 'architronix'),
            'type'        => 'text',
            'std'        => esc_attr__('Pixel House', 'architronix'),
            'placeholder' => esc_attr__('Title', 'architronix'),          
        ],
        [
            'name'        => esc_attr__('Description', 'architronix'),
            'id'          => 'description',
            'desc'        => esc_attr__('Type your project description here', 'architronix'),
            'type'        => 'text',
            'std'        => esc_attr__('A while ago, in the year 2017, we promised new clients of ours that we know how to do a “gradient wall”. One that starts sealed but fades and disappears into nothing… into air.', 'architronix'),
            'placeholder' => esc_attr__('Description', 'architronix'),          
        ],
        [   
            'name'              => esc_attr__('Details', 'architronix'),
            'id'                => 'details',
            'type'              => 'group', 
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {label}',
            'max_clone'         => 10,
            'add_button'        => __( 'Add More', 'architronix' ),
            'std'               => [
                [
                    'label' => 'Location:',
                    'content' => 'Sao Paulo, Brazil',
                ],
                [
                    'label' => 'Year:',
                    'content' => '2021',
                ],
                [
                    'label' => 'Category:',
                    'content' => 'Private House',
                ],
            ],
            'fields'            => [
                [
                    'name'        => esc_attr__('Label', 'architronix'),
                    'id'          => 'label',
                    'desc'        => esc_attr__('Type Project Label Name', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Location',   'architronix'), 
                         
                ],
                [
                    'name'        => esc_attr__('Content', 'architronix'),
                    'id'          => 'content',
                    'desc'        => esc_attr__('Type Project Details Content', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Sao Paulo, Brazil',   'architronix'), 
                ],
                     
            ],
        ],
        [
            'name'        => esc_attr__('Button Text', 'architronix'),
            'id'          => 'button_text',
            'desc'        => esc_attr__('Edit Button Text', 'architronix'),
            'type'        => 'text',
            'std'         => 'View Project',
            'placeholder' => esc_attr__('View Project', 'architronix'),
            
        ],
         
        [
            'name'        => esc_attr__('Button URL', 'architronix'),
            'id'          => 'button_url',
            'desc'        => esc_attr__('URL for the button', 'architronix'),
            'type'        => 'text',
            'std'         => '#',
            'placeholder' => esc_attr__('Enter button URL here', 'architronix'), 
                     
        ],
                  
    ],
];