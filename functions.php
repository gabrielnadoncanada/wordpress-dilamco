<?php
define( 'ARCHITRONIX_VERSION', '1.3.2' ); 
define( 'ARCHITRONIX_URI', get_template_directory_uri() );
define( 'ARCHITRONIX_DIR', get_template_directory() );
define( 'ARCHITRONIX_ASSETS', ARCHITRONIX_URI.'/assets' );
define( 'ARCHITRONIX_ADMIN_ASSETS', ARCHITRONIX_URI.'/assets/admin' );

include __DIR__ .'/vendor/autoload.php';
new Architronix\Loader();


if ( ! function_exists( 'architronix_after_setup_theme' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Architronix 1.0
	 *
	 * @return void
	 */
	function architronix_after_setup_theme() {

		load_theme_textdomain( 'architronix', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );		

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1400, 9999 );



		add_image_size( 'architronix-1050x700-cropped', 1050, 700, true );
		add_image_size( 'architronix-429x250-cropped', 429, 250, true );
		add_image_size( 'architronix-banner-single-lg', 999999, 867, true );
		add_image_size( 'architronix-530x400-cropped', 530, 400, true );
		
		
		// single member
		add_image_size( 'architronix-538x656-cropped', 538, 656, true );
		// loop member
		add_image_size( 'architronix-422x517-cropped', 422, 517, true ); 		



        // image size for about-us section
		add_image_size( 'architronix-584x823-cropped', 584, 823, true );
		// image size for video background
		add_image_size( 'architronix-636x391-cropped', 636, 392, true );
		// image size for cta
		add_image_size( 'architronix-1296x460-cropped', 1296, 460, true );
		// image size for slider-2
		add_image_size( 'architronix-959x795-cropped', 959, 795, true );
		add_image_size( 'architronix-640x408-cropped', 640, 408, true );
		// image size for progress bar left image
		add_image_size( 'architronix-900x630-cropped', 900, 630, true );
		// image size for contact form left image
		add_image_size( 'architronix-638x355-cropped', 638, 355, true );
		// image size for Project simple gallery
		add_image_size( 'architronix-585x792-cropped', 585, 792, true );
		add_image_size( 'architronix-1201x792-cropped', 1201, 792, true );
		// image size for Project carousel gallery
		add_image_size( 'architronix-0x651-cropped', 0, 651, false );
		// image size for Project simple gallery
		add_image_size( 'architronix-1296x707-cropped', 1296, 707, true );
		add_image_size( 'architronix-412x245-cropped', 412, 245, true );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'architronix' ),
				'mobile' => esc_html__( 'Mobile menu', 'architronix' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 219;
		$logo_height = 31;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => false,
				'flex-height'          => false,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );	

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Custom plugin support
		add_theme_support( 'woocommerce' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_false' );

		add_action( 'comment_form_before', 'architronix_enqueue_comments_reply' );

		if ( ! isset( $content_width ) ) $content_width = 1040;

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$editor_stylesheet_path = 'assets/admin/editor-style-classic.css';

		// Enqueue editor styles.
		add_editor_style( Architronix\Google_Fonts::get_google_fonts_url() );
		add_editor_style( $editor_stylesheet_path );
		
		// custom plugin
		add_theme_support( 'woocommerce' );
		add_theme_support( 'control-agency' );
	}
}
add_action( 'after_setup_theme', 'architronix_after_setup_theme' );

function architronix_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}


function architronix_header_style(){
	return architronix_layout_get('header_style');
}



function architronix_post_tags() {
    $post_tags = get_the_tags();
    $output = '';

    if ( ! empty( $post_tags ) ) {
		$output = '<div class="wp-block-tag-cloud d-flex pt-30 flex-wrap">';
        foreach ( $post_tags as $tag ) {
            $output .= '<a href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '" class="text-decoration-none tag-cloud-link btn-hover-animation-3">' .  $tag->name  . '</a>';
        }
		$output .= '</div>';
    }

    return trim( $output);
}

function custom_image_sizes() {
    add_image_size('mobile-project-showcase-2-thumbnail', 470, 650, true); // Cropped to fit
}
add_action('after_setup_theme', 'custom_image_sizes');



// Enregistrer la catégorie de widgets Elementor pour le thème
add_action('elementor/elements/categories_registered', function ($elements_manager) {
    $elements_manager->add_category(
        'architronix-theme',
        [
            'title' => esc_html__('Architronix Theme', 'architronix'),
            'icon' => 'fa fa-plug',
        ]
    );
});

// Enregistrer les widgets Elementor personnalisés du thème
add_action('elementor/widgets/register', function ($widgets_manager) {
    $elementor_path = get_template_directory() . '/elementor/';

    foreach (['project-category-showcase'] as $file) {
        $path = $elementor_path . $file . '.php';
        if (file_exists($path)) require_once $path;
    }

    if (class_exists('Project_Category_Showcase')) {
        $widgets_manager->register(new Project_Category_Showcase());
    }
});