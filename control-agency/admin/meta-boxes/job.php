<?php
$fields = [   
    [
        'name' => esc_attr__( 'Location', 'architronix' ),
        'id'   => 'location',
        'type' => 'text',
        'size' => 60, 
        'std' => 'USA, Cupertino',
        'placeholder' => 'e.g. Remote or custom region',
    ], 
    [
        'name' => esc_attr__( 'Experience label', 'architronix' ),
        'id'   => 'experience',
        'type' => 'text',
        'size' => 60, 
        'std' => 'Expert',
        'placeholder' => esc_attr__( 'e.g. Expert', 'architronix' ),
    ],
    [
        'name' => esc_attr__( 'Application Deadline', 'architronix' ),
        'id'   => 'application_deadline',
        'type' => 'date',
        'size' => 60, 
        'std' => (new DateTime('2024-07-31'))->modify('+4 weeks')->format('Y-m-d'),
        'placeholder' => esc_attr__( 'YYYY-MM-DD', 'architronix' ),
    ],
    [
        'name' => esc_attr__( 'Salary', 'architronix' ),
        'id'   => 'salary',
        'type' => 'text',
        'size' => 60, 
        'std' => esc_attr__( '{$75k-$135k/}Year', 'architronix' ),
        'placeholder' => esc_attr__( '{$75k-$135k/}Year', 'architronix' ),
        'desc' => sprintf(esc_attr__('Use %s to make text bold. e.g. {$75k-$135k/}Year', 'architronix'), '<code>{}</code>'),
    ], 
    [
        'name' => esc_attr__( 'Qualifications', 'architronix' ),
        'id'   => 'qualifications',
        'type' => 'textarea',
        'std' => 'MCA',
        'placeholder' => esc_attr__( 'Education or Skill requirements....', 'architronix' ),
    ],
      
    
];

$blocks = [
    [
        'title' => esc_attr__( 'Apply Now button', 'architronix' ),
        'id' => 'button',
        'preset' => true,                
        'admin_file' => 'blocks/element/button.php',
        'group_title' => '{#}. {title} : {style}',
        'std' => [
            [
                'title' => control_agency_post_type_option('read_more_text', esc_attr__( 'Apply', 'architronix' )),
                'url_type' => 'modal',
                'modal_title' => 'Application for [post_title]',
                'style' => 'primary',
                'icon' => false,
                'icon_position' => 'end',
            ]
        ]
    ],
    
];

return control_agency_add_my_block($fields, $blocks, true);