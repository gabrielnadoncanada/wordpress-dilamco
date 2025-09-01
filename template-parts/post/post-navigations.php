<?php
/**
 * The template for Previous/next post navigation.
 *
 * @package WordPress
 * @subpackage Architronix
 * @since Architronix 1.0
 */

$icon_next = is_rtl() ? architronix_get_icon_svg( 'ui', 'prev', 35 ) : architronix_get_icon_svg( 'ui', 'next', 35 );
$icon_prev = is_rtl() ? architronix_get_icon_svg( 'ui', 'next', 35 ) : architronix_get_icon_svg( 'ui', 'prev', 35 );

$label_prev = get_theme_mod('prev_link_text', esc_html__( 'Prev post', 'architronix' )); 
$label_next = get_theme_mod('next_link_text', esc_html__( 'Next post', 'architronix' ));

the_post_navigation(
    array(
        'next_text' => sprintf('<span class="screen-reader-text">%2$s</span><div class="d-flex gap-20 align-items-center overflow-hidden justify-content-end text-end">%3$s%1$s</div>', $icon_next, $label_next, '<h5 class="mb-0 fw-semibold post-title"><span class="link-hover-animation-1">%title</span></h5>'),
        'prev_text' => sprintf('<span class="screen-reader-text">%2$s</span><div class="d-flex gap-20 align-items-center overflow-hidden">%1$s%3$s</div>', $icon_prev, $label_prev, '<h5 class="mb-0 fw-semibold post-title"><span class="link-hover-animation-1">%title</span></h5>'),
    )
);