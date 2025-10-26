<?php 
return [
    'title'       => 'Related Projects',
    'id'          => 'related-projects',
    'icon'        => 'portfolio',
    'description' => 'Display related projects on space single page',
    'fields'      => [
        [
            'type' => 'hidden',
            'id'   => 'template',
            'name' => 'Template',
            'std'  => 'space/single/related-projects.php',
        ],
        [
            'name'    => 'Posts Per Page',
            'id'      => 'posts_per_page',
            'desc'    => esc_attr__('How many projects do you want to show', 'architronix'),
            'type'    => 'number',
            'min'     => -1,
            'std'     => 6,
        ],
        [
            'name'     => esc_attr__('Filter By Project', 'architronix'),
            'id'       => 'post__in',
            'type'     => 'select_advanced',
            'desc'     => esc_attr__('Select specific projects (leave empty to show related projects automatically)', 'architronix'),
            'options'  => array_column((array)get_posts(['post_type' => 'controlproject', 'posts_per_page' => -1]), 'post_title', 'ID'),
            'multiple' => true,
            'std'      => '',
        ],
        [
            'name'     => esc_attr__('Order By', 'architronix'),
            'id'       => 'orderby',
            'type'     => 'select',
            'desc'     => esc_attr__('Select order by', 'architronix'),
            'options'  => [
                'date'       => 'Date',
                'title'      => 'Title',
                'rand'       => 'Random',
                'menu_order' => 'Menu Order',
            ],
            'std'      => 'date',
        ],
        [
            'name'     => esc_attr__('Order', 'architronix'),
            'id'       => 'order',
            'type'     => 'select',
            'desc'     => esc_attr__('Select order', 'architronix'),
            'options'  => [
                'DESC' => 'Descending',
                'ASC'  => 'Ascending',
            ],
            'std'      => 'DESC',
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

