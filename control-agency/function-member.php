<?php 
add_filter('control_agency_post_type_member_args', function($defaults){
    $labels = [
        'singular_name' => esc_attr__( 'Architect', 'architronix' ),
    ];
    $labels = wp_parse_args($labels, $defaults['labels']);
    $args = [
        'labels' => $labels,
        'description' => esc_attr__( 'Where Imagination Takes Flight, and Excellence Blossoms', 'architronix' ),
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_member_fields_std', $args);
});
add_filter('control_agency_settings_member_fields_std', function($defaults){
    $prefix = 'controlmember_';
    $args = [
        $prefix.'archive_page_title' => esc_attr__( 'Architects of Architronix', 'architronix' ),
        $prefix.'archive_page_desc' => esc_attr__( 'Where Imagination Takes Flight, and Excellence Blossoms', 'architronix' ),
        $prefix.'read_more_text' => esc_attr__( 'Know more', 'architronix' ),
        $prefix.'single_page_slug' => 'member',
        $prefix.'archive_query' => [
            'posts_per_page' => 12,
            'orderby' => 'menu_order, date'
        ],
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_member_fields_std', $args);
});

add_filter('control_agency_get_member_blocks_std', function () {
    return [               
        [
            'name' => 'Member Content',
            'template' => 'editor-content',
        ],
        [
            'name' => 'Portfolio Showcase',
            'template' => 'portfolio-showcase',
        ],
        [
            'name' => 'Call to Action',
            'template' => 'call-to-action',
        ],
    ];
});


add_filter('control_agency_member_editor_content_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'member/single/content.php',
        'title' => ''
    ]);
    return $defaults;
});

add_filter('control_agency_member_portfolio_showcase_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'member/single/portfolio-showcase.php',
        'title' => 'Portfolio Showcase:',

    ]);
    return $defaults;
});


add_filter('control_agency_member_call_to_action_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'cta_text' => [
            [
                'template' => 'global/section-title-2.php',
                'title' => 'Drop me a Line'
            ]
            ],
            'button' => [
            [
                'title' => 'Request a Call',
                'url_type' => 'modal',
                'modal_title' => 'Request a Call to [post_title]',
                'modal_content' => 'Contact form Shortcode goes here...',
                'icon' => true,
                'icon_position' => 'end',
                'style' => 'secondary',
            ]
        ]
    ]);
    return $defaults;
});