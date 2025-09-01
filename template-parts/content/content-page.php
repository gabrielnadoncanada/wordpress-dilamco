<div <?php post_class() ?>>

    <div class="row">
        <div class="col-lg-12">
            <?php if(has_post_thumbnail()): ?>
                    <div class="position-relative">
                            <div class="image-mark"></div>
                            <?php architronix_post_thumbnail(); ?>
                    </div>
            <?php endif; ?>
        </div>

        <div class="<?php echo architronix_layout_get() != 'full'? 'col-lg-12' : 'col-lg-10' ?>">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php
            wp_link_pages(
                array(
                    'before'   => '<nav class="pagination align-items-end position-relative gap-1 " aria-label="' . esc_attr__( 'Page', 'architronix' ) . '">',
                    'after'    => '</nav>'				
                )
            );

            // If comments are open or there is at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
            ?>

        </div>
       
    </div>
</div>
