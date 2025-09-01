<?php
add_filter('control_agency_settings_job_fields_std', function($defaults){
    $prefix = 'controljob_';
    $args = [
        $prefix.'archive_page_title' => esc_attr__( 'Career Opportunities', 'architronix' ),
        $prefix.'archive_page_desc' => esc_attr__( 'Discover Your Future at Architronix: Where Innovation Meets Passion', 'architronix' ),
        $prefix.'read_more_text' => esc_attr__( 'Apply', 'architronix' ),
        $prefix.'archive_query' => [
            'posts_per_page' => 10,
        ],
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_job_fields_std', $args);
});

add_filter('control_agency_get_job_blocks_std', function () {
    return [ 
        [
            'name' => 'Job Banner',
            'template' => 'banner-single',
        ],       
        [
            'name' => 'Job Details',
            'template' => 'editor-content',
        ],
        [
            'name' => 'Call to action',
            'template' => 'call-to-action',
        ],
    ];
});


add_filter('control_agency_job_banner_single_std', function ($defaults) {
    $args = [
        'template' => 'job/single/banner.php',
        'name' => esc_attr(''),
        'title' => '[job_title]',
        'subtitle' => '[post_excerpt]',
        'name_size' => 'display-1',
        'name_color' => 'primary',
    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_job_banner_single_std', $args);
});


add_filter('control_agency_job_editor_content_std', function ($defaults) {
    $args = [
        'template' => 'job/single/content.php',
        'title' => 'Job Description',

    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_job_editor_content_std', $args);
});

add_filter('control_agency_job_call_to_action_std', function ($defaults) {
    $args = [
        'cta_text' => [
            [
                'template' => 'global/section-title-2.php',
                'title' => 'Drop us a Line'
            ]
            ],
            'button' => [
            [
                'title' => 'Contact us',
                'url_type' => 'modal',
                'modal_title' => 'Request Call for [post_title]',
                'modal_content' => 'Contact form Shortcode goes here...',
                'icon' => true,
                'icon_position' => 'end',
                'style' => 'secondary',
                'css_class' => ''
            ]
        ]
    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_job_call_to_action_std', $args);
});