<?php global $architronix, $post; ?>
<?php if (has_post_thumbnail()) : ?>

    <div class="blog-single-image position-relative max-width">

        <?php if (has_post_thumbnail()) : ?>
            <div class="overlay z-n1">
                <picture>
                    <source media="(max-width:530px)" srcset="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'architronix-530x400-cropped')) ?>">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'architronix-banner-single-lg')) ?>" class="w-100 img-banner object-fit-cover" alt="<?php the_title(); ?>">
                </picture>
            </div>
        <?php endif; ?>

        <div class="container position-relative z-1">
            <div class="blog-single-text position-absolute">
                <?php the_title('<h1 class="display-3 fw-extra-bold mb-0">', '</h1>'); ?>
                <?php architronix_entry_meta_header('</span><span>/</span><span class="fw-semibold">', '<div class="contact-lists d-flex flex-wrap gap-10"><span class="fw-semibold">', '</span></div>'); ?>
            </div>
        </div>
    </div>

<?php else : ?>
    <!--Banner Section ======================-->
    <section class="section-banner position-relative pt-60">
        <div class="section-full-width">
            <div class="section-title-wrapper position-relative">
                <?php architronix_content(get_theme_mod('blog_title', esc_attr__('Blog', 'architronix')), '<div class="scroll-move"><span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1 banner-title">', '</span></div>') ?>

                <div class="container">
                    <div class="section-title section-separator banner-subtitle">
                        <?php the_title('<h2 class="fw-extra-bold heading-title separator lh-1">', '</h2>'); ?>
                        <?php architronix_entry_meta_header('</span><span>/</span><span class="fw-semibold">', '<div class="d-flex flex-wrap gap-10"><span class="fw-semibold">', '</span></div>'); ?>
                    </div>
                </div>
            </div>
            <!-- section-title-wrapper -->
        </div>
        <!-- section-full-width -->
    </section>
    <!--Banner Section ======================-->
<?php endif; ?>