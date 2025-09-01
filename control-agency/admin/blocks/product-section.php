<?php 
return [
    'title'           => esc_attr__( 'Product Section', 'architronix' ),
    'id'              => 'product-section',
    'icon'            => 'cart',
    'description'     => 'Display your products',   
    'fields'          => [
        [
            'id'              => 'template_file',
            'type'            => 'hidden',
            'std'             => 'blocks/product-section.php',
        ],
        [
            'name'    => 'Post Per Page',
            'id'      => 'posts_per_page',
            'desc'    => esc_attr__('How many products do you want to show', 'architronix'),
            'type'    => 'number',
            'min'     => -1,
            'max'     => 8,
            'std'     => get_option('posts_per_page'),
        ],
        [
            'name'     => esc_attr__('Filter By Product Name', 'architronix'),
            'id'       => 'post__in',
            'type'     => 'select_advanced',
            'desc'    => esc_attr__('Select specific products', 'architronix'),
            'options'  => array_column((array)get_posts(['post_type' => 'product', 'posts_per_page' => -1]), 'post_title', 'ID'),
            'multiple' => true,
            'std'     => '',
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