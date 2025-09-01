<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Architronix
 * @since Architronix 1.0
 */

get_header();


    get_template_part('template-parts/header/banner');
    get_template_part('template-parts/content/before', get_post_type());
    do_action('architronix_content_before');

        if (have_posts()) :

            get_template_part('template-parts/content/loop-start');
            // Load posts loop.
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content/content');
            }
            get_template_part('template-parts/content/loop-end');	

            // Previous/next page navigation.
		architronix_the_posts_navigation('<div class="mt-lg-40 mt-10 text-center">', '</div>');
        else :

            // If no content, include the "No posts found" template.
            get_template_part('template-parts/content/content-none');

        endif;
       

    do_action('architronix_content_after');
    get_template_part('template-parts/content/after', get_post_type());

get_footer();
