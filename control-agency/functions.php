<?php
add_filter('control_agency_social_share_args', function($defaults){
    $args = [
        'social_share_title' => get_theme_mod('social_share_title', __('Share on:', 'architronix')),
        'social_share_icons' => get_theme_mod('social_share_icons', ''),
        'social_share_shortcode' => '',
            'icons' => [
                [
                    'id' => 'linkedin', 
                    'label' => 'IN', 
                    'title' => 'Linkedin', 
                    'class' => 'icon-linkedin',
                    'url' => add_query_arg(['url' => get_permalink(), 'title' => get_the_title(),'summary' => get_the_excerpt(),  'source' => get_bloginfo('name')], 'https://www.linkedin.com/shareArticle')
                ],
                [
                    'id' => 'pinterest', 
                    'title' => 'Pinterest', 
                    'label' => 'PI', 
                    'class' => 'icon-pinterest',
                    'url' => add_query_arg(['url' => get_permalink(), 'description' => get_the_title()], 'https://pinterest.com/pin/create/button')
                ],
                [
                    'id' => 'facebook', 
                    'title' => 'Facebook', 
                    'label' => 'FB', 
                    'class' => 'icon-facebook',
                    'url' => add_query_arg('u', get_permalink(), 'http://www.facebook.com/sharer/sharer.php')
                ],              
                
                [
                    'id' => 'twitter', 
                    'title' => 'Twitter', 
                    'label' => 'TW', 
                    'class' => 'icon-twitter',
                    'url' => add_query_arg(['url' => get_permalink(), 'text' => get_the_title(), 'hashtags' => str_replace([' ', '<br />'], '',wp_strip_all_tags(control_agency_get_terms(['separator'=> ',', 'taxonomy' => 'category', 'disable_links' => true ], false)))], 'https://twitter.com/intent/tweet')
				],				
            ]
    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_project_social_share_args', $args);
});


add_filter('control_agency_element_category_title', function(){
    return 'Architronix';
});

add_filter('control_agency_settings_menu_title', function(){
    return esc_attr__('Post type settings', 'architronix');
});

add_filter('control_agency_settings_page_title', function(){
    return esc_attr__('Architronix Post types', 'architronix');
});


include __DIR__ . '/function-service.php';
include __DIR__ . '/function-project.php';
include __DIR__ . '/function-member.php';
include __DIR__ . '/function-job.php';