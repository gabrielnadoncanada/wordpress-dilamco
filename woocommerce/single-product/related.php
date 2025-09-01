<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( $related_products ) : ?>

    <section class="related">

        <?php
        $heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'architronix' ) );

        if ( $heading ) :
            ?>
            <h4><?php echo esc_html( $heading ); ?></h4>
        <?php endif; ?>
        
        <div class="swiper shop-2-swiper">
            <div class="swiper-wrapper">
                <?php foreach ( $related_products as $related_product ) : ?>

                    <?php
                    $post_object = get_post( $related_product->get_id() );

                    setup_postdata( $GLOBALS['post'] =& $post_object );

                    echo '<div class="swiper-slide">';
                    wc_get_template_part( 'content', 'product' );
                    echo '</div>';
                    ?>

                <?php endforeach; ?>
            </div>
        </div>

    </section>
    <?php
endif;

wp_reset_postdata();
