<?php
add_filter('control_agency_settings_service_fields_std', function($defaults){
    $prefix = 'controlservice_';
    $args = [
        $prefix.'archive_page_title' => esc_attr__( 'Explore Our Design Offerings', 'architronix' ),
        $prefix.'archive_page_desc' => esc_attr__( 'Exploring Excellence in Every Meticulous Design Detail', 'architronix' ),
        $prefix.'read_more_text' => esc_attr__( 'Learn more', 'architronix' ),
        $prefix.'archive_query' => [
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
        ],
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_service_fields_std', $args);
});

add_filter('control_agency_get_service_blocks_std', function () {
    return [
        [
            'name' => 'Service banner',
            'template' => 'banner-single',
        ],
        [
            'name' => 'Service Content',
            'template' => 'editor-content',
        ],
        [
            'name' => 'Call to action',
            'template' => 'call-to-action',
        ],
    ];
});


add_filter('control_agency_service_banner_single_std', function ($defaults) {
    $args = [
        'template' => 'service/single/banner.php',
        'name' => esc_attr__('Services', 'architronix'),
        'title' => '[post_title]',
        'subtitle' => '[post_excerpt]',
        'name_size' => 'display-1',
        'name_color' => 'primary',
    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_service_banner_single_std', $args);
});


add_filter('control_agency_service_editor_content_std', function ($defaults) {
    $args = [
        'template' => 'service/single/content.php',
        'title' => 'Overview',

    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_service_editor_content_std', $args);
});

add_filter('control_agency_service_call_to_action_std', function ($defaults) {
    $args = [
        'cta_text' => [
            [
                'template' => 'global/section-title-2.php',
                'title' => 'Request a Call'
            ]
            ],
            'button' => [
            [
                'title' => 'Let\'s Talk',
                'url_type' => 'modal',
                'modal_title' => 'Request Call for [post_title]',
                'modal_content' => 'Contact form Shortcode goes here...',
                'icon' => true,
                'icon_position' => 'end',
                'style' => 'secondary',
                'css_class' => 'w-100'
            ]
        ]
    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_service_call_to_action_std', $args);
});