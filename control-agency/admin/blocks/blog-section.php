<?php 
return [
    'title'           => esc_attr__('Blog', 'architronix'),
    'id'              => 'blog-section',
    'icon'            => 'admin-post',
    'description'     => 'This section will show your recent or selected posts with slider',     
    'fields'          => [
        [
            'type' => 'hidden',
            'id' => 'template',
            'std' => 'blocks/blog-section.php'
        ],
        [
            'name'      => 'Post Per Page',
            'id'        => 'posts_per_page',
            'desc'        => esc_attr__('Enter the number how much posts you want to show here', 'architronix'),
            'type'      => 'number',
            'min'       => -1,
            'std'       => get_option('posts_per_page')
        ],
        [
            'name'      => 'Post ID\'s',
            'id'        => 'post__in',
            'desc'        => esc_attr__('Give post id\'s to show specific posts. Multiple Id\'s are comma separated.', 'architronix'),
            'type'      => 'text',
            'std'       => ''
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