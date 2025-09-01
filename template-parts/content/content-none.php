<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * */

?>
<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * */

?>
<section id="page-404" class="division mb-100">
	<div class="container">
		<div class="row justify-content-start">
			<!-- 404 PAGE TEXT -->
			<div class="col-md-9 col-lg-8">
				<div class="page-none-txt text-center pb-50">
					<?php if (is_home() && current_user_can('publish_posts')) : ?>

						<?php
						printf(
							'<p>' . wp_kses(
								/* translators: %s: Link to WP admin new post page. */
								__('Ready to publish your first post? <a href="%s">Get started here</a>.', 'architronix'),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							) . '</p>',
							esc_url(admin_url('post-new.php'))
						);
						?>

					<?php elseif (is_search()) : ?>

						<p class="fs-6 fw-semibold mb-5 text-start"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'architronix'); ?></p>
						<?php get_search_form(); ?>

					<?php else : ?>


						<?php //get_search_form(); 
						?>

					<?php endif; ?>
				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</section><!-- .no-results -->



<!-- .no-results -->
