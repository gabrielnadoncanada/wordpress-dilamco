<?php 
$args = [
    'title'           => 'Post Content',
    'id'              => 'editor-content',
    'disable_block'   => true,
    'icon'            => 'text',
    'description'     => 'Display name, title, short description & button',    
    'fields'          => [
        [
            
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'global/content.php'
        ],  
        [
            'name'        => esc_attr__('Title', 'architronix'),
            'id'          => 'title',
            'type'        => 'text',
            'std'         => '',
            'size' => 60,         
            'placeholder' => esc_attr__('Enter title...',   'architronix'),         
        ],
        [
            'name'        => esc_attr__('Content', 'architronix'),
            'type'        => 'custom_html',
            'desc'         => 'Editor content will be displayed',
        ],
        
        
    ],
];


// Merged member fields
$member_fields = control_agency_include_admin_file('meta-boxes/member-overviews.php');
$args['fields'] = array_merge($args['fields'], $member_fields);

// Service Fields
$service_fields = control_agency_include_admin_file('meta-boxes/service-overviews.php');
$args['fields'] = array_merge($args['fields'], $service_fields);

// Service Fields
$job_fields = control_agency_include_admin_file('meta-boxes/job-overviews.php');
$args['fields'] = array_merge($args['fields'], $job_fields);

// Project gallery
$blocks = control_agency_include_admin_file('meta-boxes/project-gallery.php');
//$blocks = array_merge($blocks, control_agency_include_admin_file('meta-boxes/space-gallery.php'));

return control_agency_config_my_block($args, $blocks);