<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<ul class="video-contents-list list-unstyled d-flex flex-column gap-3 mb-0<?php echo esc_attr($additional_class); ?>">
    <li class="d-flex align-items-center">
        <svg class="rtl-rotate" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
        </svg><?php if( !empty( $title )): architronix_content($title,'<span>','</span>' ); endif; ?>									
</ul>