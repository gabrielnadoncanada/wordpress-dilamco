<?php 
return [
    'title'           => esc_attr__( 'Google fonts', 'architronix' ),
    'id'              => 'google_fonts_settings',
    'panel'          => 'design_panel',
    'priority'      => 30, 
    'fields'          => [ 
        Architronix\Google_Fonts::google_font_field('body_font', esc_attr__('Body Font', 'architronix')),
        Architronix\Google_Fonts::google_font_field('heading_font', esc_attr__('Heading Font', 'architronix')),
    ]
];