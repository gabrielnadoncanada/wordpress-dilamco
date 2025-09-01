<?php
$fields = [
    [    
        'name' => esc_attr__('Area of Expertise', 'architronix'),
        'desc' => esc_attr__('This section displayed member Expertise and Specializations', 'architronix'),
        'title_std' => esc_attr__('Expertise and Specializations:', 'architronix'),
        'group_id' => 'expertises', 
        'group_name' => esc_attr__('Expertises', 'architronix'),
        'admin_file' => 'blocks/element/simple-group.php',
        'visible'  => ['template', '=', 'member/single/content.php'],
        'group_std' => [
            [
                'title' => esc_attr__('Architectural Focus:', 'architronix'),
                'desc' => '[post_title] specializes in residential, commercial a outdoor design.',
            ],
            [
                'title' => esc_attr__('Specializations:', 'architronix'),
                'desc' => 'My expertise lies in creating a timeless interiors that seamlessly blend luxury and functionality.',
            ]        
        ]
    ],
    [    
        'name' => esc_attr__('Philosophy', 'architronix'),
        'desc' => esc_attr__('This section displayed member Philosophy Specializations', 'architronix'),
        'title_std' => esc_attr__('Design Philosophy:', 'architronix'),
        'group_id' => 'philosophy', 
        'group_name' => esc_attr__('Philosophies', 'architronix'),
        'admin_file' => 'blocks/element/simple-group.php',
        'visible'  => ['template', '=', 'member/single/content.php'],
        'group_std' => [
            [
                'title' => esc_attr__('Philosophy Overview:', 'architronix'),
                'desc' => '[post_title]\'s design philosop Architronix revolves around capturing the essence of each client\'s persionality and translating it into a space that feels uniquely theirs.',
            ],
            [
                'title' => esc_attr__('Client-Centric Approach:', 'architronix'),
                'desc' => 'Through close collaboration, Russell ensures that a every design reflects the client\'s vision and exceeds expectations.',
            ]        
        ]
    ],
    [    
        'name' => esc_attr__('Education and Credentials', 'architronix'),
        'desc' => esc_attr__('This section displayed member Education and Credentials', 'architronix'),
        'title_std' => esc_attr__('Education and Credentials:', 'architronix'),
        'group_id' => 'education', 
        'group_name' => esc_attr__('Education', 'architronix'),
        'admin_file' => 'blocks/element/simple-group.php',
        'visible'  => ['template', '=', 'member/single/content.php'],
        'group_std' => [
            [
                'title' => esc_attr__('Educational Background:', 'architronix'),
                'desc' => '[post_title] holds a Master\'s in Interior of the Design from Architronix University of Belgium.',
            ],
            [
                'title' => esc_attr__('Professional Credentials:', 'architronix'),
                'desc' => 'Recognized as an the industry leader, Russell is a member of the National Interior Design for Association (NIDA) and has received accolades for his innovative designs.',
            ]        
        ]
    ],
    [    
        'name' => esc_attr__('Achivements', 'architronix'),
        'desc' => esc_attr__('This section displayed member Awards and Recognition', 'architronix'),
        'title_std' => esc_attr__('Awards and Recognition:', 'architronix'),
        'group_id' => 'awards', 
        'group_name' => esc_attr__('Awards', 'architronix'),
        'admin_file' => 'blocks/element/simple-group.php',
        'visible'  => ['template', '=', 'member/single/content.php'],
        'group_std' => [
            [
                'title' => esc_attr__('Achievements:', 'architronix'),
                'desc' => '[post_title]\'s work at Architronix has been feeatured in Design Excellence Magazine, earning him the Interior Alchemist title.',
            ]        
        ]
    ]
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

return $fields;