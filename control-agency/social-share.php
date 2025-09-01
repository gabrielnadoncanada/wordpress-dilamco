
<?php 
architronix_content($social_share_title, '<h6 class="mb-0">', '</h6>');     

if($social_share_icons == 'shortcode'){
        echo do_shortcode($social_share_shortcode);
}else{  
        
        foreach ($icons as $key => $share) {
                printf('<a class="text-decoration-none link-hover-animation-1 text-uppercase fw-semibold %s" href="%s" target="_blank">%s</a>', $share['class'], $share['url'], $share['label']);
        }
}