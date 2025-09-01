
<?php 
$members = get_post_meta(get_the_ID(), 'members');
if(!empty($members)){
    control_agency_render_template('global/section-title-1.php', $args); 
}

?>
<div class="container">
    <?php if(!empty($members)):  ?>
    <div class="section-padding-xxl">
        <div class="row align-items-lg-center gx-30 gx-md-40 gy-5 gy-lg-90">
            <?php                 
                 $project_args = array(
                     'post_type' => 'controlmember',
                     'posts_per_page' => count($members),
                     'post__in' => $members
                 );
                 $the_query = new WP_Query($project_args);

                // The Loop.
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                    <div class="col-md-6">
                        <div class="author-wrapper d-flex flex-column flex-lg-row align-items-lg-center">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="author-image">
                                    <div class="overflow-hidden">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="wow slideInLeft object-fit-cover" width="250" height="320" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')); ?>" alt="<?php the_title_attribute(); ?>">
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                            control_agency_render_template('global/simple-group.php', [                        
                                'title' => get_the_title(),
                                'subtitle' => get_post_meta(get_the_ID(), 'designation', true),
                                'desc' => get_the_excerpt(),
                                
                                'format_title' => '<h5>%s</h5>',
                                'format_subtitle' => '<span class="fw-bold">%s</span>',
                                'format_desc' => '<p class="mb-0 author-descriptions">%s</p>'
                            ]);
                            ?>
                        </div>
                    </div>
            <?php
                    endwhile;
                    wp_reset_postdata(); // Reset the query data
                else :
                    echo '<p>' . esc_html__('No team members found.', 'architronix') . '</p>';
                endif;
            ?>
        </div>
    </div>
    <?php endif; ?>
    <?php
    if(!empty($enable_credits)){        
        control_agency_render_template('global/simple-group.php', [                        
            'title' => $credits_title,
            'group' => $credits,
            'format_title' => '<div class="row pb-lg-60 pb-30"><div class="col-lg-8"><div class="section-title section-separator"><h2 class="fw-extra-bold heading-title lh-1">%s</h2></div></div></div>',  
            'format_group_image' => '<div class="cridit-image"><img src="%s" class="img-fluid" alt="%s"></div>',
            'format_group_title' => '<h4 class="mt-4 mt-lg-30">%s</h4>',
            'format_group_desc' => '<p class="mb-0 pt-1">%s</p>',
            'format_group_item' => '<div class="credits-wrapper">%s</div>',         
            'format_group' => '<div class="d-flex gap-4">%s</div>',           
            'format_wrapper' => '<div class="pb-lg-120 pb-60">%s</div>',   
            'item_image_size' => 'architronix-530x400-cropped', 
            'item_link_format' => '<a href="%s">%s</a>',       
        ]);
    }

    ?>
</div>



                
                        