<?php
namespace Architronix;

final class Footer{

    public function __construct() {
        add_action( 'customize_register', array( $this, 'register' ) );
        add_action('wp_enqueue_scripts', [$this, 'dynamic_css']);
		add_action( 'rwmb_meta_boxes', [$this, 'meta_boxes'] );
	}

	public function meta_boxes($meta_boxes){
        
        $meta_boxes[] = include __DIR__ ."/customizer/footer/general.php";
        $meta_boxes[] = include __DIR__ ."/customizer/footer/call-to-action.php";
		$meta_boxes[] = include __DIR__ ."/customizer/footer/company-info.php";
        $meta_boxes[] = include __DIR__ ."/customizer/footer/address-1.php";      
        $meta_boxes[] = include __DIR__ ."/customizer/footer/address-2.php";      
        $meta_boxes[] = include __DIR__ ."/customizer/footer/copyright-bar.php";      

        return $meta_boxes;        
    }


    /**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register( $wp_customize ) {

		

       
        // footer_image_position
		$wp_customize->add_setting(
			'footer_image_position',
            array(
				'capability'        => 'edit_theme_options',
				'default'           => 'center center',				
				'sanitize_callback' => static function( $value ) {
					return esc_attr($value);
				},
			)
            
			
		);
		$wp_customize->add_control( 
            'footer_image_position', 
            array(
                'type'          => 'select',
                'section'       => 'footer_settings',
                'label'   	=> esc_html__( 'Footer image position', 'architronix' ),
				'choices' 	=> array(
					'left top' 		=> esc_html__( 'Top Left', 'architronix' ),
					'center top'   => esc_html__( 'Top', 'architronix' ),
					'right top'   => esc_html__( 'Top Right', 'architronix' ),
					'left center'   => esc_html__( 'Left', 'architronix' ),
					'center center'   => esc_html__( 'Center', 'architronix' ),
					'right center'   => esc_html__( 'Right', 'architronix' ),
					'left bottom'   => esc_html__( 'Bottom Left', 'architronix' ),
					'center bottom'   => esc_html__( 'Bottom', 'architronix' ),
					'right bottom'   => esc_html__( 'Bottom Right', 'architronix' ),
				),
                'active_callback' => static function() {
					return get_theme_mod('footer_image', false)? true : false;
				}
            ) 
        );

        // footer_image_opacity
		$wp_customize->add_setting(
			'footer_image_opacity',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 100,				
				'sanitize_callback' => static function( $value ) {
					return intval($value);
				},
				
			)
		);

		$wp_customize->add_control( 
            'footer_image_opacity', 
            array(
                'type'          => 'range',
                'section'       => 'footer_settings',
                'label'         => esc_attr__( 'Footer image opacity', 'architronix' ),
                'input_attrs'   => array(
                    'min'   => 0,
                    'max'   => 100,
                    'step'  => 1,
                ),
                'active_callback' => static function() {
					return get_theme_mod('footer_image', false)? true : false;
				}
          ) 
        );   
		
		$wp_customize->selective_refresh->add_partial(
			'footer_general_settings',
			array(
				'selector'        => '.section-footer .container',
			)
		);

		// Add Partial Footer Logo
		$wp_customize->selective_refresh->add_partial(
			'footer_area',
			array(
				'selector'        => '.footer-contents .logo',
			)
		);

		// Add Partial Title footer social nav
        $wp_customize->selective_refresh->add_partial(
			'footer_social_nav_title',
			array(
				'selector'        => '.footer-contents .nav-title',
			)
		);

		// Add Partial Copyright
      
		$wp_customize->selective_refresh->add_partial(
			'copyright_bar',
			array(
				'selector'        => '.copyright p.left, .copyright p.right',
			)
		);
      
		$wp_customize->selective_refresh->add_partial(
			'footer_company_address_1',
			array(
				'selector'        => '.address-details-1',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'footer_company_address_2',
			array(
				'selector'        => '.address-details-2',
			)
		);
		

		
	}

	

    public function dynamic_css(){
        $styles = [];
        $attachment_id = get_theme_mod('footer_image');
        if( in_array(get_post_type(), ['page', 'ctrl_listings']) ){
            $page_attachment_id = get_post_meta(architronix_get_the_ID(), 'footer_image', true);
            $attachment_id = (!empty($page_attachment_id) && !is_wp_error($page_attachment_id))? $page_attachment_id : $attachment_id;
        }

        $image_url = wp_get_attachment_image_url($attachment_id, 'full');
        if(!empty($image_url) && !is_wp_error($image_url)){
            $styles[] = '--architronix-parallax-bg: url('.esc_url($image_url).');';                
        }

        $footer_image_opacity = get_theme_mod('footer_image_opacity', 100);
        $styles[] = '--architronix-parallax-opacity: '.($footer_image_opacity/100).';'; 

        $footer_image_position = get_theme_mod('footer_image_position', 'center');
        $styles[] = '--architronix-parallax-bg-position: '.$footer_image_position.';';
		

		$css = '.footer-section{'.implode('', $styles).'}';

		$attachment_id = get_theme_mod('cta_bg');
		if( in_array(get_post_type(), ['page', 'post']) ){
            $page_attachment_id = get_post_meta(architronix_get_the_ID(), 'cta_bg', true);
            $attachment_id = (!empty($page_attachment_id) && !is_wp_error($page_attachment_id))? $page_attachment_id : $attachment_id;
        }
		$image_url = wp_get_attachment_image_url($attachment_id, 'architronix-1296x460-cropped');
        if(!empty($image_url) && !is_wp_error($image_url)){
			$css .= '.feedback-wrapper{ background-image: url('.esc_url($image_url).');}';                
        }

        wp_add_inline_style('architronix-style', $css);
    }

    
    
}