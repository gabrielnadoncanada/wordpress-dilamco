<?php
if(empty(architronix_layout_get('display_topbar'))) return;
$topbar_items_left = architronix_get_header_elements('topbar_items_left');
$topbar_items_right = architronix_get_header_elements('topbar_items_right');
if(empty($topbar_items_left) && empty($topbar_items_right)) return;
?>
<div <?php architronix_topbar_class('d-none d-xl-block nav-border');  ?>>
    <div class="container-fluid max-width gx-lg-100">
        <div class="top-bar d-flex justify-content-between align-items-center"> 
            <?php echo architronix_content($topbar_items_left, '<div class="elements-header top-bar-contact d-flex align-items-center">', '</div>'); ?>     
            <?php echo architronix_content($topbar_items_right, '<div class="elements-header top-bar-contact d-flex align-items-center">', '</div>'); ?>         
        </div>
    </div>
</div> 