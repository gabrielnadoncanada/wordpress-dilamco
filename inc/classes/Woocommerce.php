<?php
namespace Architronix;

final class Woocommerce{
    public $data = [];

    public function __construct() {  
        add_action('init', [$this, 'init']);    
        add_filter('loop_shop_columns', [$this, 'loop_shop_columns']);
	}

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
    }

    public function init(){
        
        $args = architronix_woocommerce_config();
        if(!empty($args)){
            $this->data = $args;
        }
    }
    
    public function loop_shop_columns() {
		return $this->data['shop_column'];
	}

    public static function render($content, $callback_function){
        if(!empty($content) && function_exists($callback_function)){
            $selectors = call_user_func($callback_function);
            $parser = new Parser($content);
            $content = $parser->string;
            $content = Helpers::parse_by_selectors($content, $selectors);
        }
        return $content;
    }

}