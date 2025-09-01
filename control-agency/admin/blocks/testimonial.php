<?php 
return [
    'title'           => esc_attr__('Testimonial', 'architronix'),
    'id'              => 'testimonial',
    'icon'            => 'editor-quote',
    'description'     => 'Display testimonials to showcase positive feedback from satisfied clients.',     
    'fields'          => [
        [        
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'blocks/testimonial.php'
        ],
        [
            'id'                => 'testimonials',
            'type'              => 'group', 
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {client_name}',
            'add_button'        => __( 'Add Testimonial', 'architronix' ),
            'std'               => [
                [
                    'client_quote' => 'I was truly impressed by the design expertise of Architronix. They turned my home into a stylish haven, and I couldn\'t be happier!',
                    'client_name' => 'Sarah Johnson',
                    'client_organization' => 'Modern Spaces Inc.',
                ],
                [
                    'client_quote' => 'Architronix exceeded my expectations. They took my vision and brought it to life, creating a breathtaking design that perfectly complements my desire',
                    'client_name' => 'John Smith',
                    'client_organization' => 'Smith & Co. Architecture.',
                ],
                [
                    'client_quote' => 'Architronix Interiors transformed my office space into a functional yet aesthetically pleasing environment. Their attention to detail and innovative designs are top-notch',
                    'client_name' => 'Emily Roberts',
                    'client_organization' => 'UrbanLiving Interiors',
                ],
            ],
            'fields'            => [      
                
                [
                    'name'        => esc_attr__('Client\'s Name', 'architronix'),
                    'id'          => 'client_name',
                    'desc'        => esc_attr__('Type your client\'s name', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Client\'s Name',   'architronix'), 
                           
                ],
                [
                    'name'        => esc_attr__('Client\'s Organization', 'architronix'),
                    'id'          => 'client_organization',
                    'desc'        => esc_attr__('Type client\'s organization name', 'architronix'),
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Client\'s Organization',   'architronix'), 
                            
                ],  
                [
                    'name'        => esc_attr__('Client\'s Quote', 'architronix'),
                    'id'          => 'client_quote',
                    'desc'        => esc_attr__('Type client\'s testimonial', 'architronix'),
                    'type'        => 'textarea',
                    'placeholder' => esc_attr__('Client\'s Quote',   'architronix'), 
                         
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