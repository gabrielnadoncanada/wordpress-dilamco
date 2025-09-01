<?php
include __DIR__.'/demo-data.php';
 // elements      
 foreach (glob(__DIR__ ."/blocks/*.php") as $filename) {
    include $filename;
}

function architronix_enqueue_block_editor_assets() {
    global $architronix_font_vars;
	$version = wp_get_theme()->get('Version');
	$version .= WP_DEBUG? '-'.time() : '';

    wp_enqueue_style('architronix-google-fonts');
	wp_enqueue_style('architronix-block-editor', get_theme_file_uri('assets/admin/editor-style.css'), [], $version);    
    if(!empty($architronix_font_vars) && is_array($architronix_font_vars)){
        wp_add_inline_style('architronix-block-editor', '.editor-styles-wrapper{'.implode('', $architronix_font_vars).'}');			
    }

    wp_enqueue_script('architronix-editor', get_theme_file_uri('assets/admin/block-editor.js'), ['jquery', 'wp-i18n'], time(), true);
  
}
add_action( 'enqueue_block_editor_assets', 'architronix_enqueue_block_editor_assets' );


function architronix_admin_enqueue_scripts(){
    wp_enqueue_style('architronix-admin', get_theme_file_uri('assets/admin/admin.css'), [], '1.0.0');
    wp_enqueue_script('architronix-admin', get_theme_file_uri( 'assets/admin/admin.js'), ['jquery'], '5.0.0', true); 
}
add_action('admin_enqueue_scripts', 'architronix_admin_enqueue_scripts');

function architronix_register_sidebar() {
    register_sidebar(
        array(
            'name'          => esc_attr__( 'Post widget area', 'architronix' ),
            'id'            => 'sidebar-post',
            'description'   => esc_attr__( 'Widgets in this area will be shown on the side of the post archive or single post', 'architronix' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title display-5 fw-semibold mb-30 lh-1">',
            'after_title'   => '</h5>',
        )
    );
    
    if(defined('CTRL_AGENCY_VER')){
        register_sidebar(
            array(
                'name'          => esc_attr__( 'Page widget area', 'architronix' ),
                'id'            => 'sidebar-page',
                'description'   => esc_attr__( 'Widgets in this area will be shown on the sidebar of a page.', 'architronix' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget-title page-widget-title display-5 fw-semibold mb-30 lh-1">',
                'after_title'   => '</h5>',
            )
        );        
    }
	
}
add_action( 'widgets_init', 'architronix_register_sidebar' );