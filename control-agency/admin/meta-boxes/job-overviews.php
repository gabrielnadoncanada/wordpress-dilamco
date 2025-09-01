<?php
$fields = [
    [    
        'name' => esc_attr__('Job Overview', 'architronix'),
        'desc' => esc_attr__('This section displayed job overviews', 'architronix'),
        'title_std' => esc_attr__('Job Overview', 'architronix'),
        'group_id' => 'job_overviews', 
        'group_name' => esc_attr__('Job Overviews', 'architronix'),
        'group_title' => '{title} {desc}',
        'visible' => ['template', '=', 'job/single/content.php'],
        'admin_file' => 'blocks/element/simple-group.php',
        'sort_desc' => true,
        'group_std' => [
            [
                'title' => esc_attr__('Employment type:', 'architronix'),
                'desc' => '[job_types]',
            ],
            [
                'title' => esc_attr__('Location:', 'architronix'),
                'desc' => '[job_location]',
            ],
            [
                'title' => esc_attr__('Experience:', 'architronix'),
                'desc' => '[job_experience]',
            ],
            [
                'title' => esc_attr__('Qualifications:', 'architronix'),
                'desc' => '[job_qualifications]',
            ],
            [
                'title' => esc_attr__('Salary Range:', 'architronix'),
                'desc' => '[job_salary]',
            ],
            [
                'title' => esc_attr__('Date posted:', 'architronix'),
                'desc' => '[job_posted]',
            ],
            [
                'title' => esc_attr__('Expiration date:', 'architronix'),
                'desc' => '[application_deadline]',
            ]           
        ]
    ],
    [
        'name'        => esc_attr__('Others job title', 'architronix'),
        'id'          => 'other_jobs_title',
        'type'        => 'text',
        'std'         => esc_attr__('Other Jobs', 'architronix'),
        'size' => 60,      
        'visible' => ['template', '=', 'job/single/content.php'],   
    ],
];

$new_fields = [];
foreach ($fields as $key => $field) {
    if(!empty($field['admin_file'])){
        $field = control_agency_include_admin_file($field['admin_file'], $field);
        $new_fields = array_merge($new_fields, $field);
    }else{
        $new_fields[] = $field;
    }
}

if(!empty($new_fields)){
    $fields = $new_fields;
}



return control_agency_add_my_block($fields);