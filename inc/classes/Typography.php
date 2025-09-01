<?php
namespace Architronix;

final class Typography{

	public $data = [];
	
    public function __construct() {
		add_action( 'rwmb_meta_boxes', [$this, 'meta_boxes'] );
		add_action('init', [$this, 'init']);       
		add_filter('tiny_mce_before_init',[$this, 'dynamic_css_filter'], 999);		
	}

	public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
    }

	public function meta_boxes($meta_boxes){
        $meta_boxes[] = include __DIR__ ."/customizer/design/google-fonts.php";
       $meta_boxes[] = $meta_boxes[] = $this->typography_settings();

        return $meta_boxes;        
    }
	

	public function init(){
		wp_register_style('architronix-google-fonts', Google_Fonts::get_google_fonts_url(), [], ARCHITRONIX_VERSION);
		global $architronix_font_families;
		if(!empty($architronix_font_families) && is_array($architronix_font_families)){
			$styles = [];
			
			$default_fonts = architronix_theme_default_fonts();
			foreach ($architronix_font_families as $field_id => $font) {
				if(!array_key_exists($field_id, $default_fonts)) continue;
				if(empty($font) || empty($default_fonts[$field_id]['css_var'])) continue;
				$css_var = $default_fonts[$field_id]['css_var'];
				$styles[] = "{$css_var}:{$font} !important;";
			}
			$GLOBALS['architronix_font_vars'] = $styles;
		}
	}

	private function typography_settings(){
		$typography = include __DIR__ ."/customizer/design/typography.php";
		$fields = [];
		$tabs = [];
		foreach ($typography as $field) {
			if(empty($field['id']) || empty($field['selectors'])) continue;
			$tabs['tab-'.$field['id']] = !empty($field['label'])? $field['label'] : 'Untitled';
			$field['tab'] = 'tab-'.$field['id'];
			$fields[] = Typography::field($field);
		}
		return [
			'title'           => esc_attr__( 'Typography', 'architronix' ),
			'id'              => 'typography_settings',
			'panel'          => 'design_panel',
			'priority'      => 31, 
			'tab_style'      => 'box', 
			'tabs'          => $tabs,
			'fields'          => $fields
		];
	}

	public static function typography_field_default(){
		return [
			'id' => '',    
			'label' => '',    
			'selectors' => '',    
			'font_family' => '',
			'font_weight' => '',
			'font_style' => '',
			'font_variant' => '',
			'text_align' => '',
			'font_size' => '',
			'line_height' => '',
			'text_transform' => '',
			'letter_spacing' => '',
			'word_spacing' => '',
			'color' => '',
			'tab' => '',
			'important' => false,
			'mode' => false,
			'unit' => false,
			'spacer' => false,
			'excludes' => [],
			'includes' => [],
			'css_vars' => [],
		];
	}

	public static function group_fields(){
		return [
			[                    
				'type'        => 'color',
				'id'          => 'color',
			],
			[                    
				'name'          => '',
				'placeholder' 	=> esc_attr__('Font family', 'architronix'),
				'type'        => 'select',
				'id'          => 'font_family',
				'options' => self::font_family_options(),                   
			], 
			[                    
				'name'         => esc_attr__('Font size', 'architronix'),
				'placeholder' => esc_attr__('Font size', 'architronix'),
				'type'        => 'text',
				'id'          => 'font_size',   
				'placeholder' => 'e.g. 16px',
				'responsive'  => true,
				'unit'  => true,
			],   
			[                    
				'name'         => esc_attr__('Line height', 'architronix'),
				'placeholder' => esc_attr__('Line height', 'architronix'),
				'type'        => 'number',
				'id'          => 'line_height',  
				'min'          => 1,  
				'step'          => 0.1,  
				'responsive'  => false  
			],
			[                    
				'name'         => esc_attr__('Letter Spacing', 'architronix'),
				'placeholder' => esc_attr__('Letter Spacing', 'architronix'),
				'type'        => 'text',
				'id'          => 'letter_spacing',  
				'responsive'  => false  
			],
			[                    
				'name'         => esc_attr__('Word Spacing', 'architronix'),
				'placeholder' => esc_attr__('Word Spacing', 'architronix'),
				'type'        => 'text',
				'id'          => 'word_spacing',  
				'responsive'  => false  
			],
			[                    
				'name'         => esc_attr__('Font Weight', 'architronix'),
				'placeholder' => esc_attr__('Font Weight', 'architronix'),
				'type'        => 'select',
				'id'          => 'font_weight',  
				'options'  => [
					'normal'    => 'Normal',
					'bold'      => 'Bold',
					'bolder'    => 'Bolder',
					'lighter'   => 'Lighter',
					'100'       => '100',
					'200'       => '200',
					'300'       => '300',
					'400'       => '400',
					'500'       => '500',
					'600'       => '600',
					'700'       => '700',
					'800'       => '800',
					'900'       => '900',
					'inherit'   => 'Inherit'
				]
			],
			[                    
				'name'         => esc_attr__('Font Style', 'architronix'),
				'placeholder' => esc_attr__('Font Style', 'architronix'),
				'type'        => 'select',
				'id'          => 'font_style',  
				'options'  => [
					'normal'  => 'Normal',
					'italic'  => 'Italic',
					'oblique' => 'Oblique',
					'inherit' => 'Inherit'
				]
			],
			[                    
				'name'         => esc_attr__('Font Variant', 'architronix'),
				'placeholder' => esc_attr__('Font Variant', 'architronix'),
				'type'        => 'select',
				'id'          => 'font_variant',  
				'options'  => [
					'normal'      => 'Normal',
					'small-caps'  => 'Small Caps',
					'inherit'     => 'Inherit'
				]
			],
			[                    
				'name'         => esc_attr__('Text Decoration', 'architronix'),
				'placeholder' => esc_attr__('Text Decoration', 'architronix'),
				'type'        => 'select',
				'id'          => 'text_decoration',  
				'options'  => [						
					'blink'         => 'Blink',
					'inherit'       => 'Inherit',
					'line-through'  => 'Line Through',
					'none'          => 'None',
					'overline'      => 'Overline',
					'underline'     => 'Underline'
				]
			], 
			[                    
				'name'         => esc_attr__('Text Transform', 'architronix'),
				'placeholder' => esc_attr__('Text Transform', 'architronix'),
				'type'        => 'select',
				'id'          => 'text_transform',  
				'options'  => [						
					'capitalize'  => 'Capitalize',						
					'lowercase'   => 'Lowercase',
					'uppercase'   => 'Uppercase',
					'inherit'     => 'Inherit',
				]
			], 
			[                    
				'name'         => esc_attr__('Text Align', 'architronix'),
				'placeholder' => esc_attr__('Text Align', 'architronix'),
				'type'        => 'select',
				'id'          => 'text_align',  
				'options'  => [						
					'start'  => 'Start',						
					'end'   => 'End',
					'center'   => 'Center',
					'inherit'     => 'Inherit',
				]
			],
			  
		];
	}

	public static function field($args = []){
		
        $args = wp_parse_args($args, self::typography_field_default());
		extract($args);

		$fields = self::group_fields();
		if(!empty($excludes)){
			if(is_string($excludes)){
				$excludes = explode(',', $excludes);
			}
			foreach ($fields as $key => $field) {
				if(empty($field['id'])) continue;
				if(in_array($field['id'], $excludes)){
					unset($fields[$key]);
				}
			}
		}

		if(!empty($includes)){
			if(is_string($includes)){
				$includes = explode(',', $includes);
			}
			foreach ($fields as $key => $field) {
				if(empty($field['id'])) continue;
				if(!in_array($field['id'], $includes)){
					unset($fields[$key]);
				}
			}
		}

        return [
            'name'        => $label,
            'type'        => 'group',
            'id'          => $id,
            'clone'       => false,
            'class'       => 'architronix-typography',
            'std'       => $args,
            'tab'       => $tab,
            'fields'      => $fields
        ];
    }


	/**
	 * Recognized Google font families
	 *
	 * @uses apply_filters()
	 *
	 * @param string $field_id ID that's passed to the filter.
	 *
	 * @return array
	 */
	function recognized_google_font_families( $field_id ) {

		$families = Google_Fonts::font_family_options();

		return apply_filters( 'architronix_recognized_google_font_families', $families, $field_id );
	}
	
	public function dynamic_css_filter($mceInit){
		global $architronix_font_vars;

		$custom_css = '';
		if(!empty($architronix_font_vars) && is_array($architronix_font_vars)){
			$custom_css = 'body.mce-content-body{'.implode('', $architronix_font_vars).'}';			
		}

		if ( isset( $mceInit['content_style'] ) ) {
			$mceInit['content_style'] .= $custom_css;
		} else {
			$mceInit['content_style'] = $custom_css;
		}
		return $mceInit;
	}
    
	static function font_family_options(){
		$options = array(
			'arial'     => 'Arial',
			'georgia'   => 'Georgia',
			'helvetica' => 'Helvetica',
			'palatino'  => 'Palatino',
			'tahoma'    => 'Tahoma',
			'times'     => '"Times New Roman", sans-serif',
			'trebuchet' => 'Trebuchet',
			'verdana'   => 'Verdana',
		);

		global $architronix_font_families;
		if(!empty($architronix_font_families) && is_array($architronix_font_families)){
			$options = array_merge($architronix_font_families, $options);
		}

		return $options;
	}

	static function reboot_css($inline_selector = ''){
		$typography = include __DIR__ ."/customizer/design/typography.php";
		$css = '';
		if($inline_selector == ':root'){
			$inline_selector = '';
		}
		
		foreach ($typography as $field) {
			if(empty($field['id']) || empty($field['selectors'])) continue;
			$mod = get_theme_mod($field['id']);
			if(empty($mod) && !is_array($mod)) continue;

			$selectors = $field['selectors'];
			$field['important'] = isset($field['important'])? $field['important'] : false;

			if(!empty($inline_selector)){
				if($selectors == 'body'){
					$selectors = $inline_selector;
				}else{
					$selectors = "{$inline_selector} {$selectors}";
				}
			}

			$field['prefix'] = !empty($field['prefix'])? $field['prefix'] : str_replace('_', '-', $field['id']);
		
			$css .= "{$selectors}{";			
			$css .= self::typography_css($mod, $field);
			$css .= "}\n";

			global $architronix_sm_query, $architronix_xs_query, $architronix_dark_mode_css;


			if(!empty($architronix_sm_query)){
				$css .= '@media only screen and (max-width: 991px) {';
				$css .= "{$selectors}{";
				foreach ($architronix_sm_query as $property => $value) {
					$css .= "{$property}: {$value};";
				}
				$css .= '}';
				$css .= '}';
			}

			if(!empty($architronix_xs_query)){
				$css .= '@media only screen and (max-width: 600px) {';
				$css .= "{$selectors}{";
				foreach ($architronix_xs_query as $property => $value) {
					$css .= "{$property}: {$value};";
				}
				$css .= '}';
				$css .= '}';
			}

			if(!empty($architronix_dark_mode_css)){
				
				$css .= '[data-bs-theme="dark"] '."{$selectors}{";
				foreach ($architronix_dark_mode_css as $property => $value) {
					$css .= "{$property}: {$value};";
				}
				$css .= '}';
				
			}
		}
		return $css;
	}

	public static function typography_css($args, $field = []){
		extract(wp_parse_args($field, [
			'prefix' => '',
			'important' => false,
			'css_vars' => []
		]));

		if(is_string($css_vars)){
			$css_vars = explode(',', $css_vars);
		}
		
		$css = '';
		$sm_query = $xs_query = $dark_mode_css = [];
		$important = $important? ' !important' : '';
		foreach ($args as $key => $value) {
			if(empty($value)) continue;

			if($key == 'font_family'){
				$font_family_options = self::font_family_options();
				if(empty($font_family_options[$value])) continue;
				$value = $font_family_options[$value];
			}

			$property = str_replace('_', '-', $key);
			$formated_value = is_array($value)? implode('', $value) : $value;
			if (strpos($key, '_sm') !== false) {
				$_property = str_replace(['-sm', '_sm'], '', $property);
				$sm_query["--{$prefix}-{$_property}"] = $formated_value;
			}elseif(strpos($key, '_xs') !== false){
				$_property = str_replace(['-xs', '_xs'], '', $property);
				$xs_query["--{$prefix}-{$_property}"] = $formated_value;
			}else{
				if(in_array($key, $css_vars)){
					$css .= "--{$prefix}-{$property}: {$formated_value}{$important};";
				}else{
					$css .= "{$property}: var(--{$prefix}-{$property}, {$formated_value}){$important};";
				}

				if (strpos($key, '_dark') !== false) {
					$_property = str_replace(['-dark', '_dark'], '', $property);
					$dark_mode_css["--{$prefix}-{$_property}"] = "{$formated_value}{$important}";
				}
			}
			
		}
		$GLOBALS['architronix_sm_query'] = $sm_query;
		$GLOBALS['architronix_xs_query'] = $xs_query;
		$GLOBALS['architronix_dark_mode_css'] = $dark_mode_css;
		return $css;
	}
}