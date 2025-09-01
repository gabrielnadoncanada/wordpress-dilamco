<?php 
get_header();

	get_template_part('template-parts/header/banner-single', get_post_type());
    get_template_part('template-parts/content/before-single', get_post_type());
	do_action('architronix_content_before');

	if ( have_posts() ){
		get_template_part('template-parts/content/loop-start-single', get_post_type());

		// Load posts loop.
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content-single', get_post_format() );			
		}

	
		architronix_the_post_navigation('<div class="section-next-prev-post position-relative link-decoration-none py-5 z-1">', '</div>'); 

		
		// If comments are open or there is at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) {
			comments_template();
		}

		get_template_part('template-parts/content/loop-end-single', get_post_type());		
		
	}else{

		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content-none' );

	}

	do_action('architronix_content_after');
	get_template_part('template-parts/content/after-single', get_post_type());

get_footer();