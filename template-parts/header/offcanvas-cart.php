<?php  if (!function_exists('woocommerce_mini_cart') || !get_theme_mod('enable_header_cart', true)) return; ?>
<!--offcanvasCart ======================-->
<div class="offcanvas offcanvas-end" id="offcanvasCart" data-bs-scroll="false" tabindex="-1">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e('Close', 'architronix') ?>"></button>
    </div>
    <div class="offcanvas-body px-3 px-lg-5">		
        
        <?php woocommerce_mini_cart(); ?>
        
    </div>
</div>
<!--offcanvasCart ======================-->