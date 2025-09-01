<?php 
get_header();

	// get_template_part('template-parts/header/banner', get_post_type());
    // get_template_part('template-parts/content/before', get_post_type());
	do_action('architronix_content_before');

	get_template_part( 'template-parts/content/content-404' );

	do_action('architronix_content_after');
	get_template_part('template-parts/content/after', get_post_type());

get_footer();
