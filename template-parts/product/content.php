<?php
global $product;
 // Check if WooCommerce is active
    $product_cart = wc_get_product(get_the_ID());
    ob_start();
?>
<div class="swiper-slide">
    <?php 
    
    wc_get_template('content-product.php'); 
    
    ?>
</div>
<?php 
$product = ob_get_clean();
echo architronix_woocommerce_content($product);
?>