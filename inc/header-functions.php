<?php
/*
control header
*/
add_action('wp_body_open', 'architronix_body_open');
function architronix_body_open(){
	if( get_theme_mod('enable_preloader', true) ){
		get_template_part('template-parts/preloader');
	}
	if( get_theme_mod('enable_custom_cursor', true) ){
		get_template_part('template-parts/cursor');
	}
}

function architronix_header_default($id){
	$config = [
		'navbar_icons' => ['search', 'cart'],
		'topbar_items_right' => ['phone', 'social_icons'],
		'topbar_items_left' => ['tagline'],
		'header_tagline' => sprintf(esc_attr__('Welcome to [site_title],  Innovation Beyond Boundaries', 'architronix')),
		'header_social_links' => [
			[
				'title' => esc_attr__('Facebook', 'architronix'),
				'label' => 'FB',
				'icon' => '',
				'url' => '#',
				'css_class' => '',
			],
			[
				'title' => esc_attr__('Linkedin', 'architronix'),
				'label' => 'IN',
				'icon' => '',
				'url' => '#',
				'css_class' => '',
			],
			[
				'title' => esc_attr__('Twitter', 'architronix'),
				'label' => 'TW',
				'icon' => '',
				'url' => '#',
				'css_class' => '',
			],
			[
				'title' => esc_attr__('Instagram', 'architronix'),
				'label' => 'IG',
				'icon' => '',
				'url' => '#',
				'css_class' => '',
			]
		]
	];

	if(!empty($config[$id])){
		return $config[$id];
	}else{
		return false;
	}
}

// architronix_get_custom_logo
function architronix_get_custom_logo($customizer_id = 'custom_logo', $default = 'assets/images/logo.png', $blog_id = 0){
    $html          = '';
    $switched_blog = false;
    if (is_multisite() && !empty($blog_id) && get_current_blog_id() !== (int) $blog_id) {
        switch_to_blog($blog_id);
        $switched_blog = true;
    }
    $has_custom_logo = architronix_get_logo_uri($customizer_id);
    if ($has_custom_logo) {
        $html = sprintf(
            '<img src="%s" alt="%s" width="%s" />',
            architronix_get_logo_uri($customizer_id),
            esc_attr(get_bloginfo('name', 'display')),
            intval(get_theme_mod('logo_width', 186))
        );
    } else {
        $html = sprintf(
            '<img src="%s" alt="%s" width="%s" />',
            get_theme_file_uri( $default),
            esc_attr(get_bloginfo('name', 'display')),
            intval(get_theme_mod('logo_width', 186))
        );
    }
    if ($switched_blog) {
        restore_current_blog();
    }
    /**
     * Filters the custom logo output.
     *
     * @param string $html    Custom logo HTML output.
     * @param int    $blog_id ID of the blog to get the custom logo for.
     */
    return apply_filters('architronix_get_custom_logo', $html, $blog_id);
}
// architronix_get_logo_uri
if (!function_exists('architronix_get_logo_uri')) :
    function architronix_get_logo_uri($customizer_id = 'custom_logo')
    {
        $logo_uri = false;
        $attachment_id = get_theme_mod($customizer_id);
        $custom_logo_uri = wp_get_attachment_image_url($attachment_id, 'full');
        if (!empty($custom_logo_uri) && !is_wp_error($custom_logo_uri)) {
            $logo_uri = $custom_logo_uri;
        }
        return $logo_uri;
    }
endif;


if(!function_exists('architronix_theme_mod_image_uri')):
    function architronix_theme_mod_image_uri($customizer_id, $static_image = 'assets/images/logo.png', $size='full'){
       
        $image_uri = get_theme_file_uri( $static_image );
        
       
        $custom_image_id = get_theme_mod( $customizer_id );
        $image = wp_get_attachment_image_src( $custom_image_id ,  $size);

        if(empty($image[0]) || is_wp_error($image)) return $image_uri;
        
        $image_uri = $image[0];
        
        return $image_uri;
    }
