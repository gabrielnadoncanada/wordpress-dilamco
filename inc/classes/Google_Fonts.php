<?php
namespace Architronix;

final class Google_Fonts{

    public function __construct() {
		add_action( 'wp_ajax_architronixGoogleFontField', [$this, 'updateGoogleFontField'] );		
	}

    public static function font_family_options(){
        $families        = array();
		$google_fonts = get_option( 'architronix_google_fonts', array() );

		// Forces an array rebuild when we switch themes.
		if ( empty( $google_fonts ) ) {
			$google_fonts = self::fetch_google_fonts( true, true );
		}

		foreach ( (array) $google_fonts as $key => $item ) {

			if ( isset( $item['family'] ) ) {
				$families[ $key ] = $item['family'];
			}
		}
        return $families;
    }

    static function get_theme_fonts(){
        $google_fonts     = get_option( 'architronix_google_fonts', array() );
        $GLOBALS['google_fonts'] = $google_fonts;
        $args = ['body_font_family', 'heading_font_family'];
        $fonts = architronix_theme_default_fonts();
        foreach ($args as $font_id) {
            $font_family = get_theme_mod($font_id);
            if(empty($font_family)) continue;

            // Can't find the font, bail!
            if ( empty( $google_fonts[ $font_family ]['family'] ) ) {
                continue;
            }

            $fonts[$font_id]['name'] = $font_family;
            $fonts[$font_id]['family'] = $google_fonts[ $font_family ]['family'];
        }

       

        return $fonts;

    }

    static function get_google_fonts_url() {
        $default_fonts = architronix_theme_default_fonts();
        if(empty($default_fonts)) return;
        $fonts = $font_families = [];
        foreach ($default_fonts as $field_id => $font) {
            $font = wp_parse_args(get_theme_mod($field_id, []), $font);
            
            if(empty($font['family'])) continue;
            $family = $font['family'];
            $variants = !empty($font['variants'])? ':'.implode(',', $font['variants']) : '';
            $subsets = !empty($font['subsets'])? '&subset='.implode(',', $font['subsets']) : '';

            $fonts[] = $family.$variants.$subsets;
            $font_families[$field_id] = "'{$font['family']}'";
        }
        $fonts = array_filter($fonts);
        if(empty($fonts)) return;

        $GLOBALS['architronix_font_families'] = $font_families;

        return add_query_arg( 'family', urlencode(implode( '|', $fonts )), 'https://fonts.googleapis.com/css' );
	}

    static function fetch_google_fonts( $normalize = true, $force_rebuild = false ) {

        
        // Google Fonts cache key.
        $google_fonts_cache_key = apply_filters( 'architronix_google_fonts_cache_key', 'architronix_google_fonts_cache' );
    
        // Get the fonts from cache.
        $google_fonts = apply_filters( 'architronix_google_fonts_cache', get_transient( $google_fonts_cache_key ) );
    
        if ( $force_rebuild || ! is_array( $google_fonts ) || empty( $google_fonts ) ) {
    
            $google_fonts = array();
    
            // API url and key.
            $google_fonts_api_url = apply_filters( 'architronix_google_fonts_api_url', 'https://www.googleapis.com/webfonts/v1/webfonts' );
            $google_fonts_api_key = apply_filters( 'architronix_google_fonts_api_key', 'AIzaSyAY4CxRw0I0VvaABZcMcNqU-Zjuw7xjrW4' );
    
            if ( false === $google_fonts_api_key ) {
                return array();
            }
    
            // API arguments.
            $google_fonts_fields = apply_filters(
                'architronix_google_fonts_fields',
                array(
                    'family',
                    'variants',
                    'subsets',
                )
            );
            $google_fonts_sort   = apply_filters( 'architronix_google_fonts_sort', 'alpha' );
    
            // Initiate API request.
            $google_fonts_query_args = array(
                'key'    => $google_fonts_api_key,
                'fields' => 'items(' . implode( ',', $google_fonts_fields ) . ')',
                'sort'   => $google_fonts_sort,
            );
    
            // Build and make the request.
            $google_fonts_query    = esc_url_raw( add_query_arg( $google_fonts_query_args, $google_fonts_api_url ) );
            $google_fonts_response = wp_safe_remote_get(
                $google_fonts_query,
                array(
                    'sslverify' => false,
                    'timeout'   => 15,
                )
            );
    
            // Continue if we got a valid response.
            if ( 200 === wp_remote_retrieve_response_code( $google_fonts_response ) ) {
    
                $response_body = wp_remote_retrieve_body( $google_fonts_response );
    
                if ( $response_body ) {
    
                    // JSON decode the response body and cache the result.
                    $google_fonts_data = json_decode( trim( $response_body ), true );
    
                    if ( is_array( $google_fonts_data ) && isset( $google_fonts_data['items'] ) ) {
    
                        $google_fonts = $google_fonts_data['items'];
    
                        // Normalize the array key.
                        $google_fonts_tmp = array();
                        foreach ( $google_fonts as $key => $value ) {
                            if ( ! isset( $value['family'] ) ) {
                                continue;
                            }
                           
                            $id = preg_replace( '/[^a-z0-9_\-]/', '', strtolower( remove_accents( $value['family'] ) ) );
    
                            if ( $id ) {
                                $google_fonts_tmp[ $id ] = $value;
                            }
                        }
    
                        $google_fonts = $google_fonts_tmp;
                        update_option( 'architronix_google_fonts', $google_fonts );
                        set_transient( $google_fonts_cache_key, $google_fonts, WEEK_IN_SECONDS );
                    }
                }
            }
        }
    
        return $normalize ? self::normalize_google_fonts( $google_fonts ) : $google_fonts;
    }

