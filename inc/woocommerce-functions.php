<?php
function architronix_woocommerce_config(){
    $args = [
        'shop_column' => 3
    ];
    return apply_filters('architronix_woocommerce_config', $args);
}

function architronix_woocommerce_content($content){
    return Architronix\Woocommerce::render($content, 'architronix_woocommerce_layout_config');
}

function architronix_woocommerce_layout_config(){
    $selectors = [ 
        [
			'selectors' => '.woocommerce-mini-cart',	
            'addClass' => 'list-unstyled ps-0 d-grid gap-4 pt-lg-60 pt-40',		
            'removeClass' => 'cart_list product_list_widget',
		],
        [
			'selectors' => '.woocommerce-mini-cart-item',	
            'addClass' => 'cart-items'		
		],
        [
			'selectors' => '.woocommerce-mini-cart__total',	
            'addClass' => 'd-flex justify-content-between pt-30 mt-auto',
		],
        [
			'selectors' => '.woocommerce-mini-cart__total .woocommerce-Price-amount',	
            'addClass' => 'cart-items-heading',
		],
        [
			'selectors' => '.woocommerce-mini-cart__buttons',	
            'addClass' => 'offcanvas-cart-btn d-flex justify-content-between',
		],
        [
			'selectors' => '.woocommerce-mini-cart__buttons .wc-forward',	
            'addClass' => 'btn btn-md btn-primary',
            'removeClass' => 'button',
		],
        [
			'selectors' => '.woocommerce-mini-cart__buttons .wc-forward.checkout',	
            'addClass' => 'btn-secondary',
            'removeClass' => 'btn-primary',
		],
        // Checkout
        [
			'selectors' => '.checkout_coupon [type="text"]',			
            'addClass' => 'form-control',
		],
        [
			'selectors' => '.checkout_coupon [type="submit"]',			
            'addClass' => 'btn btn-sm btn-primary',
            'removeClass' => 'button',
		],
        [
			'selectors' => '.woocommerce-checkout h3',			
            'tag' => 'h4',
		],
        [
			'selectors' => '#order_review_heading',			
            'addClass' => 'mt-30',
		],
        [
			'selectors' => '#place_order, .return-to-shop .wc-backward',			
            'addClass' => 'btn btn-primary',
            'removeClass' => 'button',
		],
        [
			'selectors' => '.wc_payment_methods',			
            'addClass' => 'bg-light',
            'removeClass' => 'button',
		],
        [
			'selectors' => [
                '.woocommerce-checkout [type="text"]', 
                '.woocommerce-checkout [type="tel"]', 
                '.woocommerce-checkout [type="email"]', 
                '.woocommerce-checkout textarea'
            ],			
            'addClass' => 'form-control',
		],
        [
			'selectors' => '.woocommerce-order h2',			
            'tag' => 'h4',
		],
         // my account
        [
			'selectors' => '.woocommerce-MyAccount-navigation ul',			
            'addClass' => 'nav nav-pills mb-30',
		],
        [
			'selectors' => '.woocommerce-MyAccount-navigation ul li',			
            'addClass' => 'nav-item',
		],
        [
			'selectors' => '.woocommerce-MyAccount-navigation ul li a',			
            'addClass' => 'nav-link',
		],
       
        [
			'selectors' => '.woocommerce-MyAccount-navigation ul .is-active a',			
            'addClass' => 'active',
		],
        [
			'selectors' => [
                '.woocommerce-MyAccount-content [type="text"]', 
                '.woocommerce-MyAccount-content [type="tel"]', 
                '.woocommerce-MyAccount-content [type="email"]', 
                '.woocommerce-MyAccount-content [type="password"]', 
                '.woocommerce-MyAccount-content textarea'
            ],			
            'addClass' => 'form-control',
		],
        [
			'selectors' => '.woocommerce-MyAccount-content [type="submit"]',			
            'addClass' => 'btn btn-primary mt-20',
            'removeClass' => 'button',
		],
        [
			'selectors' => '.woocommerce-MyAccount-content h3',			
            'tag' => 'h4',
            'removeClass' => 'button',
		],
        [
			'selectors' => '.woocommerce-MyAccount-content .woocommerce-Addresses',			
            'addClass' => 'row row-cols-lg-2 g-5',
            'removeClass' => 'u-columns',
		],
        [
			'selectors' => '.woocommerce-MyAccount-content .wc-forward',			
            'addClass' => 'btn btn-sm btn-primary ms-auto',
            'removeClass' => 'button',
		],
        [
			'selectors' => '.woocommerce-MyAccount-content .woocommerce-info',			
            'addClass' => 'd-flex justify-content-lg-between gap-3',
            'removeClass' => 'button',
		],
        [
			'selectors' => '.woocommerce-MyAccount-content .view',			
            'addClass' => 'btn btn-sm btn-primary',
            'removeClass' => 'button',
		],
        // cart
        [
			'selectors' => 'td.product-name a',			
            'addClass' => 'text-decoration-none fw-bold link-hover-animation-1',
		],
        [
			'selectors' => 'td.product-subtotal .amount',			
            'addClass' => 'fw-bold',
		],
        [
			'selectors' => 'td.product-quantity .input-text',			
            'addClass' => 'form-control',
		],
        [
			'selectors' => 'td.actions [type="submit"], .wc-proceed-to-checkout .checkout-button',			
            'addClass' => 'btn btn-primary',
            'removeClass' => 'button',
		],
        [
			'selectors' => 'td.actions [type="text"]',			
            'addClass' => 'form-control',
            'removeClass' => 'input-text',
		], 
        [
			'selectors' => '.coupon',			
            'innertext' => '<div class="input-group">%s</div>',
		],
        [
			'selectors' => '.cart_totals h2',			
            'tag' => 'h4',
            'addClass' => 'mt-30',
		],
        
        // single product     
        [
			'selectors' => 'h1.product_title',			
            'addClass' => 'display-5 lh-1',
		],
        [
			'selectors' => '.product .entry-summary p.price',			
            'addClass' => 'fs-5 fw-bold order-0',
            'removeClass' => 'price',
		],
        [
			'selectors' => '.product .entry-summary .woocommerce-product-rating',			
            'addClass' => 'order-1',
		],
        [
			'selectors' => '.product .entry-summary .star-rating > span',			
            'addClass' => 'text-secondary',
		],
        [
			'selectors' => '.product .entry-summary .product_meta',			
            'addClass' => 'd-grid gap-10',
		],
        [
			'selectors' => '.product .entry-summary .product_meta > span',			
            'addClass' => 'd-flex flex-wrap gap-10',
		],
        [
			'selectors' => '.single_add_to_cart_button',			
            'addClass' => 'btn btn-md btn-primary',
            'removeClass' => 'button',
		],
        [
			'selectors' => 'form.cart .quantity .input-text',			
            'addClass' => 'input-number',
            'removeClass' => 'input-text text qty',
            'setAttribute' => ['type', 'text'],
		],
        [
			'selectors' => '.product .entry-summary select',			
            'addClass' => 'form-control form-control-sm form-select',
		],
        [
			'selectors' => 'form.cart .quantity',			
            'addClass' => 'cart-btn d-flex align-items-center gap-3',
            'innertext' => '<span class="cart-icon dash-icon"><svg width="11" height="4" viewBox="0 0 11 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 3.38V0.619995H10.2V3.38H0Z" fill="black"></path></svg></span><span class="input-values">%s</span><span class="cart-icon plus-icon"><svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.85522 12V7.344H0.199219V4.632H4.85522V0H7.56722V4.632H12.1992V7.344H7.56722V12H4.85522Z"></path></svg></span>',
		],
        [
			'selectors' => 'form.cart',			
            'addClass' => 'd-flex flex-wrap gap-3 py-4 py-lg-40',
		],
        [
			'selectors' => '.related.products',			
            'addClass' => 'section-shop section-shop-swiper pt-60 pt-lg-80 position-relative',
		],
        [
			'selectors' => '.related.products h2',			
            'addClass' => 'fs-4 fw-bold mb-5 lh-1',
		],
        [
			'selectors' => '.woocommerce-Tabs-panel',			
            'removeClass' => 'entry-content',
		],
        [
			'selectors' => '.woocommerce-tabs .wc-tabs li a',			
            'addClass' => 'fs-4 fw-bold mb-0 text-decoration-none',
            'outertext' => '<span class="shop-description-button">%s</span>',
		],
        [
			'selectors' => '.woocommerce-tabs .wc-tabs li',			
            'addClass' => 'nav-item',
		],
        [
			'selectors' => '.woocommerce-tabs h2',			
            'addClass' => 'd-none fs-4 lh-1 mb-4',
		],
        [
			'selectors' => '.woocommerce-tabs .wc-tabs',			
            'addClass' => 'shop-description-tabs nav nav-pills d-flex',
            'removeClass' => 'tabs',
		],
        [
			'selectors' => '.woocommerce-tabs [type="text"], .woocommerce-tabs [type="email"], .woocommerce-tabs textarea',			
            'addClass' => 'form-control',
            'removeClass' => 'tabs',
		],
        [
			'selectors' => '.woocommerce-tabs [type="submit"]',			
            'addClass' => 'btn btn-primary woocommerce-block-theme-has-button-styles',
            'removeAttribute' => 'id',
		],
        [
			'selectors' => '.product .woocommerce-tabs',			
            'addClass' => 'pt-60 pt-lg-100',
		],
        [
			'selectors' => '.woocommerce-product-thumbnail__wrapper',			
            'addClass' => 'mt-20 row row-cols-lg-4 row-cols-3',
		],
        

        // Loop
		[
			'selectors' => 'h1.page-title',
			'addClass' => 'd-none',
		],
		[
			'selectors' => '.add_to_cart_button',
			'addClass' => 'btn btn-sm btn-outline-secondary  gap-10',
			'removeClass' => 'button',
		],
        [
			'selectors' => '.orderby',
			'addClass' => 'form-control form-select',            
		],
        [
			'selectors' => '.products',
			'addClass' => 'row gx-4',
            'removeClass' => ['columns-3'],
            'tag' => 'div'
		],
        [
			'selectors' => '.product .added_to_cart',
			'addClass' => 'text-light',
		],      
		[
			'selectors' => '.products .product',
            'tag' => 'div',
			'addClass' => 'col-md-6 col-lg-4 mb-5 mb-lg-70',
			'removeClass' => ['last', 'first', 'product'],
			'format_product' => '<div class="shop-details product">
                <div class="shop-image-wrapper position-relative">
                    <div class="shop-image">{{product_image}}</div>
                    <div class="shop-image-hover d-flex flex-column gap-2">{{add_to_cart_button}}</div>
                </div>
                <a href="{{product_link}}" class="text-decoration-none">
                    <div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
                        <div class="shopping-item-details">
                            <h5 class="fw-semibold product-title">{{product_title}}</h5>
                            <span class="product-price fs-5">{{product_price}}</span>
                        </div>
                        {{product_rating}}
                    </div>
                </a>
            </div>',
		],
        
		[
			'selectors' => '.swiper-slide .product',
            'tag' => 'div',
			'removeClass' => ['last', 'first', 'product'],
			'format_product' => '<div class="shop-details product">
                <div class="shop-image-wrapper position-relative">
                    <div class="shop-image">{{product_image}}</div>
                    <div class="shop-image-hover d-flex flex-column gap-2">{{add_to_cart_button}}</div>
                </div>
                <a href="{{product_link}}" class="text-decoration-none">
                    <div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
                        <div class="shopping-item-details">
                            <h5 class="fw-semibold product-title">{{product_title}}</h5>
                            <span class="product-price fs-5">{{product_price}}</span>
                        </div>
                        {{product_rating}}
                    </div>
                </a>
            </div>',
		],
	];
	return $selectors;
}

add_action( 'woocommerce_before_shop_loop', 'architronix_before_shop_loop_start', 19 );
add_action( 'woocommerce_before_shop_loop', 'architronix_before_shop_loop_end', 31 );

function architronix_before_shop_loop_start(){
    echo '<div class="d-flex flex-wrap justify-content-lg-between gap-3 align-items-center">';
}

function architronix_before_shop_loop_end(){
    echo '</div>';
}

add_filter('woocommerce_sale_flash', 'architronix_woocommerce_sale_flash');
function architronix_woocommerce_sale_flash(){
    return '<span class="onsale-product z-5 position-absolute top-0 start-0 m-3 text-light bg-primary px-2 py-3 small d-inline-flex align-items-center justify-content-center">' . esc_html__( 'Sale!', 'architronix' ) . '</span>';
}

add_action('woocommerce_single_product_summary', 'architronix_single_product_summary_after_title', 6);
add_action('woocommerce_single_product_summary', 'architronix_single_product_summary_after_price', 11);
function architronix_single_product_summary_after_title(){
    echo '<div class="d-flex flex-nowrap align-items-center justify-content-between">';
}

function architronix_single_product_summary_after_price(){
    echo '</div>';
}