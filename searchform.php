<?php
$architronix_unique_id = wp_unique_id('search-form-');
$architronix_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
$classes = 'sidebar__single sidebar__single--searchsingle col-lg-9 mx-auto';
$classes = (is_search())? 'search-page__search-form':$classes;
?>

<div class="">
    <div class="sidebar__single__inner">
        <form class="sidebar__search position-relative" role="search" <?php echo architronix_return_data($architronix_aria_label); ?> method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class="screen-reader-text" for="<?php echo esc_attr($architronix_unique_id); ?>"><?php _e('Search&hellip;', 'architronix'); ?></label>

            <input type="text" class="form-control" placeholder="Type & Hit Enter" id="<?php echo esc_attr($architronix_unique_id); ?>" value="<?php echo get_search_query(); ?>" name="s">
        </form>
    </div>
</div>
