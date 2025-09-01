<?php
remove_action( 'init', 'register_block_core_archives' );
/**
 * Server-side rendering of the `core/archives` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/archives` block on server.
 *
 * @see WP_Widget_Archives
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with archives added.
 */
function architronix_render_block_core_archives_callback( $attributes ) {
	$show_post_count = ! empty( $attributes['showPostCounts'] );
	$type            = isset( $attributes['type'] ) ? $attributes['type'] : 'monthly';

	$class = 'wp-block-archives-list';

	if ( ! empty( $attributes['displayAsDropdown'] ) ) {

		$class = 'wp-block-archives-dropdown';

		$dropdown_id = wp_unique_id( 'wp-block-archives-' );
		$title       = ( '' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-archives.php */
		$dropdown_args = apply_filters(
			'widget_archives_dropdown_args',
			array(
				'type'            => $type,
				'format'          => 'option',
				'show_post_count' => $show_post_count,
			)
		);

		$dropdown_args['echo'] = 0;

		$archives = wp_get_archives( $dropdown_args );

		$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $class ) );

		switch ( $dropdown_args['type'] ) {
			case 'yearly':
				$label = __( 'Select Year','architronix' );
				break;
			case 'monthly':
				$label = __( 'Select Month','architronix' );
				break;
			case 'daily':
				$label = __( 'Select Day','architronix' );
				break;
			case 'weekly':
				$label = __( 'Select Week','architronix' );
				break;
			default:
				$label = __( 'Select Post','architronix' );
				break;
		}

		$show_label = empty( $attributes['showLabel'] ) ? ' screen-reader-text' : '';

		$block_content = '<label class="d-none" for="' . $dropdown_id . '" class="wp-block-archives__label ' . $show_label . '">' . esc_html( $title ) . '</label>
		<select class="postform form-select form-control" id="' . $dropdown_id . '" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
		<option value="">' . esc_html( $label ) . '</option>' . $archives . '</select>';

		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			$block_content
		);
	}

	/** This filter is documented in wp-includes/widgets/class-wp-widget-archives.php */
	$archives_args = apply_filters(
		'widget_archives_args',
		array(
			'type'            => $type,
			'show_post_count' => $show_post_count,
		)
	);

	$archives_args['echo'] = 0;

	$archives = wp_get_archives( $archives_args );

	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'category-lists list-unstyled mb-0 d-flex flex-column gap-20' ) );


	if ( empty( $archives ) ) {
		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			__( 'No archives to show.','architronix' )
		);
	}

	// Wrap each archive in a list item with custom classes
	$archives = preg_replace_callback(
		'/<li>/',
		function ( $matches ) {
			return '<li class="d-flex align-items-center p-0 gap-4">';
		},
		$archives
	);

	// Wrap each link in the archive list item with custom classes
	$archives = preg_replace_callback(
		'/<a(.*?)>/',
		function ( $matches ) {
			// Add a custom class to the link element
			$custom_class = 'text-decoration-none link-hover-animation-1';
			return '<a' . $matches[1] . ' class="' . $custom_class . '">';
		},
		$archives
	);
	$svg = '<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
	</svg>';
	$archives = str_replace('><a', '>'.$svg.'<a', $archives);
	
	return sprintf(
		'<ul %1$s>%2$s</ul>',
		$wrapper_attributes,
		$archives
	);
}

/**
 * Register archives block.
 */
function architronix_register_block_core_archives() {
	register_block_type_from_metadata(
		ABSPATH .'wp-includes/blocks/archives',
		array(
			'render_callback' => 'architronix_render_block_core_archives_callback',
		)
	);
}
add_action( 'init', 'architronix_register_block_core_archives' );