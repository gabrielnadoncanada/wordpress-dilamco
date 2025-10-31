<?php 
add_filter('control_agency_post_type_project_args', function($defaults){
    $labels = [
        'singular_name' => esc_attr__( 'Project', 'architronix' ),
    ];
    $labels = wp_parse_args($labels, $defaults['labels']);
    $args = [
        'labels' => $labels,
        'description' => esc_attr__( 'Exploring the Tapestry of Our Design Legacy', 'architronix' ),
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_project_fields_std', $args);
});
add_filter('control_agency_settings_project_fields_std', function($defaults){
    $prefix = 'controlproject_';
    $args = [
        $prefix.'archive_page_title' => esc_attr__( 'A Journey Through Our Past Projects', 'architronix' ),
        $prefix.'archive_page_desc' => esc_attr__( 'Exploring the Tapestry of Our Design Legacy', 'architronix' ),
        $prefix.'read_more_text' => esc_attr__( 'View Project', 'architronix' ),
        $prefix.'single_page_slug' => 'project',
        $prefix.'archive_query' => [
            'posts_per_page' => 4
        ],
    ];
    $args = wp_parse_args($args, $defaults);
     
    return apply_filters('architronix_settings_project_fields_std', $args);
});

add_filter('control_agency_get_project_blocks_std', function () {
    return [
        [
            'name' => 'Project Overview',
            'template' => 'project-overview',
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
            'name' => 'Call to action',
            'template' => 'call-to-action',
        ],
        
    ];
});

add_filter('control_agency_project_project_overview_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'project/single/overview.php',
        'title' => '[post_title]',
        'subtitle' => 'The structural system is composed of pillars and beams with the same section, connected by a metallic cube that works as a structural node.',
        'overview_title' => 'Elegant Urban Oasis' ,
      
    ]);
    return $defaults;
});


add_filter('control_agency_project_editor_content_std', function ($defaults) {
    $args = [
        'template' => 'project/single/content.php',
        'title' => 'Let introduce you more about \'[post_title]\'',
        'gallery' => [
            [
                'template' => 'project/single/media-isotope.php',
                'gallery_desc' => '\'[post_title]\' gallery description. e.g. The structural system is composed of pillars and beams with the same section, connected by a metallic cube that works as a structural node. When combined, they can result in different configurations of layouts and attend several programs within a limit of up to three floors, either in a flat or sloped terrain.',
            ],
        ]

    ];
    $args = wp_parse_args($args, $defaults);
    return apply_filters('architronix_project_editor_content_std', $args);
});

add_filter('control_agency_project_collaborators_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'project/single/collaborators.php',
        'name' => 'Credits',
        'name_color' => 'primary',
        'name_size' => 'display-1',
        'title' => 'Creative Collaborators',
        'subtitle' => 'The Talented Team Behind \'[post_title]\'',
    ]);
    return $defaults;
});

add_filter('control_agency_project_call_to_action_std', function ($defaults) {
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

/**
 * Rediriger les projets sans is_case_study vers l'archive
 * Les projets qui ne sont pas des case studies ne doivent pas avoir de page single
 */
add_action('template_redirect', function() {
    if (is_singular('controlproject')) {
        $is_case_study = get_field('is_case_study', get_the_ID());
        
        if (!$is_case_study) {
            // Rediriger vers la page d'archive des projets
            wp_redirect(get_post_type_archive_link('controlproject'), 301);
            exit;
        }
    }
});

/**
 * Désactiver l'indexation SEO pour les projets sans is_case_study
 * Compatible avec Yoast SEO et Rank Math
 */
add_filter('wpseo_robots', function($robots) {
    if (is_singular('controlproject')) {
        $is_case_study = get_field('is_case_study', get_the_ID());
        
        if (!$is_case_study) {
            return 'noindex, nofollow';
        }
    }
    return $robots;
});

// Pour Rank Math
add_filter('rank_math/frontend/robots', function($robots) {
    if (is_singular('controlproject')) {
        $is_case_study = get_field('is_case_study', get_the_ID());
        
        if (!$is_case_study) {
            return 'noindex, nofollow';
        }
    }
    return $robots;
});

/**
 * Exclure les projets sans is_case_study du sitemap XML
 * Compatible avec Yoast SEO
 */
add_filter('wpseo_sitemap_entry', function($url, $type, $post) {
    if ($type === 'post' && isset($post->post_type) && $post->post_type === 'controlproject') {
        $is_case_study = get_field('is_case_study', $post->ID);
        
        if (!$is_case_study) {
            return false; // Exclure du sitemap
        }
    }
    return $url;
}, 10, 3);

// Pour Rank Math
add_filter('rank_math/sitemap/entry', function($url, $type, $object) {
    if ($type === 'post' && isset($object->post_type) && $object->post_type === 'controlproject') {
        $is_case_study = get_field('is_case_study', $object->ID);
        
        if (!$is_case_study) {
            return false; // Exclure du sitemap
        }
    }
    return $url;
}, 10, 3);