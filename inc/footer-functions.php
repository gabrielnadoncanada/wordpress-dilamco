<?php
function architronix_footer_default($id){
	$config = [
		'footer_social_links' => [
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
/*
control footer
*/
function architronix_total_footer_widgets(){
	return get_theme_mod('total_footer_widgets', 3);
}

/**
 * Retrieves an array of the class names for the footer element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function architronix_get_footer_class( $class = '' ) {
	$classes = array( 
		'footer', 
		'section-footer', 
		'section-full-width', 
		'position-relative', 
        'mt-60',
        'mt-lg-100',
        'mt-xxl-120'
	);
	
	$footer_bg_color = get_theme_mod('footer_bg_color', 'bg-secondary');
	$classes[] = $footer_bg_color;
	 
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
	 * Filters the list of CSS footer class names for the current post or page.
	 *
	 * @param string[] $classes An array of footer class names.
	 * @param string[] $class   An array of additional class names added to the footer.
	 */
	$classes = apply_filters( 'architronix_footer_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the footer element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function architronix_footer_class( $class = '' ) {
	// Separates class names with a single space, collates class names for footer element.
	echo 'class="' . esc_attr( implode( ' ', architronix_get_footer_class( $class ) ) ) . '"';
}

/**
 * Retrieves an array of the class names for the copyright element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function architronix_get_copyright_class( $class = '' ) {
	$classes = array( 'copyright-section', 'footer-2'  );
	
    
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
	 * Filters the list of CSS copyright class names for the current post or page.
	 *
	 * @param string[] $classes An array of copyright class names.
	 * @param string[] $class   An array of additional class names added to the copyright.
	 */
	$classes = apply_filters( 'architronix_copyright_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the copyright element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function architronix_copyright_class( $class = '' ) {
	// Separates class names with a single space, collates class names for copyright element.
	echo 'class="' . esc_attr( implode( ' ', architronix_get_copyright_class( $class ) ) ) . '"';
}

function architronix_default_footer_text(){
	return sprintf(esc_attr__('&copy; %s Architronix, All Rights Reserved', 'architronix'), date('Y'));
}