endif;

if( !function_exists('architronix_myaccount_link') ):
function architronix_myaccount_link(){
    if(!is_user_logged_in()){
        $myaccount_url = wp_login_url( get_permalink() );
    }else{
        $myaccount_url = admin_url('profile.php');
    }    
    
    if(function_exists('WC') && !empty(get_option('woocommerce_myaccount_page_id'))){
        $myaccount_url = wc_get_page_permalink( 'myaccount' );
    }  
    return $myaccount_url;
}
endif;

if( !function_exists('architronix_logout_link') ):
    function architronix_logout_link(){
        $logout_url = wp_login_url('/');
        if(function_exists('WC') && !empty(get_option('woocommerce_myaccount_page_id'))){
            $logout_url = wc_logout_url();
        }
        return $logout_url;
        
    }
endif;

function architronix_display_attributes_filter($attribs, $types){
    $extra_attribs = array('class' => array());

    //For the current item we need to add a little more info
    if(is_array($types) && in_array('current-item', $types)){
        $extra_attribs['class'][] = 'active';
        $extra_attribs['aria-current'] = array('page');
    }

    $atribs_array = array();
    preg_match_all('/([a-zA-Z]+)=["\']([a-zA-Z0-9\-\_ ]*)["\']/i', $attribs, $matches);
    if(isset($matches[1])){
        foreach ($matches[1] as $key => $tag){
            if(isset($matches[2][$key])){
                $atribs_array[$tag] = explode(' ', $matches[2][$key]);
            }
        }
    }

    $merged_attribs = array_merge_recursive($atribs_array , $extra_attribs);
    $output = '';
    foreach($merged_attribs as $tag => $vals){
        $output .= sprintf(' %1$s="%2$s"', $tag, implode(' ', $vals));
    }

    return $output;
}
add_filter('bcn_display_attributes', 'architronix_display_attributes_filter', 10, 2);

/**
 * Retrieves an array of the class names for the header element.
 *
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function architronix_get_header_class( $class = '' ) {
	global $wp_query;
	$classes = array( 
		'section-header',
		'header',
		'header-1',		
        'header-shadow'
	);
	

	$sticky_header = get_theme_mod('sticky_navbar', true);
    $classes[] = $sticky_header? 'sticky-navbar' : '';		

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS body class names for the current post or page.
	 *
	 * @param string[] $classes An array of header class names.
	 * @param string[] $class   An array of additional class names added to the header.
	 */
	$classes = apply_filters( 'architronix_header_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the header element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function architronix_header_class( $class = '' ) {
	// Separates class names with a single space, collates class names for header element.
	echo 'class="' . esc_attr( implode( ' ', architronix_get_header_class( $class ) ) ) . '"';
}
 
// architronix is enable topbar
if (!function_exists('architronix_is_enable_topbar')) { 
    function architronix_is_enable_topbar(){
        if(current_user_can('edit_theme_options')) return true;
        if( empty(get_bloginfo('description'))  ) {
            $display_title_and_tagline = false;
        }else{
            $display_title_and_tagline = get_theme_mod('display_title_and_tagline', true);
        }

        if ( $display_title_and_tagline || has_nav_menu( 'social' ) || has_nav_menu( 'topbar' )  )
        return true;

        return false;
    }
}

/**
 * Retrieves an array of the class names for the topbar element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function architronix_get_topbar_class( $class = '' ) {
	$classes = array( 'topbar-section', 'has-parallax' );
	
    $topbar_bg_color = get_theme_mod('topbar_bg_color', 'bg-tra');
	
    $classes[] = $topbar_bg_color;
    $classes[] = in_array($topbar_bg_color, ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary'])? 'text-light' : '';		

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS topbar class names for the current post or page.
	 *
	 * @param string[] $classes An array of topbar class names.
	 * @param string[] $class   An array of additional class names added to the topbar.
	 */
	$classes = apply_filters( 'architronix_topbar_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Displays the class names for the topbar element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function architronix_topbar_class( $class = '' ) {
	// Separates class names with a single space, collates class names for topbar element.
	echo 'class="' . esc_attr( implode( ' ', architronix_get_topbar_class( $class ) ) ) . '"';
}

