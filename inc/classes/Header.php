<?php
namespace Architronix;

final class Header{
	public $data = [];

    public function __construct() {
		add_action( 'rwmb_meta_boxes', [$this, 'meta_boxes'] );
        add_action( 'customize_register', array( $this, 'register' ) );
        add_action('wp_enqueue_scripts', [$this, 'dynamic_css']);
	}

	public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
    }

	public function meta_boxes($meta_boxes){
        $meta_boxes[] = include __DIR__ ."/customizer/header/topbar.php";
        $meta_boxes[] = include __DIR__ ."/customizer/header/navbar.php";
        $meta_boxes[] = include __DIR__ ."/customizer/header/social-icons.php";      
        $meta_boxes[] = include __DIR__ ."/customizer/header/buttons.php";      
        $meta_boxes[] = include __DIR__ ."/customizer/header/contact.php";      

        return $meta_boxes;        
    }

    /**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register( $wp_customize ) {        
        $this->add_partials($wp_customize);		
	}

    public function dynamic_css(){
        $styles = [];
        $attachment_id = get_theme_mod('banner_image');
        if( in_array(get_post_type(), ['page', 'ctrl_listings']) ){
            $page_attachment_id = get_post_meta(architronix_get_the_ID(), 'banner_image', true);
            $attachment_id = (!empty($page_attachment_id) && !is_wp_error($page_attachment_id))? $page_attachment_id : $attachment_id;
        }

        $image_url = wp_get_attachment_image_url($attachment_id, 'full');
        if(!empty($image_url) && !is_wp_error($image_url)){
            $styles[] = '--architronix-parallax-bg: url('.esc_url($image_url).');';                
        }

        $banner_image_opacity = get_theme_mod('banner_image_opacity', 25);
        $styles[] = '--architronix-parallax-opacity: '.($banner_image_opacity/100).';'; 

        $banner_image_position = get_theme_mod('banner_image_position', 'center');
        $styles[] = '--architronix-parallax-bg-position: '.$banner_image_position.';';

        wp_add_inline_style('architronix-style', '.banner-section{'.implode('', $styles).'}');
        
    }
    
    


    private function add_partials($wp_customize){

        // Add partial for header.
		$wp_customize->selective_refresh->add_partial(
			'navbar_settings',
			array(
				'selector'        => '.navbar-icons',
			)
		);

        $wp_customize->selective_refresh->add_partial(
			'banner_image',
			array(
				'selector'        => '.banner-section',
			)
		);
       
        // Add partial for blogname.
		$wp_customize->selective_refresh->add_partial(
			'custom_logo',
			array(
				'selector'        => '.logo-dark',
			)
		);

        $wp_customize->selective_refresh->add_partial(
			'custom_logo_white',
			array(
				'selector'        => '.logo-white',
			)
		);

        // Add partial for blogdescription.
		$wp_customize->selective_refresh->add_partial(
			'topbar_settings',
			array(
				'selector'        => '.header-tagline'
			)
		);

		// Add partial Topbar Contact.
		$wp_customize->selective_refresh->add_partial(
			'header_contact_settings',
			array(
				'selector'        => '.header-contact',
			)
		);
		
		// Add partial Topbar Menu.
		$wp_customize->selective_refresh->add_partial(
			'header_social_icons_settings',
			array(
				'selector'        => '.header-social-links',
			)
		);

		// Add partial Topbar Menu.
		$wp_customize->selective_refresh->add_partial(
			'header_buttons_settings',
			array(
				'selector'        => '.header-buttons',
			)
		);

		// Add partial Primary menu.
		$wp_customize->selective_refresh->add_partial(
			'nav_menu_locations[primary]',
			array(
				'selector'        => '#architronixNavbar .navbar-nav > li:first',
			)
		);
		// Add partial Nav Icons.
		$wp_customize->selective_refresh->add_partial(
			'enable_header_search',
			array(
				'selector'        => '.nav-link-icon',
			)
		);
		
		$wp_customize->selective_refresh->add_partial(
			'nav_menu_locations[social]',
			array(
				'selector'        => '.social-nav',
			)
		);

       
        return $wp_customize;
    }

    

}