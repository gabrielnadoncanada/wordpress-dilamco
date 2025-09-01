<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Architronix
 * @since Architronix 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$architronix_comment_count = get_comments_number();
?>

<div id="comments" class="section-comment-inner comments-area <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">
	<div class="pt-lg-70 pt-30">
	<?php
	if ( have_comments() ) :
		?>
		<h4 class="display-5 mb-4 mb-lg-30">
			<?php if ( '1' === $architronix_comment_count ) : ?>
				<?php printf(esc_html__( '1 comment on "%s"', 'architronix' ), get_the_title()); ?>
			<?php else : ?>
				<?php
					printf(
						/* translators: %s: Comment count number. */
						esc_html( _nx( 'Comments (%s)', 'Comments (%s)', $architronix_comment_count, 'Comments title', 'architronix' ) ),
						esc_html( number_format_i18n( $architronix_comment_count ) )
					);
				?>

			<?php endif; ?>
		</h4><!-- .comments-title -->

		<ol class="comment-list list-unstyled overflow-hidden">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 80,
					'style'       => 'ol',
					'short_ping'  => true,
					'max_depth' => 3,
					'walker' => new Architronix\Comment_Walker()
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		$icon_next = is_rtl() ? architronix_get_icon_svg( 'ui', 'prev', 35 ) : architronix_get_icon_svg( 'ui', 'next', 35 );
		$icon_prev = is_rtl() ? architronix_get_icon_svg( 'ui', 'next', 35 ) : architronix_get_icon_svg( 'ui', 'prev', 35 );
		$label_prev = get_theme_mod('prev_link_text', esc_html__( 'Older comments', 'architronix' )); 
		$label_next = get_theme_mod('next_link_text', esc_html__( 'Newer comments', 'architronix' ));
		the_comments_navigation(
			array(		
				'class' => 'mb-60',		
				'next_text' => sprintf('<div class="d-flex gap-20 align-items-center justify-content-end text-end">%2$s%1$s</div>', $icon_next, '<h5 class="mb-0 fw-semibold post-title"><span class="link-hover-animation-1">'.$label_next.'</span></h5>'),
        		'prev_text' => sprintf('<div class="d-flex gap-20 align-items-center">%1$s%2$s</div>', $icon_prev, '<h5 class="mb-0 fw-semibold post-title"><span class="link-hover-animation-1">'.$label_prev.'</span></h5>'),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments text-opacity"><?php esc_html_e( 'Comments are closed.', 'architronix' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	
	<?php
	$req   = get_option( 'require_name_email' );
	$html5 = false;

	// Define attributes in HTML5 or XHTML syntax.
	$required_attribute = ( $html5 ? ' required' : ' required="required"' );
	$checked_attribute  = ( $html5 ? ' checked' : ' checked="checked"' );

	// Identify required fields visually and create a message about the indicator.
	$required_indicator = ' ' . wp_required_field_indicator();
	$required_text      = ' ' . wp_required_field_message();
	comment_form(
		array(
			'format' => $html5,
			'title_reply'        => esc_attr__( 'Leave a comment', 'architronix' ),
			'title_reply_before' => '<h4 id="reply-title" class="display-5 mb-4 mb-lg-30">',
			'title_reply_after'  => '</h4>',
			'class_container'    => 'comment-respond',
			'class_form' => 'row',
			'fields'             => [
				'author' => sprintf(
					'<div class="col-md-6"><p class="comment-form-author">%s</p></div>',
					sprintf(
						'<input id="author" class="form-control" name="author" placeholder="%s" type="text" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
						esc_attr__('Your name*', 'architronix'),
						esc_attr( $commenter['comment_author'] ),
						( $req ? $required_attribute : '' )
					)
				),
				'email' => sprintf(
					'<div class="col-md-6"><p class="comment-form-email">%s</p></div>',
					sprintf(
						'<input id="email" class="form-control" placeholder="%s" name="email" type="email" value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
						esc_attr__('Your email*', 'architronix'),
						esc_attr( $commenter['comment_author_email'] ),
						( $req ? $required_attribute : '' )
					)
				),
			],
			'comment_field' => sprintf(
				'<p class="col-12 comment-form-comment">%s %s</p>',
				'',
				sprintf(
					'<textarea id="comment" class="form-control" name="comment" cols="45" rows="5" placeholder="%s" maxlength="65525"%s></textarea>',
					esc_attr__('Write your comment*', 'architronix'),
					$required_attribute
				)
			),          
			'submit_field'       => '<p class="col-12 form-group form-submit mb-0">%1$s %2$s</p>',
			'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-primary gap-10 %3$s">%4$s'.architronix_get_icon_svg( 'ui', 'next', 35 ).'</button>'
		)
	);

	?>
	</div>
</div><!-- #comments -->