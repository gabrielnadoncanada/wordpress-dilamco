<div class="swiper-slide">
    <div <?php post_class('blog-wrapper') ?>>
        <?php architronix_post_thumbnail('architronix-429x250-cropped', '<div class="blog-image">', '</div>'); ?>
        <div class="blog-details">
            <?php architronix_entry_meta_header(['separator' => ' / ', 'disable_meta' => ['reading_time'], 'max_link' => -2], '<p class="item-blog-metas text-muted">', '</p>'); ?>
            <?php the_title('<h5 class="blog-title fs-5 fw-semibold pe-3"><a class="link-hover-animation-1 text-decoration-none" href="' . get_permalink() . '">', '</a></h5>') ?>
            <?php if (!has_post_thumbnail()) : ?>
                <?php the_excerpt(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>