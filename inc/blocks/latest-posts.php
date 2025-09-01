<?php
remove_action( 'init', 'register_block_core_latest_posts' );
/**
 * Renders the `core/latest-posts` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with latest posts added.
 */
function architronix_render_block_core_latest_posts( $attributes ) {
	global $post, $block_core_latest_posts_excerpt_length;

	$args = array(
		'posts_per_page'      => $attributes['postsToShow'],
		'post_status'         => 'publish',
		'order'               => $attributes['order'],
		'orderby'             => $attributes['orderBy'],
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);

	$block_core_latest_posts_excerpt_length = $attributes['excerptLength'];
	add_filter( 'excerpt_length', 'block_core_latest_posts_get_excerpt_length', 20 );

	if ( ! empty( $attributes['categories'] ) ) {
		$args['category__in'] = array_column( $attributes['categories'], 'id' );
	}
	if ( isset( $attributes['selectedAuthor'] ) ) {
		$args['author'] = $attributes['selectedAuthor'];
	}

	$query        = new WP_Query();
	$recent_posts = $query->query( $args );

	if ( isset( $attributes['displayFeaturedImage'] ) && $attributes['displayFeaturedImage'] ) {
		update_post_thumbnail_cache( $query );
	}

	$list_items_markup = '<div class="row g-30">';

	foreach ( $recent_posts as $post ) {
		$post_link = esc_url( get_permalink( $post ) );
		$title     = get_the_title( $post );

		if ( ! $title ) {
			$title = __( '(no title)','architronix' );
		}

		
		$list_items_markup .= '<div class="col-6 col-lg-12">';
		$list_items_markup .= '<div class="d-flex flex-column flex-lg-row gap-3 gap-lg-4 align-items-lg-center">';
		
										
											

		if ( $attributes['displayFeaturedImage'] && has_post_thumbnail( $post ) ) {
			$image_style = '';
			if ( isset( $attributes['featuredImageSizeWidth'] ) ) {
				$image_style .= sprintf( 'max-width:%spx;', $attributes['featuredImageSizeWidth'] );
			}
			if ( isset( $attributes['featuredImageSizeHeight'] ) ) {
				$image_style .= sprintf( 'max-height:%spx;', $attributes['featuredImageSizeHeight'] );
			}

			$image_classes = 'wp-block-latest-posts__featured-image';
			if ( isset( $attributes['featuredImageAlign'] ) ) {
				$image_classes .= ' align' . $attributes['featuredImageAlign'];
			}

			$featured_image = get_the_post_thumbnail(
				$post,
				$attributes['featuredImageSizeSlug'],
				array(
					'style' => esc_attr( $image_style ),
				)
			);
			
			$list_items_markup .= sprintf(
				'<div class="post-image">%s</div>',
				$featured_image
			);
		}

		$list_items_markup .= '<div class="post-heading">';
		$list_items_markup .= sprintf(
			'<h5 class="fw-semibold line-clamp line-clamp-2"><a class="wp-block-latest-posts__post-title text-decoration-none link-hover-animation-1" href="%1$s">%2$s</a></h5>',
			esc_url( $post_link ),
			$title
		);
		
		if ( isset( $attributes['displayPostDate'] ) && $attributes['displayPostDate'] ) {
			$list_items_markup .= sprintf(
				'<time datetime="%1$s" class="latest-posts__post-date">%2$s</time>',
				esc_attr( get_the_date( 'c', $post ) ),
				get_the_date( '', $post )
			);
		}
		$list_items_markup .= '</div>';

		if ( isset( $attributes['displayPostContent'] ) && $attributes['displayPostContent']
			&& isset( $attributes['displayPostContentRadio'] ) && 'excerpt' === $attributes['displayPostContentRadio'] ) {

			$trimmed_excerpt = get_the_excerpt( $post );

			/*
			 * Adds a "Read more" link with screen reader text.
			 * [&hellip;] is the default excerpt ending from wp_trim_excerpt() in Core.
			 */
			if ( str_ends_with( $trimmed_excerpt, ' [&hellip;]' ) ) {
				$excerpt_length = (int) apply_filters( 'excerpt_length', $block_core_latest_posts_excerpt_length );
				if ( $excerpt_length <= $block_core_latest_posts_excerpt_length ) {
					$trimmed_excerpt  = substr( $trimmed_excerpt, 0, -11 );
					$trimmed_excerpt .= sprintf(
						/* translators: 1: A URL to a post, 2: Hidden accessibility text: Post title */
						__( '… <a href="%1$s" rel="noopener noreferrer">Read more<span class="screen-reader-text">: %2$s</span></a>', 'architronix' ),
						esc_url( $post_link ),
						esc_html( $title )
					);
				}
			}

			if ( post_password_required( $post ) ) {
				$trimmed_excerpt = __( 'This content is password protected.', 'architronix' );

			}

			$list_items_markup .= sprintf(
				'<div class="wp-block-latest-posts__post-excerpt">%1$s</div>',
				$trimmed_excerpt
			);
		}

		if ( isset( $attributes['displayPostContent'] ) && $attributes['displayPostContent']
			&& isset( $attributes['displayPostContentRadio'] ) && 'full_post' === $attributes['displayPostContentRadio'] ) {

			$post_content = html_entity_decode( $post->post_content, ENT_QUOTES, get_option( 'blog_charset' ) );

			if ( post_password_required( $post ) ) {
				$trimmed_excerpt = __( 'This content is password protected.', 'architronix' );
			}

			$list_items_markup .= sprintf(
				'<div class="wp-block-latest-posts__post-full-content">%1$s</div>',
				wp_kses_post( $post_content )
			);
		}

		$list_items_markup .= "</div>";
		$list_items_markup .= "</div>";
		
	}
	$list_items_markup .= "</div>";

	// remove_filter( 'excerpt_length', 'block_core_latest_posts_get_excerpt_length', 20 );

	$classes = array( 'wp-block-latest-posts__list' );
	if ( isset( $attributes['postLayout'] ) && 'grid' === $attributes['postLayout'] ) {
		$classes[] = 'is-grid';
	}
	if ( isset( $attributes['columns'] ) && 'grid' === $attributes['postLayout'] ) {
		$classes[] = 'columns-' . $attributes['columns'];
	}
	if ( isset( $attributes['displayPostDate'] ) && $attributes['displayPostDate'] ) {
		$classes[] = 'has-dates';
	}
	if ( isset( $attributes['displayAuthor'] ) && $attributes['displayAuthor'] ) {
		$classes[] = 'has-author';
	}
	if ( isset( $attributes['style']['elements']['link']['color']['text'] ) ) {
		$classes[] = 'has-link-color';
	}

	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => implode( ' ', $classes ) ) );

	return sprintf(
		'<div %1$s>%2$s</div>',
		$wrapper_attributes,
		$list_items_markup
	);
}

/**
 * Registers the `core/latest-posts` block on server.
 */
function architronix_register_block_core_latest_posts() {
	register_block_type_from_metadata(
		ABSPATH .'wp-includes/blocks/latest-posts',
		array(
			'render_callback' => 'architronix_render_block_core_latest_posts',
		)
	);
}
add_action( 'init', 'architronix_register_block_core_latest_posts' );