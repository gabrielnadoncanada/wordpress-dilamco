<?php 
return [
    'title'           => esc_attr__('Space Showcase', 'architronix'),
    'id'              => 'space-showcase',
    'icon'            => 'sos',
    'description'     => 'Show your creative spaces to the visitorss',    
    'fields'          => [
        [
            'type' => 'select',
            'id' => 'template_file',
            'name' => 'Select Showcase Style',
            'std' => 'blocks/space-showcase.php',
            'options' => [
                'blocks/space-showcase.php' => 'Gallery',
                'blocks/space-showcase-2.php' => 'Slider',
            ] 
        ],
        [
            'name'    => 'Post Per Page',
            'id'      => 'posts_per_page',
            'desc'    => esc_attr__('How many spaces do you want to show', 'architronix'),
            'type'    => 'number',
            'min'     => -1,
            'max'     => 5,
            'std'     => get_option('posts_per_page'),
        ],
        [
            'name'     => esc_attr__('Filter By Space Title', 'architronix'),
            'id'       => 'post__in',
            'type'     => 'select_advanced',
            'desc'    => esc_attr__('Select specific spaces', 'architronix'),
            'options'  => array_column((array)get_posts(['post_type' => 'controlspace', 'posts_per_page' => -1]), 'post_title', 'ID'),
            'multiple' => true,
            'std'     => '',
            
        ],
        [
            'id' => 'order',
            'name' => esc_attr__('Order', 'architronix'),
            'type' => 'select',
            'placeholder' => '-- Order --',
            'std'       => 'DESC',
            'options' => [
                'ASC' => esc_attr__('ASC', 'architronix'),
                'DESC' => esc_attr__('DESC', 'architronix'),
            ],
        ],
        [
            'id' => 'orderby',
            'name' => esc_attr__('Order By', 'architronix'),
            'type' => 'select',
            'multiple' => false,
            'placeholder' => '-- Orderby --',
            'std'       => 'date',
            'options' => [
                'none' => esc_attr__('No order', 'architronix'),
                'ID' => esc_attr__('Order by post id. Note the capitalization', 'architronix'),
                'title' => esc_attr__('Order by title', 'architronix'),
                'name' => esc_attr__('Order by post name (post slug)', 'architronix'),
                'date' => esc_attr__('Order by date', 'architronix'),
                'modified' => esc_attr__('Order by last modified date', 'architronix'),
                'parent' => esc_attr__('Order by post/page parent id', 'architronix'),
                'rand' => esc_attr__('Random order', 'architronix'),
                'menu_order' => esc_attr__('Menu Order', 'architronix'),
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