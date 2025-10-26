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

    foreach (['project-category-showcase', 'space-category-showcase', 'space-showcase'] as $file) {
        $path = $elementor_path . $file . '.php';
        if (file_exists($path)) require_once $path;
    }

    if (class_exists('Project_Category_Showcase')) {
        $widgets_manager->register(new Project_Category_Showcase());
    }
    
    if (class_exists('Space_Category_Showcase')) {
        $widgets_manager->register(new Space_Category_Showcase());
    }

    if (class_exists('Space_Showcase')) {
        $widgets_manager->register(new Space_Showcase());
    }
});


/**
 * Shortcode: [language_dropdown display="full|short"]
 * - full  => Full language name (Proper Case)
 * - short => 2-letter code (UPPERCASE)
 */
function gn_polylang_dropdown_shortcode( $atts = [] ) {
    // Attrs
    $atts = shortcode_atts(
        ['display' => 'full'], // default
        $atts,
        'language_dropdown'
    );
    $display = strtolower( trim( $atts['display'] ) );
    if ( ! in_array( $display, ['full', 'short'], true ) ) {
        $display = 'full';
    }

    if ( ! function_exists( 'pll_the_languages' ) ) {
        return ''; // Polylang not active
    }

    // Helper: Proper Case with UTF-8 support
    $to_proper = function( $s ) {
        $s = is_string( $s ) ? trim( $s ) : '';
        if ( $s === '' ) return '';
        $lower = function_exists('mb_strtolower') ? mb_strtolower($s, 'UTF-8') : strtolower($s);
        if ( function_exists('mb_convert_case') ) {
            return mb_convert_case($lower, MB_CASE_TITLE, 'UTF-8');
        }
        return ucwords($lower);
    };

    // Pull languages as array (with flags)
    $langs = pll_the_languages( [
        'raw'           => 1,
        'hide_if_empty' => 0,
        'show_flags'    => 1,
        'show_names'    => 1,
    ] );
    if ( empty( $langs ) || ! is_array( $langs ) ) {
        return '';
    }

    // Compute current label for the toggle
    $current_label = '';
    foreach ( $langs as $lang ) {
        if ( ! empty( $lang['current_lang'] ) ) {
            if ( $display === 'short' ) {
                $current_label = strtoupper( $lang['slug'] ); // e.g., EN, FR
            } else {
                $current_label = $to_proper( $lang['name'] ); // e.g., English, Français
            }
            break;
        }
    }
    if ( $current_label === '' ) {
        $first = reset( $langs );
        $current_label = $display === 'short'
            ? strtoupper( $first['slug'] ?? 'EN' )
            : $to_proper( $first['name'] ?? 'English' );
    }

    ob_start(); ?>
    <div class="dropdown fw-semibold d-block position-relative">
        <a href="#"
           class="text-decoration-none dropdown-language nav-link-icon d-flex align-items-center gap-1"
           aria-label="nav-links"
           data-bs-toggle="dropdown"
           aria-expanded="false">
            <?php echo esc_html( $current_label ); ?>
            <span class="dropdown-icon">
                <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 8L6 2L1 8"></path>
                </svg>
            </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-style-2 dropdown-menu-right">
            <?php foreach ( $langs as $lang ) :
                $is_curr = ! empty( $lang['current_lang'] );
                $url     = isset( $lang['url'] ) ? $lang['url'] : '#';

                // Flag HTML (Polylang provides <img>, else fallback to theme asset)
                if ( ! empty( $lang['flag'] ) ) {
                    $flag_html = $lang['flag']; // safe HTML from Polylang
                } else {
                    $slug        = strtolower( $lang['slug'] );
                    $fallback_src = trailingslashit( get_template_directory_uri() ) . 'assets/images/flag-' . $slug . '.png';
                    $flag_html    = '<img src="' . esc_url( $fallback_src ) . '" alt="flag-' . esc_attr( $slug ) . '">';
                }

                // Label per display mode
                $item_label = ($display === 'short')
                    ? strtoupper( $lang['slug'] )
                    : $to_proper( $lang['name'] );
                ?>
                <li>
                    <a href="<?php echo esc_url( $url ); ?>"
                       class="dropdown-item d-flex gap-1 align-items-center<?php echo $is_curr ? ' active' : ''; ?>"
                       <?php echo $is_curr ? 'aria-current="true"' : ''; ?>>
                        <?php echo $flag_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        <span><?php echo esc_html( $item_label ); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'language_dropdown', 'gn_polylang_dropdown_shortcode' );


add_action('init', function () {
    $classic_types = ['controlspace', 'controlproject', 'controlservice', 'controljob', 'controlmember'];

    // 1) Disable Gutenberg for those post types
    add_filter('use_block_editor_for_post_type', function ($use, $post_type) use ($classic_types) {
        return in_array($post_type, $classic_types, true) ? false : $use;
    }, 10, 2);

    // 2) Remove the classic editor UI (WYSIWYG) so no editor shows at all
    foreach ($classic_types as $pt) {
        if (post_type_exists($pt)) {
            remove_post_type_support($pt, 'editor');
        }
    }
}, 100);

// Load Color Grid Shortcode
require_once get_template_directory() . '/inc/colors/color-grid-shortcode.php';