    static function normalize_google_fonts( $google_fonts ) {

        $normalized_google_fonts = array();
    
        if ( is_array( $google_fonts ) && ! empty( $google_fonts ) ) {
    
            foreach ( $google_fonts as $google_font ) {
    
                if ( isset( $google_font['family'] ) ) {
    
                    $id = str_replace( ' ', '+', $google_font['family'] );
    
                    $normalized_google_fonts[ $id ] = array(
                        'family' => $google_font['family'],
                    );
    
                    if ( isset( $google_font['variants'] ) ) {
                        $normalized_google_fonts[ $id ]['variants'] = $google_font['variants'];
                    }
    
                    if ( isset( $google_font['subsets'] ) ) {
                        $normalized_google_fonts[ $id ]['subsets'] = $google_font['subsets'];
                    }
                }
            }
        }
    
        return $normalized_google_fonts;
    }

    static function get_font_options_by_name($field_id, $name, $type = 'variants'){
        $options = [];
        $google_fonts = get_option( 'architronix_google_fonts', array() );
        $save_font = get_theme_mod($field_id, []);
        if(!empty($save_font['name'])){
            $name = $save_font['name'];
        }
        
        if(!empty($google_fonts[$name]) || !empty($google_fonts)){
            $family = $google_fonts[$name];
            
            if(!empty($family[$type])){
                foreach ($family[$type] as $option) {
                    $option_id = ($option == 'regular')? '400' : $option;                    
                    $options[$option_id] = $option;
                }
            }
        }
    
        return $options;
    }

    static function google_font_field($field_id, $label= ''){
        $fonts = architronix_theme_default_fonts();
        $args = (!empty($fonts[$field_id]))? $fonts[$field_id] : [];
        $save_font = get_theme_mod($field_id, []);
        $name = '';
        if(!empty($save_font['name'])){
            $name = $save_font['name'];
        }
        
        $args = wp_parse_args($args, [
			'name' => $name,
			'family' => '',
			'variants' => [],
			'subsets' => [],
			'css_var' =>  '',			
		]);

        $variant_options = !empty($args['name'])? self::get_font_options_by_name($field_id, $args['name'], 'variants') : [];
        $subset_options = !empty($args['name'])? self::get_font_options_by_name($field_id, $args['name'], 'subsets') : [];
       
        return [
            'name'        => $label,
            'type'        => 'group',
            'id'          => $field_id,
            'clone'       => false,
            'class'       => 'architronix-google-fonts',
            'std'       => $args,
            'fields'      => [
                [                    
                    'type'        => 'select_advanced',
                    'id'          => 'name',
                    'options'       => \Architronix\Google_Fonts::font_family_options(),
                    'placeholder'  => esc_attr__('Choose Google Font', 'architronix'),     
                    'class' => 'googlefont-name',        
                ],
                [                    
                    'name'          => !empty($args['name'])? esc_attr__('Variants', 'architronix') : '', 
                    'type'        => 'checkbox_list',
                    'id'          => 'variants',
                    'inline' => true,
                    'class' => 'googlefont-variants', 
                    'options' => $variant_options,
                    'visible' => ["{$field_id}_name", '!=', '']
                   
                ],
                [                    
                    'name'          => !empty($args['name'])? esc_attr__('Subsets', 'architronix') : '',
                    'type'        => 'checkbox_list',
                    'id'          => 'subsets',
                    'inline' => true,
                    'class' => 'googlefont-subsets', 
                    'options' => $subset_options,
                    'visible' => ["{$field_id}_name", '!=', '']               
                ],
                [                    
                    'name' => esc_attr__('Font Family', 'architronix'),
                    'type'        => 'hidden',
                    'id'          => 'family',
                    'class' => 'googlefont-family',
                ],
            ]
        ];
    }

    public function updateGoogleFontField(){
        if(!empty($_POST['font_id']) && !empty($_POST['field_id'])){
            $variants = $subsets = '';
            $family_id = $_POST['font_id'];  
            $field_id = str_replace('_name', '', $_POST['field_id']);
            $font = get_theme_mod($field_id, []);
            $saved_variants = !empty($font['variants'])? $font['variants'] : [];
            $saved_subsets = !empty($font['subsets'])? $font['subsets'] : [];
    
            $google_fonts = get_option( 'architronix_google_fonts', array() );
            if(!empty($google_fonts[$family_id])){
                $family = $google_fonts[$family_id];
                $type = 'variants';
                if(!empty($family[$type])){
                    foreach ($family[$type] as $variant) {
                        $checked = in_array($variant, $saved_variants)? ' checked="checked"' : '';
                        $variants .= sprintf('<label><input value="%2$s" type="checkbox" class="rwmb-checkbox_list" name="%1$s[variants][]" aria-labelledby="%1$s_variants-label"%3$s>%2$s</label>', $field_id, $variant, $checked);
                    }
                }
    
                $type = 'subsets';
                if(!empty($family[$type])){
                    foreach ($family[$type] as $variant) {
                        $variant = ($variant == 'regular')? '400' : $variant;
                        $checked = in_array($variant, $saved_subsets)? ' checked="checked"' : '';
                        $subsets .= sprintf('<label><input value="%2$s" type="checkbox" class="rwmb-checkbox_list" name="%1$s[subsets][]" aria-labelledby="%1$s_subsets-label"%3$s>%2$s</label>', $field_id, $variant, $checked);
                    }
                }
    
                wp_send_json([
                    'variants' => $variants,
                    'subsets' => $subsets,
                    'family' => !empty($family['family'])? $family['family'] : ''
                ]);
            }
        }
        wp_die();
    }
    
}