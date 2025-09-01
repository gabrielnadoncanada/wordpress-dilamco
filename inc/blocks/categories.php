<?php
remove_action( 'init', 'register_block_core_categories' );
/**
 * Server-side rendering of the `core/categories` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/categories` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the categories list/dropdown markup.
 */
function architronix_render_block_core_categories( $attributes ) {
	static $block_id = 0;
	++$block_id;

	$args = array(
		'echo'         => false,
		'hierarchical' => ! empty( $attributes['showHierarchy'] ),
		'orderby'      => 'name',
		'show_count'   => ! empty( $attributes['showPostCounts'] ),
		'title_li'     => '',
		'hide_empty'   => empty( $attributes['showEmpty'] ),
	);
	if ( ! empty( $attributes['showOnlyTopLevel'] ) && $attributes['showOnlyTopLevel'] ) {
		$args['parent'] = 0;
	}

	if ( ! empty( $attributes['displayAsDropdown'] ) ) {
		$id                       = 'wp-block-categories-' . $block_id;
		$args['id']               = $id;
		$args['show_option_none'] = __( 'Select Category','architronix' );
		$wrapper_markup           = '<div %1$s><label class="screen-reader-text sr-only" for="' . esc_attr( $id ) . '">' . __( 'Categories','architronix' ) . '</label>%2$s</div>';
		$items_markup             = wp_dropdown_categories( $args );
		$type                     = 'dropdown';

		if ( ! is_admin() ) {
			// Inject the dropdown script immediately after the select dropdown.
			$items_markup = preg_replace(
				'#(?<=</select>)#',
				build_dropdown_script_block_core_categories( $id ),
				$items_markup,
				1
			);
            $items_markup = str_replace("class='postform'", "class='postform form-select form-control'", $items_markup);
		}
	} else {
		$wrapper_markup = '<ul %1$s>%2$s</ul>';
		$items_markup   = wp_list_categories( $args );
        $items_markup = str_replace('cat-item cat-', 'd-flex align-items-center p-0 gap-4 cat-item cat-', $items_markup);
        $items_markup = str_replace('a href=', 'a class="text-decoration-none link-hover-animation-1" href=', $items_markup);

        $svg = '<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
    </svg>';
    $items_markup = str_replace('><a', '>'.$svg.'<a', $items_markup);
		$type           = 'list';
	}



	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => "wp-block-categories-{$type} category-lists list-unstyled mb-0 d-flex flex-column gap-20" ) );

	return sprintf(
		$wrapper_markup,
		$wrapper_attributes,
		$items_markup
	);
}


/**
 * Registers the `core/categories` block on server.
 */
function architronix_register_block_core_categories() {
	register_block_type_from_metadata(
		ABSPATH .'wp-includes/blocks/categories',
		array(
			'render_callback' => 'architronix_render_block_core_categories',
		)
	);
}
add_action( 'init', 'architronix_register_block_core_categories' );