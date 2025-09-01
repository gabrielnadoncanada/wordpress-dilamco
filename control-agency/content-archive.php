<?php
do_action('control_agency_content_before');

if ( have_posts() ):
        
    do_action('control_agency_archive_loop_start');	
    // Load posts loop.
    while ( have_posts() ) {
        the_post();
        do_action('control_agency_archive_loop_content');
    }	
    
    do_action('control_agency_archive_loop_end');

else:

    // If no content, include the "No posts found" template.
    do_action('control_agency_loop_no_posts');

endif;

do_action('control_agency_content_after');