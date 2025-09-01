
<div class="blog-inner">
    <div class="entry-content">
    <?php 
    the_content();
    ?>
    </div>
    <?php
    wp_link_pages(
        array(
            'before'   => '<nav class="pagination my-5 align-items-end position-relative gap-1 " aria-label="' . esc_attr__( 'Page', 'architronix' ) . '">',
            'after'    => '</nav>'				
        )
    );
    ?>
    <?php  echo architronix_post_tags(); ?> 
    <?php do_action('control_agency_social_share', '<div class="box-share-post d-flex gap-30 align-items-center mt-30">', '</div>'); ?>
</div>



      

