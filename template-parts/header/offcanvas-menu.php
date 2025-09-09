<div class="offcanvas offcanvas-end architronix-nav architronix-mobile-nav" tabindex="-1" id="architronixNavbar" aria-labelledby="architronixNavbarLabel" data-bs-scroll="false">

    <div class="offcanvas-body">
        <?php
     
        
        // Primary Navigation Menu
        wp_nav_menu([
            'container' => false,
            'menu_class' => 'navbar-nav  flex-grow-1 align-items-xl-center list-unstyled mobile-nav',
            'theme_location' => 'primary',
            'depth' => 2,
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => 'Architronix\Nav_Walker::fallback',
            'fallback_title'    => esc_attr__('Primary menu', 'architronix'),
            'walker' => new Architronix\Nav_Walker()
        ]);
        
        // Mobile items - Bottom
        $mobile_items_bottom = architronix_get_header_elements('mobile_items_bottom', '<div class="mobile-items-bottom mt-3 d-flex flex-wrap gap-2 justify-content-center">', '</div>');
        echo $mobile_items_bottom;
        ?>
    </div>
</div>