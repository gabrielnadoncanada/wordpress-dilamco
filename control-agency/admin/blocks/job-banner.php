<?php 
return [
    'title'           => 'Job Banner',
    'id'              => 'job-banner',
    'icon'            => 'pressthis',
    'description'     => 'Display job banner',
    'fields'          => [
        [            
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'job/single/banner.php',            
        ],
        [
            'type' => 'text',
            'id'   => 'title',
            'name' => esc_attr__('Title', 'architronix'),
            'std'  => '[post_title]'
        ],
        [
            'type' => 'text',
            'id'   => 'location',
            'name' => esc_attr__('Location', 'architronix'),
            'std'  => 'USA,California'    
        ],  
        [
            'type' => 'text',
            'id'   => 'deadline_label',
            'name' => esc_attr__('Application Deadline Label', 'architronix'),
            'std'  => 'Apply before:',
        ],  
        [
            'type' => 'text',
            'id'   => 'deadline',
            'name' => esc_attr__('Application Deadline', 'architronix'),
            'std'  => '28 Feb 2024',
        ],  [
            'type' => 'text',
            'id'   => 'salary_range_label',
            'name' => esc_attr__('Experience', 'architronix'),
            'std'  => 'Expert',
        ],
        [
            'type' => 'text',
            'id'   => 'salary_range',
            'name' => esc_attr__('Salary Range', 'architronix'),
            'desc'        => esc_attr__('Text in {} will be bold', 'architronix'),
            'std'  => '{$45k - $60k /}year',
        ],
        [
            'name'        => esc_attr__('Button Text', 'architronix'),
            'id'          => 'button_text',
            'desc'        => esc_attr__('Enter Button Text', 'architronix'),
            'type'        => 'text',
            'std'         => 'Apply Now',
            'placeholder' => esc_attr__('Button Text', 'architronix'),
            
        ],
         
        [
            'name'        => esc_attr__('Button URL', 'architronix'),
            'id'          => 'button_url',
            'desc'        => esc_attr__('URL for the button', 'architronix'),
            'type'        => 'text',
            'std'         => '#',
            'placeholder' => esc_attr__('Enter button URL here', 'architronix'), 
                     
        ],
               
    ],
];