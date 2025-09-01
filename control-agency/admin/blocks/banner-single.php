<?php 
return control_agency_config_my_block([
    'title'           => 'Banner single',
    'id'              => 'banner-single',
    'disable_block'   => true,
    'icon'            => 'cover-image',    
    'description'     => 'Display name, title, shot description & button',    
    'fields'          => [
        [
            
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Banner style',
            'std' => 'global/banner.php',           
        ],   
        [
            'id'   => 'image',
            'name' => 'Image',
            'type' => 'single_image',
            'std'  =>'',
            'desc'  =>'Use for the element',
        ], 
        [
            'name'        => esc_attr__('Name', 'architronix'),
            'id'          => 'name',
            'type'        => 'text',
            'std'         => '',
            'size' => 60,         
            'placeholder' => esc_attr__('Enter name...',   'architronix'),   
            'typography' => true      
        ],    
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'desc'        => sprintf(esc_attr__('Type your title here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_title]</code>', '<strong>Post title</strong>'),
            'type'        => 'text',
            'std'         => '',
            'size' => 60,         
            'placeholder' => esc_attr__('Enter title...',   'architronix'),  
            'typography' => true       
        ],
        [
            'name'        => esc_attr__('Subtitle', 'architronix'),
            'id'          => 'subtitle',
            'desc'        => esc_attr__('Type Subtitle', 'architronix'),
            'type'        => 'textarea',
            'std'         => '',
            'placeholder' => esc_attr__('Subtitle...',   'architronix'),   
            'desc'        => sprintf(esc_attr__('Type your title here. use %s to display post title. Leave blank to display %s', 'architronix'), '<code>[post_excerpt]</code>', '<strong>Post excerpt</strong>'),
            'typography' => true 
        ],

    ],
]);