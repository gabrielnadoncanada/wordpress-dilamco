<?php
namespace Architronix;

final class Helpers{

    public $config;
    public $meta;
    
    public function __construct() {        
		add_action( 'wp_head', [$this, 'set_config'], 1 );       
	}

    public function get_page_meta(){
        $args = [];
        $defaults = $this->get_page_meta_std();
       
        
        
        foreach ($defaults as $meta_key => $value) {
            if( empty(get_post_meta(architronix_get_the_ID(), $meta_key)) ) continue;
            $args[$meta_key] = get_post_meta(architronix_get_the_ID(), $meta_key, true);
        }
        
        $this->meta = wp_parse_args($args, $defaults);
    }

    private function get_page_meta_std(){
        $meta_boxes = include __DIR__ ."/meta-boxes/page-attributes.php";
        $attributes = array_column($meta_boxes['fields'], 'std', 'id' );
        $meta_boxes = include __DIR__ ."/meta-boxes/page-data.php";
        $data = array_column($meta_boxes['fields'], 'std', 'id' );

        return array_merge($attributes, $data);
    }

    public function set_config(){        
        $this->config = get_theme_mods();
        $this->get_page_meta();        
    }

    public static function parse_by_selectors($content, $parser_selectors){
       
        foreach ($parser_selectors as $selector) {
            if(empty($selector['selectors'])) continue;
            $selectors = $selector['selectors'];
            unset($selector['selectors']);

            $selectors = is_array($selectors)? implode(',', $selectors) : $selectors;

            if(!isset($content->find) && empty($content->find($selectors))) continue;

            $selector = wp_parse_args($selector, [
                'addClass' => '',
                'removeAttribute' => '',
            ]);

            foreach ($content->find($selectors) as $node) {
                if(!empty($selector['addClass'])){
                    $node->addClass($selector['addClass']);
                }

                if(!empty($selector['removeClass'])){
                    if(is_array($selector['removeClass'])){
                        foreach ($selector['removeClass'] as $class) {
                            $node->removeClass($class);
                        }
                    }else{
                        $node->removeClass($selector['removeClass']);
                    }
                    
                }

                if(!empty($selector['removeAttribute'])){
                    $node->removeAttribute($selector['removeAttribute']);
                }

                

                if(!empty($selector['format_product'])){
                    $output = $selector['format_product'];
                    $product_image = $add_to_cart_button = $product_title = $product_price = $product_rating = $onsale = '';
                    if(!empty($node->find('img.attachment-woocommerce_thumbnail', 0)->outertext)){
                        $product_image  = $node->find('img.attachment-woocommerce_thumbnail', 0)->outertext;
                        if(!empty($node->find('span.onsale-product', 0)->outertext)){
                            $onsale  = $node->find('span.onsale-product', 0)->outertext;  
                                                 
                        } 
                    }elseif(!empty($node->find('img', 0)->outertext)){
                        $product_image  = $node->find('img', 0)->outertext;
                    }

                    if(!empty($node->find('.add_to_cart_button', 0)->outertext)){
                        $cart_icon = '<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_381_163)"><path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z"></path></g><defs><clipPath id="clip0_381_163"><rect width="24" height="24" transform="translate(0 0.5)"></rect></clipPath></defs></svg>' ; 
                        $node->find('.add_to_cart_button', 0)->innertext = $node->find('.add_to_cart_button', 0)->innertext . $cart_icon;
                        $add_to_cart_button  = $node->find('.add_to_cart_button', 0)->outertext;                                                                           
                    }
                    
                    if(!empty($node->find('.woocommerce-loop-product__title', 0)->innertext)){
                        $product_title  = $node->find('.woocommerce-loop-product__title', 0)->innertext;                       
                    }elseif(!empty($node->find('.woocommerce-loop-category__title', 0)->innertext)){
                        $product_title  = $node->find('.woocommerce-loop-category__title', 0)->innertext;
                    }

                    $product_link = '';
                    if(!empty($node->find('.woocommerce-loop-product__link', 0)->href)){
                        $product_link  = $node->find('.woocommerce-loop-product__link', 0)->href;                       
                    }elseif(!empty($node->find('a', 0)->href)){
                        $product_link  = $node->find('a', 0)->href;    
                    }

                    if(!empty($node->find('.price', 0)->innertext)){
                        $product_price  = $node->find('.price', 0)->innertext;                        
                    }

                    if(!empty($node->find('.star-rating > span', 0)->style)){
                        $product_rating  = '<div class="star-rating-wrap pt-1">
                        <span class="star-rating">										
                            <span class="star-fill" style="'.$node->find('.star-rating > span', 0)->style.'"></span>
                        </span>
                    </div>';                        
                    }
                    
                    $output = str_replace('{{product_image}}', $product_image.$onsale, $output);
                    $output = str_replace('{{add_to_cart_button}}', $add_to_cart_button, $output);
                    $output = str_replace('{{product_title}}', $product_title, $output);
                    $output = str_replace('{{product_link}}', $product_link, $output);
                    $output = str_replace('{{product_price}}', $product_price, $output);
                    $output = str_replace('{{product_rating}}', $product_rating, $output);

                    $node->innertext = $output;
                    
                }

                if(!empty($selector['innertext'])){
                    $node->innertext = sprintf($selector['innertext'], $node->innertext);
                }

                if(!empty($selector['outertext'])){
                    $node->outertext = sprintf($selector['outertext'], $node->outertext);
                }

                if(!empty($selector['tag'])){
                    $node->tag = $selector['tag'];
                }

                if(!empty($selector['setAttribute'])){
                    $node->setAttribute($selector['setAttribute'][0], $selector['setAttribute'][1]);
                }

            }

        }
       

        return $content;
    }

    
}