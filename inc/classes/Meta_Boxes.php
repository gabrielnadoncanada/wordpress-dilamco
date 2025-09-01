<?php
namespace Architronix;

final class Meta_Boxes{
    /**
	 * Add hooks when module is loaded.
	 */
	public function __construct() {        
        add_filter('rwmb_normalize_field', [$this, 'normalize_field']);  
		add_action( 'rwmb_meta_boxes', [$this, 'meta_boxes'] );    
        add_filter('rwmb_meta_boxes', [$this, 'get_responsive_fields'], 999);    
	}

    public function meta_boxes($meta_boxes){
		
        $meta_boxes[] = include __DIR__ ."/meta-boxes/page-data.php";
        

        return $meta_boxes;
        
    }

    public function normalize_field($field){
		$field['responsive'] = false;
		$field['mode'] = false;
		return $field;
	}

    public function get_responsive_fields( $meta_boxes){
		foreach ($meta_boxes as $key => $meta_box) {
			if(empty($meta_box['fields'])) continue;

			$fields = $meta_box['fields'];
			$meta_box['fields'] = $this->set_responsive_fields($fields);
			$meta_boxes[$key] = $meta_box;
		}
		return $meta_boxes;
	}

	private function set_mode_fields($fields){
		$new_fields = [];
		foreach ($fields as $field) {
			if(isset($field['fields'])){
				$child_fields = $field['fields'];
				$field['fields'] = $this->set_mode_fields($child_fields);
			}
			if(!empty($field['mode']) && !empty($field['id'])){
				$field_id = $field['id'];
				$light_active_class = $dark_active_class = '';
				if(get_theme_mod('enable_dark_mode', false)){
					$dark_active_class = ' active';
				}else{
					$light_active_class = ' active';
				}

				$class = !empty($field['class'])? $field['class'].' meta-field-color-mode meta-field-mode-light' : 'meta-field-color-mode meta-field-mode-light';
				$class_dark = !empty($field['class'])? $field['class'].' meta-field-color-mode meta-field-mode-dark' : 'meta-field-color-mode meta-field-mode-dark';

				
				$new_fields[] = [
					'type' => 'custom_html',
					'class' => 'meta-color-modes-field-wrapper',
					'desc' => '<div class="color-modes">
								<button type="button" class="color-mode-light'.$light_active_class.'" aria-pressed="true" data-mode="light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun-fill" viewBox="0 0 16 16"><path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/></svg></button>
								<button type="button" class="color-mode-dark'.$dark_active_class.'" aria-pressed="false" data-mode="dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill" viewBox="0 0 16 16"><path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278"/><path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/></svg></button>
							</div>'
				];
				unset($field['mode']);
				$new_fields[] = array_merge($field, ['class' => $class.$light_active_class]);				
				$new_fields[] = array_merge($field, ['id' => "{$field_id}_dark", 'class' => $class_dark.$dark_active_class]);
			}else{
				$new_fields[] = $field;
			}
		}
		
		return $new_fields;
	}

	private function set_responsive_fields($fields){
		$new_fields = [];
		foreach ($fields as $field) {
			if(isset($field['fields'])){
				$child_fields = $field['fields'];
				$field['fields'] = $this->set_responsive_fields($child_fields);
			}
			if(!empty($field['responsive']) && !empty($field['id'])){
				$field_id = $field['id'];
				$class = !empty($field['class'])? $field['class'].' meta-field-device meta-field-desktop' : 'meta-field-device meta-field-desktop';
				$class_sm = !empty($field['class'])? $field['class'].' meta-field-device meta-field-tablet' : 'meta-field-device meta-field-tablet';
				$class_xs = !empty($field['class'])? $field['class'].' meta-field-device meta-field-mobile' : 'meta-field-device meta-field-mobile';
				unset($field['responsive']);
				$new_fields[] = [
					'type' => 'custom_html',
					'class' => 'meta-device-field-wrapper',
					'desc' => '<div class="devices">
								<button type="button" class="preview-desktop active" aria-pressed="true" data-device="desktop"><span class="dashicons dashicons-desktop"></span></button>
								<button type="button" class="preview-tablet" aria-pressed="false" data-device="tablet"><span class="dashicons dashicons-tablet"></span></button>
								<button type="button" class="preview-mobile" aria-pressed="false" data-device="mobile"><span class="dashicons dashicons-smartphone"></span></button>
						</div>'
				];
				$new_fields[] = array_merge($field, ['class' => $class]);				
				$new_fields[] = array_merge($field, ['id' => "{$field_id}_sm", 'class' => $class_sm]);
				$new_fields[] = array_merge($field, ['id' => "{$field_id}_xs", 'class' => $class_xs]);
			}else{
				$new_fields[] = $field;
			}
		}
		$new_fields = $this->set_mode_fields($new_fields);
		return $new_fields;
	}


    
}