/**
 * Retrieves an array of the class names for the navbar element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function architronix_get_navbar_class( $class = '' ) {
	// global $wp_query;
	$classes = array( 'navbar', 'navbar-expand-xl', 'navbar-light', 'hover-menu'  );
	
	$navbar_style = in_array(get_theme_mod('header_bg_color', 'bg-white'), ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary'])? 'navbar-dark' : 'navbar-light';

    $classes[] = in_array('bg-tra', architronix_get_header_class())? get_theme_mod('navbar_style', 'navbar-dark') : $navbar_style;	

    $navbar_bg_color = get_theme_mod('header_bg_color', 'bg-tra');
	
    $classes[] = $navbar_bg_color;
    // $classes[] = in_array($navbar_bg_color, ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary'])? 'text-light' : '';


	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS body class names for the current post or page.
	 *
	 * @param string[] $classes An array of navbar class names.
	 * @param string[] $class   An array of additional class names added to the navbar.
	 */
	$classes = apply_filters( 'architronix_navbar_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the navbar element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function architronix_navbar_class( $class = '' ) {
	// Separates class names with a single space, collates class names for navbar element.
	echo 'class="' . esc_attr( implode( ' ', architronix_get_navbar_class( $class ) ) ) . '"';
}

/**
 * Retrieves an array of the class names for the banner element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function architronix_get_banner_class( $class = '' ) {
	$classes = array( 
		'section',
		'banner-section', 
		'section-banner-bloglist2', 
		'pt-100', 
		'is-mode'  
	);
	
   
	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS banner class names for the current post or page.
	 *
	 * @param string[] $classes An array of banner class names.
	 * @param string[] $class   An array of additional class names added to the banner.
	 */
	$classes = apply_filters( 'architronix_banner_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the banner element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function architronix_banner_class( $class = '' ) {
	// Separates class names with a single space, collates class names for banner element.
	echo 'class="' . esc_attr( implode( ' ', architronix_get_banner_class( $class ) ) ) . '"';
}


function architronix_get_main_class( $args, $class = '' ) {
	global $architronix;
	$classes = wp_parse_args($args, [
		'container' => $architronix->meta['container'],
		'spacer_y' => $architronix->meta['spacer_y'],
	]);		

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $class, $classes );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS main class names for the current post or page.
	 *
	 * @param string[] $classes An array of main class names.
	 * @param string[] $class   An array of additional class names added to the main.
	 */
	$classes = apply_filters( 'architronix_main_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the main element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function architronix_main_class($args = [], $class = '' ) {
	// Separates class names with a single space, collates class names for main element.
	echo 'class="' . esc_attr( implode( ' ', architronix_get_main_class( $args, $class ) ) ) . '"';
}

function architronix_get_header_elements($group_id, $before='', $after = '', $defaults = []){    
    $elements_dir = apply_filters("architronix_get_header_elements_dir", 'template-parts/header/elements');
    $elements = get_theme_mod( $group_id, $defaults); 
	$elements = array_unique($elements);
    if(empty($elements) || is_string($elements)) return;

    $output = '';
    foreach ($elements as $element) {
        $function_name = "architronix_get_header_element_{$element}";
        $file_name= str_replace(['_', ' '], '-', $element);
        $located = locate_template("{$elements_dir}/{$file_name}.php", false, false);
        if($located){
            ob_start();
            include $located;
            $output .= ob_get_clean();
        }elseif(function_exists($function_name)){
            $output .= call_user_func($function_name);
        }
    }
    $output = architronix_content($output, $before, $after, false);
    return apply_filters("architronix_get_header_elements_{$group_id}", $output);
}