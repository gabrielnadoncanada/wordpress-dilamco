<?php 
$count_posts = wp_count_posts('controlservice');
if(!empty($count_posts->publish) && ($count_posts->publish > 1)):
?>
<div class="widget">
    <?php control_agency_content($sidebar_title, '<h5 class="fs-4 mb-30 mb-lg-40 lh-1">', '</h5>') ?>
    <ul class="category-lists list-unstyled mb-0 d-flex flex-column gap-20">
        <?php 
    
      
        $services = get_posts([
            'numberposts' => -1,
            'post_type'   => 'controlservice',
            'orderby' => 'menu_order',
        ]);
        $active_post_id = get_the_ID();
        $svg = '<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path></svg>';
        foreach ( $services as $service ) {
            printf('<li class="d-flex align-items-center gap-4">%3$s<a href="%2$s" class="%4$s">%1$s</a></li>', 
                get_the_title($service), 
                get_permalink($service), 
                $svg, 
                ($active_post_id == $service->ID)? 'text-decoration-none link-hover-animation-1 active': 'text-decoration-none link-hover-animation-1'
            );
        }
        ?>
     							
    </ul>
</div>
<?php endif; ?>

<div class="widget mt-20">
    <div class="buttons d-grid gap-20">
        <?php control_agency_render_block('button', $buttons); ?>
    </div>										
</div>