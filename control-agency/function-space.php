<?php 
add_filter('control_agency_post_type_space_args', function($defaults){
    $labels = [
        'singular_name' => esc_attr__( 'Space', 'architronix' ),
    ];
    $labels = wp_parse_args($labels, $defaults['labels']);
    $args = [
        'labels' => $labels,
        'description' => esc_attr__( 'Exploring the Beauty of Our Architectural Spaces', 'architronix' ),
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_space_fields_std', $args);
});

add_filter('control_agency_settings_space_fields_std', function($defaults){
    $prefix = 'controlspace_';
    $args = [
        $prefix.'archive_page_title' => esc_attr__( 'A Journey Through Our Designed Spaces', 'architronix' ),
        $prefix.'archive_page_desc' => esc_attr__( 'Exploring the Beauty of Our Architectural Spaces', 'architronix' ),
        $prefix.'read_more_text' => esc_attr__( 'View Space', 'architronix' ),
        $prefix.'single_page_slug' => 'space',
        $prefix.'archive_query' => [
            'posts_per_page' => 4
        ],
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_space_fields_std', $args);
});

add_filter('control_agency_get_space_blocks_std', function () {
    return [
        [
            'name' => 'Space Overview',
            'template' => 'space-overview',
        ],
        [
            'name' => 'Content & Media',
            'template' => 'editor-content',
        ],
        [
            'name' => 'Collaborators & Credits',
            'template' => 'collaborators',
        ],
        [
            'name' => 'Related Projects',
            'template' => 'related-projects',
        ],
        [
            'name' => 'Call to action',
            'template' => 'call-to-action',
        ],
        
    ];
});

add_filter('control_agency_space_space_overview_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'space/single/overview.php',
        'title' => '[post_title]',
        'subtitle' => 'This architectural space combines functionality with aesthetic appeal, creating an environment that enhances the user experience.',
        'overview_title' => 'Innovative Architectural Space' ,
      
    ]);
    return $defaults;
});


add_filter('control_agency_space_editor_content_std', function ($defaults) {    
    $args = [
        'template' => 'space/single/content.php',
        'title' => 'Let introduce you more about \'[post_title]\'',
        'gallery' => [
            [
                'template' => 'space/single/media-isotope.php',
                'gallery_desc' => '\'[post_title]\' gallery description. e.g. This architectural space seamlessly blends form and function, featuring innovative design elements that create a harmonious environment. The careful attention to lighting, materials, and spatial flow results in a truly exceptional experience.',
            ],
            [
                'template' => 'space/single/media-carousel.php',
                'gallery_desc' => '\'[post_title]\' gallery description. e.g. This architectural space seamlessly blends form and function, featuring innovative design elements that create a harmonious environment. The careful attention to lighting, materials, and spatial flow results in a truly exceptional experience.',
            ],
            [
                'template' => 'space/single/media-slider.php',
                'gallery_desc' => '\'[post_title]\' gallery description. e.g. This architectural space seamlessly blends form and function, featuring innovative design elements that create a harmonious environment. The careful attention to lighting, materials, and spatial flow results in a truly exceptional experience.',
            ],
        ]

    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_space_editor_content_std', $args);
});

add_filter('control_agency_space_collaborators_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'space/single/collaborators.php',
        'name' => 'Credits',
        'name_color' => 'primary',
        'name_size' => 'display-1',
        'title' => 'Creative Collaborators',
        'subtitle' => 'The Talented Team Behind \'[post_title]\'',
    ]);
    return $defaults;
});

add_filter('control_agency_space_related_projects_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'space/single/related-projects.php',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    return $defaults;
});

add_filter('control_agency_space_call_to_action_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'cta_text' => [
            [
                'template' => 'global/section-title-2.php',
                'title' => 'Drop us a Line'
            ]
            ],
            'button' => [
            [
                'title' => 'Book a Call',
                'url_type' => 'modal',
                'modal_title' => 'Book a Call',
                'modal_content' => 'Contact form Shortcode goes here...',
                'icon' => true,
                'icon_position' => 'end',
                'style' => 'secondary',
            ]
        ]
    ]);
    return $defaults;
});
