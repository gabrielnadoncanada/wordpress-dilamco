<?php
namespace Architronix;
/**
 * Customizer settings for this theme.
 *
 * @package 	WordPress
 * @subpackage 	Architronix
 */


/**
 * Customizer Settings.
 */
class Customize {

	/**
	 * Constructor. Instantiate the object.
	 */
	public function __construct() {
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_enqueue') );
		add_action( 'customize_register', array( $this, 'register' ) );				
		
	}

	public function customize_enqueue(){
		wp_enqueue_style( 'architronix-customize', ARCHITRONIX_ASSETS . '/admin/customize.css', [], time() );
		wp_enqueue_script( 'architronix-customize', ARCHITRONIX_ASSETS . '/admin/customize.js', array( 'jquery', 'customize-controls' ), time(), true );
		wp_localize_script( 'architronix-customize', 'architronixCustomize', 
        array( 
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce('architronix-customize')
			)
		);
	}

	/**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register( $wp_customize ) {
		
		/**
		 * Add customizer panels
		 */
		$wp_customize->add_panel(
			'header_panel',
			array(
				'title'    => esc_html__( 'Header', 'architronix' ),
				'priority' => 100,
			)
		);
		$wp_customize->add_panel(
			'blog_panel_settings',
			array(
				'title'    => esc_html__( 'Blog Settings', 'architronix' ),
				'priority' => 120,
			)
		);

		/**
		 * Add footer panel to customizer
		 */
		$wp_customize->add_panel(
			'footer_panel',
			array(
				'title'    => esc_html__( 'Footer', 'architronix' ),
				'priority' => 150,
			)
		);

		/**
		 * Add footer panel to customizer
		 */
		$wp_customize->add_panel(
			'design_panel',
			array(
				'title'    => esc_html__( 'Design options', 'architronix' ),
				'priority' => 150,
			)
		);

		$this->section_title_tagline($wp_customize);
		$this->section_blog($wp_customize);
		$this->section_blog_single($wp_customize);

		
        
		
		// Background color.
		
		// Register the custom control.
		$wp_customize->register_control_type( 'Architronix\Customize_Color_Control' );

		// Get the palette from theme-supports.
		$palette = get_theme_support( 'editor-color-palette' );

		// Build the colors array from theme-support.
		$colors = array();
		if ( isset( $palette[0] ) && is_array( $palette[0] ) ) {
			foreach ( $palette[0] as $palette_color ) {
				$colors[] = $palette_color['color'];
			}
		}

		// Add the control. Overrides the default background-color control.
		$wp_customize->add_control(
			new Customize_Color_Control(
				$wp_customize,
				'background_color',
				array(
					'label'   => esc_html_x( 'Background color', 'Customizer control', 'architronix' ),
					'section' => 'colors',
					'palette' => $colors,
				)
			)
		);

