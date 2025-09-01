<div class="offcanvas offcanvas-end architronix-nav architronix-mobile-nav" tabindex="-1" id="architronixNavbar" aria-labelledby="architronixNavbarLabel">
    <div class="offcanvas-header border-bottom border-secondary">
        <div class="offcanvas-title" id="architronixNavbarLabel">
            <div class="logo">
                <?php echo architronix_get_custom_logo(); ?>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e('Close', 'architronix') ?>"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        $navbar_icons = architronix_get_header_elements('navbar_icons', '<div class="navbar-icons mt-30 list-unstyled p-0 m-0 d-flex flex-wrap gap-3">', '</div>');
        wp_nav_menu([
            'container' => false,
            'menu_class' => 'navbar-nav justify-content-end flex-grow-1 align-items-xl-center list-unstyled mobile-nav',
            'theme_location' => 'primary',
            'depth' => 2,
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => 'Architronix\Nav_Walker::fallback',
            'fallback_title'    => esc_attr__('Primary menu', 'architronix'),
            'walker' => new Architronix\Nav_Walker()
        ]);
        ?>
    </div>
</div>