<?php
/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 *
 * @param 	string 	$uri  Social link.
 * @param 	int    	$size The icon size in pixels.
 * @return 	string
 */
function architronix_get_social_link_svg( $uri, $size = 24 ) {
	return Architronix\SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Displays SVG icons in the footer navigation.
 *
 * @param 	string   	$item_output 	The menu item's starting HTML output.
 * @param 	WP_Post  	$item        	Menu item data object.
 * @param 	int      	$depth       	Depth of the menu. Used for padding.
 * @param 	stdClass 	$args        	An object of wp_nav_menu() arguments.
 * @return 	string		The menu item output with social icon.
 */
function architronix_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( in_array($args->theme_location, ['social', 'footer_social']) ) {
		$svg = architronix_get_social_link_svg( $item->url, 24 );
		if ( ! empty( $svg ) ) {
			$item_output = str_replace( $args->link_before, $svg, $item_output );
		}
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'architronix_nav_menu_social_icons', 10, 4 );

/**
 * Filters the arguments for a single nav menu item.
 *
 * @param 	stdClass $args  	An object of wp_nav_menu() arguments.
 * @param 	WP_Post  $item  	Menu item data object.
 * @param 	int      $depth 	Depth of menu item. Used for padding.
 * @return 	stdClass
 */
function architronix_add_menu_description_args( $args, $item, $depth ) {
	if ( '</span>' !== $args->link_after ) {
		$args->link_after = '';
	}

	if ( 0 === $depth && isset( $item->description ) && $item->description ) {
		// The extra <span> element is here for styling purposes: Allows the description to not be underlined on hover.
		$args->link_after = '<p class="menu-item-description"><span>' . $item->description . '</span></p>';
	}

	return $args;
}
add_filter( 'nav_menu_item_args', 'architronix_add_menu_description_args', 10, 3 );

add_filter('nav_menu_link_attributes', 'architronix_nav_menu_link_attributes', 10, 3);
function architronix_nav_menu_link_attributes($atts, $menu_item, $args){
	if((empty($menu_item->menu_item_parent))  && !empty($args->link_class_depth_1) ){
		
		if(empty($atts['class'])){
			$atts['class'] = esc_attr($args->link_class_depth_1);
		}else{
			$atts['class'] .= ' '.esc_attr($args->link_class_depth_1);
		}
	}
	if(!empty($menu_item->menu_item_parent) && !empty($args->link_class_depth_2) ){
		
		if(empty($atts['class'])){
			$atts['class'] = esc_attr($args->link_class_depth_2);
		}else{
			$atts['class'] .= ' '.esc_attr($args->link_class_depth_1);
		}
	}
	

	return $atts;
}