		$this->add_partials($wp_customize);

		
		
	}

	private function section_title_tagline($wp_customize){
		$wp_customize->add_setting(
			'custom_logo_white',
			array(
				'sanitize_callback' => array( __NAMESPACE__.'\\Customize', 'sanitize_attachment' )
			)
			
		);

		$wp_customize->add_control( new \WP_Customize_Media_Control(
			$wp_customize, 'custom_logo_white', 
			array( // setting id
				'label'         => esc_attr__( 'Logo white', 'architronix' ),
				'frame_title'   => esc_attr__( 'Select white logo', 'architronix' ),
				'description'   => esc_attr__( 'Display on dark type(transparent) background', 'architronix' ),
				'mime_type'     => 'image',
				'section'       => 'title_tagline',
				'priority'      => 9,
			)
		) );
		
		// Preloader
        $wp_customize->add_setting(
            'enable_preloader',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => false,
                'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
            )
        );
        $wp_customize->add_control(
            'enable_preloader',
            array(
                'type'    => 'checkbox',
                'section'       => 'title_tagline',
                'label'         => esc_html__('Enable Preloader?', 'architronix'),				
            )
        );

		 // logo_width
		 $wp_customize->add_setting(
			'logo_width',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 219,				
				'sanitize_callback' => static function( $value ) {
					return intval($value);
				},
			)
		);

		$wp_customize->add_control( 
            'logo_width', 
            array(
				'priority' => 9,
                'type'          => 'range',
                'section'       => 'title_tagline',
                'label'         => esc_attr__( 'Logo width', 'architronix' ),
                'input_attrs'   => array(
                    'min'   => 0,
                    'max'   => 400,
                    'step'  => 1,
                    'suffix'=> 'px'
                ),
          ) 
        );
		

		

		return $wp_customize;
	}

	private function section_blog($wp_customize){
		$wp_customize->add_section(
			'blog_settings',
			array(
				'title'    => esc_html__( 'Archive page', 'architronix' ),
				'panel' => 'blog_panel_settings',
				'priority' => 120,
			)
		);

		// blog_title
		$wp_customize->add_setting(
			'banner_blog_prefix',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Blog', 'architronix'),				
				'sanitize_callback' => static function( $value ) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'banner_blog_prefix',
			array(
				'type'    			=> 'text',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_html__( 'Banner prefix', 'architronix' ),
			)
		);

		// blog_subtitle
		$wp_customize->add_setting(
			'banner_blog_title',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Design Insights & Inspiration', 'architronix'),				
				'sanitize_callback' => static function( $value ) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'banner_blog_title',
			array(
				'type'    			=> 'textarea',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_html__( 'Banner Subtitle', 'architronix' ),
			)
		);

		// blog_desc
		$wp_customize->add_setting(
			'banner_blog_subtitle',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Unveil the Secrets to Transforming Spaces', 'architronix'),				
				'sanitize_callback' => static function( $value ) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'banner_blog_subtitle',
			array(
				'type'    			=> 'textarea',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_html__( 'Banner Description', 'architronix' ),
			)
		);

		// excerpt_length
		$wp_customize->add_setting(
			'excerpt_length',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 40,				
				'sanitize_callback' => static function( $value ) {
					return intval($value);
				},
			)
		);

		$wp_customize->add_control(
			'excerpt_length',
			array(
				'type'    			=> 'range',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_attr__( 'On Post summary, Excerpt length:', 'architronix' ),
				'description'		=> esc_attr__('Only worked when post excerpt is displayed.', 'architronix'),
				'input_attrs' => array(
					'min' => -1,
					'max' => 100,
					'step' => 1,
				  ),				
			)
		);

        
		// Add a setting for the blog archive layout
		$wp_customize->add_setting(
			'post_archive_layout', 
			array(
				'capability' 	=> 'edit_theme_options',
				'default'           => 'rs',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'post_archive_layout', 
			array(
				'label' => esc_attr__('Blog Archive Layout', 'architronix'),
				'section' => 'blog_settings',
				'type' => 'select',
				'choices' => [
					'full'			=> 'No Sidebar',
					'ls'			=> 'Left Sidebar',
					'rs'			=> 'Right Sidebar',
				],	
			)
		);

		// Add a setting for the blog archive sidebar
		$wp_customize->add_setting(
			'post_archive_sidebar', 
			array(
				'capability' 	=> 'edit_theme_options',
				'default'           => 'sidebar-post',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'post_archive_sidebar', 
			array(
				'label' => esc_attr__('Blog Archive Sidebar', 'architronix'),
				'section' => 'blog_settings',
				'type' => 'select',
				'choices' => architronix_get_sidebar_options(),
				'active_callback' => static function() {
					return get_theme_mod('post_archive_layout') != 'full'? true : false;
				}
			)
		);
	}

	private function section_blog_single($wp_customize){
		$wp_customize->add_section(
			'blog_single_settings',
			array(
				'title'    => esc_html__( 'Single page', 'architronix' ),
				'panel' => 'blog_panel_settings',
				'priority' => 120,
			)
		);
		
		// Add a setting for the post layout
		$wp_customize->add_setting(
			'post_single_layout', 
			array(
				'capability' 	=> 'edit_theme_options',
				'default'           => 'rs',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'post_single_layout', 
			array(
				'label' => esc_attr__('Single Post Layout', 'architronix'),
				'section' => 'blog_single_settings',
				'type' => 'select',
				'choices' => [
					'full'			=> 'No Sidebar',
					'ls'			=> 'Left Sidebar',
					'rs'			=> 'Right Sidebar',
				],	
			)
		);

		// Add a setting for the blog archive sidebar
		$wp_customize->add_setting(
			'post_single_sidebar', 
			array(
				'capability' 	=> 'edit_theme_options',
				'default'           => 'sidebar-post',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'post_single_sidebar', 
			array(
				'label' => esc_attr__('Blog Archive Sidebar', 'architronix'),
				'section' => 'blog_single_settings',
				'type' => 'select',
				'choices' => architronix_get_sidebar_options(),
				'active_callback' => static function() {
					return get_theme_mod('post_single_layout') != 'full'? true : false;
				}
			)
		);

		// Related post
        $wp_customize->add_setting(
            'enable_related_post',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
            )
        );
        $wp_customize->add_control(
            'enable_related_post',
            array(
                'type'    => 'checkbox',
                'section'       => 'blog_single_settings',
                'label'         => esc_html__('Enable related post?', 'architronix'),				
            )
        );

		$wp_customize->add_setting(
            'related_post_title',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => esc_attr__('Related Post', 'architronix'),
                'sanitize_callback' => static function($value){
                    return esc_attr($value);
                },
            )
        );
        $wp_customize->add_control(
            'related_post_title',
            array(
                'type'    => 'text',
                'section'       => 'blog_single_settings',
                'label'         => esc_html__('Related post title', 'architronix'),		
				'active_callback' => static function() {
					return get_theme_mod('enable_related_post');
				}		
            )
        );
	}

	/**
	 * Sanitize boolean for checkbox.
	 *
	 * @param 	bool 	$checked Whether or not a box is checked.
	 * @return 	bool
	 */
	public static function sanitize_checkbox( $checked = null ) {
		return (bool) isset( $checked ) && true === $checked;
	}

	/**
	 * Sanitize boolean for checkbox.
	 *
	 * @param 	bool 	$checked Whether or not a box is checked.
	 * @return 	bool
	 */
	public static function sanitize_attachment( $value = null ) {
		$attachment = wp_get_attachment_image($value);
		return (!empty($attachment) || !is_wp_error($attachment))? $value : null;
	}

	

	public function settings_pages( $settings_pages ) {
		$theme_slug = get_option( 'stylesheet' );
		$settings_pages[] = [
			'id'               => 'architronix',
			'option_name'      => "theme_mods_{$theme_slug}",
			'menu_title'       => 'Theme Options',
			'parent'           => 'themes.php',
			'customizer_only'  => true, // THIS
		];
		return $settings_pages;
	}

	
	
	
	private function add_partials($wp_customize){
		// Add Partial Blog Title
		$wp_customize->selective_refresh->add_partial(
			'blog_title',
			array(
				'selector'        => '.banner-title',
			)
		);
		// Add Partial Blog Sub-Title
		$wp_customize->selective_refresh->add_partial(
			'blog_subtitle',
			array(
				'selector'        => '.banner-subtitle',
			)
		);
		// Add Partial Blog Description
		$wp_customize->selective_refresh->add_partial(
			'blog_desc',
			array(
				'selector'        => '.banner-desc',
			)
		);
	
		return $wp_customize;
	}
}