<?php
$args = [
    'taxonomy' => 'space_cat',
    'wrapper_class' => 'portfolio-wrapper position-relative',
    'wrapper_tag' => 'div',
    'disable_links' => true,
    'slice' => 0,
    'slice_count' => 1,
];
control_agency_get_terms($args);
?>

<div class="portfolio-wrapper position-relative">
    <div class="portfolio-image overlay">
        <?php
        if (has_post_thumbnail()) :
        ?>
            <img class="object-fit-cover" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')); ?>" width="416" height="338">
        <?php
        endif;
        ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="stretched-link portfolio-title position-absolute">
        <?php the_title('<h4 class="mb-0">', '</h4>'); ?>
    </a>

</div>
