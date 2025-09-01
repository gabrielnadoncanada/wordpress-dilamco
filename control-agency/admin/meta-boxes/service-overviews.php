<?php
$fields = [
    [
        'name'        => esc_attr__('Sidebar title', 'architronix'),
        'id'          => 'sidebar_title',
        'type'        => 'text',
        'std'         => esc_attr__('All Services', 'architronix'),
        'size' => 60,      
        'visible' => ['template', '=', 'service/single/content.php'],   
    ],
    [    
        'name' => esc_attr__('What we offer', 'architronix'),
        'desc' => esc_attr__('This section displayed service offers', 'architronix'),
        'title_std' => esc_attr__('What\'s Included', 'architronix'),
        'group_id' => 'offers', 
        'group_name' => esc_attr__('Offers', 'architronix'),
        'visible' => ['template', '=', 'service/single/content.php'],
        'admin_file' => 'blocks/element/simple-group.php',
        'group_std' => [
            [
                'title' => esc_attr__('Personalized Color Schemes:', 'architronix'),
                'desc' => 'Tailored color palettes crafted to complement your style, preferences, and the unique characteristics of your space.',
            ],
            [
                'title' => esc_attr__('Expert Advice:', 'architronix'),
                'desc' => 'Consultation with our experienced color specialists who provide insights into the psychological and aesthetic aspects of color selection.',
            ],
            [
                'title' => esc_attr__('Space Analysis:', 'architronix'),
                'desc' => 'In-depth analysis of your space, considering lighting, architecture, and existing elements to ensure cohesive and harmonious color choices. ',
            ],
            [
                'title' => esc_attr__('Material Coordination:', 'architronix'),
                'desc' => 'Guidance on coordinating colors with existing materials, furniture, and decor elements to achieve a unified and polished look.',
            ],
            [
                'title' => esc_attr__('Trend Integration:', 'architronix'),
                'desc' => 'Incorporation of current design trends while ensuring a timeless and enduring appeal.',
            ]           
        ]
    ],
    [    
        'name' => esc_attr__('How It Works', 'architronix'),
        'desc' => esc_attr__('This section displayed how service works', 'architronix'),
        'title_std' => esc_attr__('How It Works', 'architronix'),
        'group_id' => 'work_steps', 
        'group_name' => esc_attr__('Steps', 'architronix'),
        'visible' => ['template', '=', 'service/single/content.php'],
        'admin_file' => 'blocks/element/simple-group.php',
        'group_std' => [
            [
                'title' => esc_attr__('Consultation Request:', 'architronix'),
                'desc' => 'Reach out to our team and express your interest in a Color Consultation. ',
            ],
            [
                'title' => esc_attr__('Initial Discussion:', 'architronix'),
                'desc' => 'A preliminary discussion to understand your goals, preferences, and any specific challenges you\'re facing with your space.',
            ],
            [
                'title' => esc_attr__('On-Site or Virtual Consultation:', 'architronix'),
                'desc' => 'Depending on your location and preference, we offer on-site or virtual consultations to assess your space.',
            ],
            [
                'title' => esc_attr__('Personalized Color Plan:', 'architronix'),
                'desc' => 'Our consultants develop a personalized color plan with detailed recommendations and visual representations.',
            ],
            [
                'title' => esc_attr__('Follow-Up Support:', 'architronix'),
                'desc' => 'Continued support for any questions or additional guidance you may need during the implementation phase.',
            ]           
        ]
    ],
    [
        'name'        => esc_attr__('Footer desc', 'architronix'),
        'id'          => 'desc',
        'type'        => 'textarea',
        'std'         => 'Enhance your surroundings with the transformative impact of carefully chosen colors. Let Architronix bring your vision to life through our service \'[post_title]\'.',
        'visible' => ['template', '=', 'service/single/content.php'],
        'size' => 60,         
        'placeholder' => esc_attr__('Enter description...',   'architronix'),         
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

$blocks = [ 
    [
        'title' => 'Sidebar Buttons',
        'id' => 'buttons',
        'preset' => false,                
        'admin_file' => 'blocks/element/button.php',
        'visible' => ['template', '=', 'service/single/content.php'],
        'group_title' => '{#}. {title} : {style}',
        'add_button' => '+ Button',
        'std' => [
            [
                'title' => 'Schedule a Call',
                'url_type' => 'modal',
                'modal_title' => 'Sheadule Call for [post_title]',
                'modal_content' => 'Contact form Shortcode goes here...',
                'style' => 'primary',
                'icon' => true,
                'icon_position' => 'end',
                'css_class' => 'w-100'
            ]
        ]
    ],
    
];

return control_agency_add_my_block($fields, $blocks, 'sidebar_title');