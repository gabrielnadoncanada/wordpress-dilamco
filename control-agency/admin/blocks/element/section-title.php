<?php 
$block = [
    'title'           => esc_attr__('Section Title', 'architronix'),
    'id'              => 'section-title',
    'icon'            => 'editor-paste-text',
    'description'     => 'Provide an appropriate title and brief overview for the section',
    'fields'          => [
        [
            'name'  => 'Style',
            'type' => 'select',
            'id' => 'template',
            'std' => 'global/section-title-1.php',
            'options' => [
               'global/section-title-1.php' =>  esc_attr__('Default', 'architronix'),
               'global/section-title-2.php' =>  esc_attr__('Style 2', 'architronix'),
            ],
            'admin_label' => true
        ],
        
        [
            'name'        => esc_attr__('Name', 'architronix'),
            'id'          => 'name',
            'desc'        => esc_attr__('Type your section title here which will move on scrolling', 'architronix'),
            'type'        => 'text',
            'std'        => esc_attr__('About Us', 'architronix'),
            'placeholder' => esc_attr__('Name',   'architronix'),  
            'size'        => 40,
            'typography'  => true,   
            'admin_label' => true     
        ],  
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'type'        => 'textarea',
            'std'         => esc_attr__('Drop Us a Line', 'architronix'),
            'desc'        => sprintf(esc_attr__('Type your title here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<code>Post title</code>'),
            'size'        => 60,
            'typography'  => true,
            'admin_label' => true 
        ],        
        [
            'name'        => esc_attr__('Subtitle', 'architronix'),
            'id'          => 'subtitle',
            'desc'        => esc_attr__('Write short description for the section', 'architronix'),
            'type'        => 'textarea',
            'std'        => esc_attr__('Crafting Architectural Designing and Masterpieces Interior Wonders', 'architronix'),
            'placeholder' => esc_attr__('Short Description', 'architronix'),   
            'typography'  => true        
        ], 
        
    ],
];

return control_agency_config_my_block($block);