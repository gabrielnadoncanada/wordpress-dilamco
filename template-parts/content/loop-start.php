<?php 
if( get_theme_mod('blog_style', 'grid') == 'masonary' ): 
    wp_enqueue_script('jquery-masonry');
?>
<div class="row gx-20" data-masonry='{"percentPosition": true }'>
<?php else: ?>
<div class="row gx-20">
<?php endif; ?>
