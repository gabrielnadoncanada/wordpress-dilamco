<div class="<?php echo architronix_layout_get() == 'full'? 'col-lg-4' : 'col-lg-6'; ?> mb-5">   
    <div <?php post_class('blog-wrapper h-100 mb-0') ?>> 

        <?php architronix_post_thumbnail('architronix-429x250-cropped', '<div class="blog-image">', '</div>'); ?>

        <div class="blog-details">
            <?php architronix_entry_meta_header('<span class="seperator px-1">/</span>', '<p class="item-blog-metas text-muted">', '</p>'); ?>            
            <?php the_title('<h5 class="blog-title fs-5 fw-semibold pe-3"><a class="link-hover-animation-1 text-decoration-none stretched-link" href="'.get_permalink().'">', '</a></h5>') ?>
            <?php if ( !has_post_thumbnail() ) : ?>
                <?php the_excerpt(); ?>
            <?php endif; ?>
        </div>

    </div>
</div>
