<?php
namespace Architronix;

final class Template{    
    
    public function __construct() {        
		add_filter( 'single_template', [$this, 'single_template'] );   
        add_filter( 'theme_templates', [$this, 'theme_templates'] );    
	}

    public function theme_templates($templates){
        // $templates["templates/blank-template.php?atchitronixtemplate=2"] = 'Architronix Template';
        return $templates;
    }

    public function single_template($template){
        global $post;
        if ( $post->post_type === 'elementor_library' ) {
            $locate_template = locate_template( "templates/blank-template.php" );
            if ( ! empty( $locate_template ) ) {
                $template = $locate_template;
            }
        }
        return $template;
    }
    
}