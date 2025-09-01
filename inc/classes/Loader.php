<?php
namespace Architronix;

final class Loader{

    public function __construct() {
       $this->init();
	}
    
    
    private function init(){
        
        new Meta_Boxes();
        new Google_Fonts();        
        new Typography();
        new Design_Options();
        new Custom_Colors();
        new Header();        
        new Footer();             
               
        new Customize();  
        new Woocommerce();      

        new Template();
        new Layout();
        
    }

}