<?php
/**
 * Displays the sidebar widget area.
 */

if (!architronix_layout_get('sidebar')) return; 
?>

<aside class="mt-lg-0 mt-60 d-flex flex-column gap-5 gap-lg-70 sticky-elements">
	<?php echo architronix_layout_get('sidebar_content'); ?>
</aside><!-- .widget-area -->