<?php 
return [
    'title'           => esc_attr__('Project Showcase', 'architronix'),
    'id'              => 'project-showcase',
    'icon'            => 'sos',
    'description'     => 'Show your creative projects to the visitorss',    
    'fields'          => [
        [
            'type' => 'select',
            'id' => 'template_file',
            'name' => 'Select Showcase Style',
            'std' => 'blocks/project-showcase.php',
            'options' => [
                'blocks/project-showcase.php' => 'Gallery',
                'blocks/project-showcase-2.php' => 'Slider',
            ] 
        ],
        [
            'name'    => 'Post Per Page',
            'id'      => 'posts_per_page',
            'desc'    => esc_attr__('How many projects do you want to show', 'architronix'),
            'type'    => 'number',
            'min'     => -1,
            'max'     => 5,
            'std'     => get_option('posts_per_page'),
        ],
        [
            'name'     => esc_attr__('Filter By Project Title', 'architronix'),
            'id'       => 'post__in',
            'type'     => 'select_advanced',
            'desc'    => esc_attr__('Select specific projects', 'architronix'),
            'options'  => array_column((array)get_posts(['post_type' => 'controlproject', 'posts_per_page' => -1]), 'post_title', 'ID'),
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