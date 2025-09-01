<?php
namespace Architronix;

class Comment_Walker extends \Walker_Comment {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 2.7.0
	 *
	 * @see Walker::start_lvl()
	 * @global int $comment_depth
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth  Optional. Depth of the current comment. Default 0.
	 * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;

		switch ( $args['style'] ) {
			case 'div':
				break;
			case 'ol':
				$output .= '<ol class="children list-unstyled overflow-hidden ms-100">' . "\n";
				break;
			case 'ul':
			default:
				$output .= '<ul class="children list-unstyled overflow-hidden ms-100">' . "\n";
				break;
		}
	}

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {

		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		$commenter          = wp_get_current_commenter();
		$show_pending_links = ! empty( $commenter['comment_author'] );

		if ( $commenter['comment_author_email'] ) {
			$moderation_note = esc_attr__( 'Your comment is awaiting moderation.', 'architronix' );
		} else {
			$moderation_note = esc_attr__( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'architronix' );
		}
		?>
		<<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>

			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body d-flex align-items-start gap-20 mb-20" data-id="<?php comment_ID(); ?>">
				<div class="comment-author vcard d-inline-flex flex-shrink-0">
					<?php
					if ( 0 != $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'], NULL, NULL, ['class' => 'my-0 '] );
					}
					?>						
				</div><!-- .comment-author -->
				<div class="flex-grow-1">
					<footer class="comment-meta d-flex align-items-start gap-10 mb-10">
						<div class="comment-metadata d-grid gap-1">
							<?php
							$comment_author = get_comment_author_link( $comment );
							if ( '0' == $comment->comment_approved && ! $show_pending_links ) {
								$comment_author = get_comment_author( $comment );
							}
							printf(
								/* translators: %s: Comment author link. */
								'<span class="author-name fs-5 text-decoration-none">%s </span>',
								sprintf( '<b class="fn">%s</b>', $comment_author )
							);
							?>
						</div><!-- .comment-metadata -->
					</footer><!-- .comment-meta -->

					<div class="comment-content entry-content">
						<?php if ( '0' == $comment->comment_approved ) : ?>
							<em class="review-awaiting-moderation comment-awaiting-moderation text-opacity"><?php echo wp_kses_post($moderation_note); ?></em>
						<?php endif; ?> 
						<?php comment_text(); ?>     
						<div class="ms-lg-auto d-flex gap-20">
							<?php                  
							$edit_text = esc_attr__( 'Edit', 'architronix' );
							if( current_user_can( 'edit_comment', $comment->comment_ID ) ) {
								edit_comment_link( $edit_text, ' <span class="edit-link text-opacity ">', '</span>' );
							} 
							if( ! function_exists( 'edit_comment_link' ) ) {
								function edit_comment_link( $text = null, $before = '', $after = '' ) {
									$comment = get_comment();					
									if( ! current_user_can( 'edit_comment', $comment->comment_ID ) ) {
										return;
									}
									if( null === $text ) {
										$text = esc_attr__( 'Edit','architronix' );
									}				
									$link = '<h6><a class="comment-edit-link text-decoration-none" href="' . esc_url( get_edit_comment_link( $comment ) ) . '">' . $text . '</a></h6>';							
									echo esc_attr( $before . apply_filters( 'edit_comment_link', $link, $comment->comment_ID, $text ), 'architronix' ) . $after;
								}
							}

							if( '1' == $comment->comment_approved || $show_pending_links ) {
								comment_reply_link(
									array_merge(
										$args,
										array(
											'add_below' => 'div-comment',
											'depth'     => $depth,
											'max_depth' => $args['max_depth'],
											'before'    => '<div class="reply"><h6>',
											'after'     => '</h6></div>',
										)
									)
								);
							}
							?>
						</div>
					</div><!-- .comment-content -->
				</div>
			</article><!-- .comment-body -->
		<?php	
	}
}