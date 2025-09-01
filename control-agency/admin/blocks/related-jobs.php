<?php 
return [
    'title'       => 'Other Jobs',
    'id'          => 'related-jobs',
    'icon'        => 'rest-api',
    'description' => 'Give credits to your members who worked on your project. This section shows team memebers',
    'fields'      => [
        [
            'type' => 'hidden',
            'id'   => 'template',
            'name' => 'Template',
            'std'  => 'project/single/related-jobs.php',
        ],
        [
            'name'    => 'Post Per Page',
            'id'      => 'posts_per_page',
            'desc'    => esc_attr__('How many jobs do you want to show', 'architronix'),
            'type'    => 'number',
            'min'     => -1,
            'std'     => get_option('posts_per_page'),
        ],
        [
            'name'     => esc_attr__('Filter By Job Title', 'architronix'),
            'id'       => 'post__in',
            'type'     => 'select_advanced',
            'desc'    => esc_attr__('Select specific jobs', 'architronix'),
            'options'  => array_column((array)get_posts(['post_type' => 'controljob', 'posts_per_page' => -1]), 'post_title', 'ID'),
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