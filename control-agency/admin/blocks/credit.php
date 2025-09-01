<?php 
return [
    'title'       => 'Creative Collaborators',
    'id'          => 'credit',
    'icon'        => 'yes-alt',
    'description' => 'Give credits to your members who worked on your project. This section shows team memebers',
    'fields'      => [
        [
            'type' => 'hidden',
            'id'   => 'template',
            'name' => 'Template',
            'std'  => 'project/single/credit.php',
        ],
        [
            'name'    => 'Post Per Page',
            'id'      => 'posts_per_page',
            'desc'    => esc_attr__('How many team members do you want to show', 'architronix'),
            'type'    => 'number',
            'min'     => -1,
            'std'     => get_option('posts_per_page'),
        ],
        [
            'name'     => esc_attr__('Filter by team member name', 'architronix'),
            'id'       => 'post__in',
            'type'     => 'select_advanced',
            'desc'    => esc_attr__('Select team members to show specific members', 'architronix'),
            'options'  => array_column((array)get_posts(['post_type' => 'controlmember', 'posts_per_page' => -1]), 'post_title', 'ID'),
            'multiple' => true,
            'std'     => '',
            
        ],
    ],
];