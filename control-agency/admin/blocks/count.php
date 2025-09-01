<?php
return [
    'title'           => esc_attr__('Counter up', 'architronix'),
    'id'              => 'count',
    'icon'            => 'marker',
    'description'     => 'Show single counter',   
    'fields'          => [
        [    
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'blocks/count.php'
        ],
        [
            'name'        => esc_attr__('Counts', 'architronix'),
            'id'          => 'counter_number',
            'desc'        => esc_attr__('Enter Number', 'architronix'),
            'type'        => 'text',
            'std'         => '22',
            'placeholder' => esc_attr__('Counts', 'architronix'),         
        ],  
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => esc_attr__('Type counter title', 'architronix'),
            'type'        => 'text',
            'std'         => 'Years of experience',
            'placeholder' => esc_attr__('Title', 'architronix'),           
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