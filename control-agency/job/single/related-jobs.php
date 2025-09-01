<?php
// The Query.
$related_query_args = control_agency_related_query_args();
$related_query_args['meta_query'] = array(
        'relation' => 'OR',
        'application_deadline' => array(
            'key' => 'application_deadline',
            'value' => current_time('Y-m-d'),
            'compare' => '>=',
            'type' => 'DATE'
        ),
    );
    $related_query_args['orderby'] =  ['application_deadline' => 'ASC'];   
$the_query = new WP_Query( $related_query_args );
$GLOBALS['control_agency_counter'] = 0;
global $control_agency_counter;
// The Loop.
if ( $the_query->have_posts() ): 
   $control_agency_counter = 0;
?>
<div class="mt-30 mt-lg-70">
    <?php control_agency_content($other_jobs_title, '<h4 class="mb-30 mb-lg-60">', '</h4>') ?>
    
    <div class="d-flex flex-column gap-30 position-relative">
        <?php 
        while ( $the_query->have_posts() ): $the_query->the_post(); 
            $args['control_agency_counter'] = $control_agency_counter;
           control_agency_render_template('job/loop/content.php', $args); 
           $control_agency_counter++;
         endwhile; 
         ?>
    </div>
</div>

<?php
endif;
// Restore original Post Data.
wp_reset_postdata(); 