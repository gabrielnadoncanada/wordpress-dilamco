<?php
function architronix_get_color_presets($type){
    $colors = [];
    // Editor color palette.
    $black     = '#000000';
    $dark_gray = '#28303D';
    $gray      = '#39414D';
    $green     = '#D1E4DD';
    $blue      = '#D1DFE4';
    $purple    = '#D1D1E4';
    $red       = '#E4D1D1';
    $orange    = '#E4DAD1';
    $yellow    = '#EEEADD';
    $white     = '#FFFFFF';

    $colors['gradient-presets'] = array(
        array(
            'name'     => esc_html__( 'Purple to yellow', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
            'slug'     => 'purple-to-yellow',
        ),
        array(
            'name'     => esc_html__( 'Yellow to purple', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
            'slug'     => 'yellow-to-purple',
        ),
        array(
            'name'     => esc_html__( 'Green to yellow', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
            'slug'     => 'green-to-yellow',
        ),
        array(
            'name'     => esc_html__( 'Yellow to green', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
            'slug'     => 'yellow-to-green',
        ),
        array(
            'name'     => esc_html__( 'Red to yellow', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
            'slug'     => 'red-to-yellow',
        ),
        array(
            'name'     => esc_html__( 'Yellow to red', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
            'slug'     => 'yellow-to-red',
        ),
        array(
            'name'     => esc_html__( 'Purple to red', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
            'slug'     => 'purple-to-red',
        ),
        array(
            'name'     => esc_html__( 'Red to purple', 'architronix' ),
            'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
            'slug'     => 'red-to-purple',
        ),
    );


    $colors['color-palette'] = array(
        array(
            'name'  => esc_html__( 'Black', 'architronix' ),
            'slug'  => 'black',
            'color' => $black,
        ),
        array(
            'name'  => esc_html__( 'Dark gray', 'architronix' ),
            'slug'  => 'dark-gray',
            'color' => $dark_gray,
        ),
        array(
            'name'  => esc_html__( 'Gray', 'architronix' ),
            'slug'  => 'gray',
            'color' => $gray,
        ),
        array(
            'name'  => esc_html__( 'Green', 'architronix' ),
            'slug'  => 'green',
            'color' => $green,
        ),
        array(
            'name'  => esc_html__( 'Blue', 'architronix' ),
            'slug'  => 'blue',
            'color' => $blue,
        ),
        array(
            'name'  => esc_html__( 'Purple', 'architronix' ),
            'slug'  => 'purple',
            'color' => $purple,
        ),
        array(
            'name'  => esc_html__( 'Red', 'architronix' ),
            'slug'  => 'red',
            'color' => $red,
        ),
        array(
            'name'  => esc_html__( 'Orange', 'architronix' ),
            'slug'  => 'orange',
            'color' => $orange,
        ),
        array(
            'name'  => esc_html__( 'Yellow', 'architronix' ),
            'slug'  => 'yellow',
            'color' => $yellow,
        ),
        array(
            'name'  => esc_html__( 'White', 'architronix' ),
            'slug'  => 'white',
            'color' => $white,
        ),
    );

    if(empty($colors[$type])) return [];

    return $colors[$type];
}

function architronix_get_font_sizes(){
    return array(
        array(
            'name'      => esc_html__( 'Extra small', 'architronix' ),
            'shortName' => esc_html_x( 'XS', 'Font size', 'architronix' ),
            'size'      => 16,
            'slug'      => 'extra-small',
        ),
        array(
            'name'      => esc_html__( 'Small', 'architronix' ),
            'shortName' => esc_html_x( 'S', 'Font size', 'architronix' ),
            'size'      => 18,
            'slug'      => 'small',
        ),
        array(
            'name'      => esc_html__( 'Normal', 'architronix' ),
            'shortName' => esc_html_x( 'M', 'Font size', 'architronix' ),
            'size'      => 20,
            'slug'      => 'normal',
        ),
        array(
            'name'      => esc_html__( 'Large', 'architronix' ),
            'shortName' => esc_html_x( 'L', 'Font size', 'architronix' ),
            'size'      => 24,
            'slug'      => 'large',
        ),
        array(
            'name'      => esc_html__( 'Extra large', 'architronix' ),
            'shortName' => esc_html_x( 'XL', 'Font size', 'architronix' ),
            'size'      => 40,
            'slug'      => 'extra-large',
        ),
        array(
            'name'      => esc_html__( 'Huge', 'architronix' ),
            'shortName' => esc_html_x( 'XXL', 'Font size', 'architronix' ),
            'size'      => 96,
            'slug'      => 'huge',
        ),
        array(
            'name'      => esc_html__( 'Gigantic', 'architronix' ),
            'shortName' => esc_html_x( 'XXXL', 'Font size', 'architronix' ),
            'size'      => 144,
            'slug'      => 'gigantic',
        ),
    );
}

function architronix_get_default_colors_global(){
    return [ 
        [
            'id' =>  'primary',
            'value' => '#32393E',
            'title' => 'Primary',            
        ],
        [
            'id' =>  'secondary',
            'value' => '#D2D9E0',
            'title' => 'Secondary'
        ],
        [
            'id' =>  'white',
            'value' => '#fff',
            'title' => 'White'
        ],
        [
            'id' =>  'dark',
            'value' => '#32393E',
            'title' => 'Dark'
        ],
        [
            'id' =>  'body_color',
            'value' => '#32393E',
            'title' => 'Body Text Color'
        ],
        [
            'id' =>  'body_bg',
            'value' => '#f9fffc',
            'title' => 'Body Background'
        ],
        [
            'id' =>  'link_color',
            'value' => '#32393E',
            'title' => 'Link color'
        ],
        [
            'id' =>  'heading_color',
            'value' => '#32393E',
            'title' => 'Heading color'
        ],
        [
            'id' =>  'border_color',
            'value' => '#32393E',
            'title' => 'Border color',            
        ],
        [
            'id' =>  'navbar_color',
            'value' => '#32393E',
            'title' => 'Menu Color',
            'selector' => '.architronix-navbar.navbar'
        ],
        [
            'id' =>  'navbar_hover_color',
            'value' => '#32393E',
            'title' => 'Menu Hover Color',
            'selector' => '.architronix-navbar.navbar'
        ],
        [
            'id' =>  'navbar_active_color',
            'value' => '#D2D9E0',
            'title' => 'Menu Active Color',
            'selector' => '.architronix-navbar .nav-link'
        ],
    ];
}

function architronix_get_editor_color_choices(){
    $colors = architronix_get_default_colors_global();
    $choices = [];
    foreach ($colors as $color) {
        $choices[] = [
            'name' => $color['id'],
            'color' => get_theme_mod('architronix_'.$color['id'], $color['value'])
        ];
    }
    return $choices;
}

function architronix_get_field_id_by_prefix($text){
    return 'architronix_'. str_replace('-', '_', sanitize_key($text));
}

function architronix_get_color_fields($type){    

    $fields = [];
    $function_name = "architronix_get_default_colors_{$type}";
    if( !function_exists($function_name) ) return $fields;

    $colors = call_user_func($function_name);
    foreach ($colors as $color) {
        if(empty($color['id'])) continue;
        
        $color = wp_parse_args($color, [
            'id' => '',
            'title' => '',
            'value' => ''
        ]);


        if(empty($color['title'])){
            $color['title'] = ucfirst(str_replace('-', ' ', $color['id']));
        }
        $field_id = architronix_get_field_id_by_prefix($color['id']); 
        $fields[] = [
            'name' => $color['title'],
            'id'   => esc_attr($field_id),
            'type' => 'color',
            'std' => $color['value'],
            'alpha' => true
        ];

    }
    return $fields;
}

function architronix_formatting_list_html($args = []){
    $output = '';
    extract(wp_parse_args($args, [
		'wrap' => 'ul',
		'wrap_class' => 'nav',
		'link_wrap' => 'li',
		'link_wrap_class' => 'nav-item',
		'link_class' => 'nav-link',
        'options' => [],
        'output' => '',
	]));
    if(empty($options)) return $output;

    
	$link_class = [ $link_class ];
	$link_before = $link_after = '';
	if(!empty($link_wrap)){
		$link_before = sprintf('<%1$s class="%2$s">', $link_wrap, $link_wrap_class);
		$link_after = sprintf('</%1$s>', $link_wrap);
	}
    $links = [];
    foreach ($options as $link) {
		extract(wp_parse_args($link, [
			'text' =>'',
			'url' => '',
			'class' => '',
            'attributes' => []
        ]));
		$link_class[] = $class;
		$links[] = sprintf( '%4$s<a href="%2$s" class="%3$s" %6$s>%1$s</a>%5$s', esc_attr($text), esc_url($url), implode(' ', array_filter($link_class)), $link_before, $link_after, implode(' ', $attributes) );
	}

	$links_html = implode('', $links);
	if(!empty($wrap)){
		$links_html = sprintf('<%2$s class="%3$s">%1$s</%2$s>', $links_html, $wrap, $wrap_class );
	}
    $output .= $links_html;
	
	return $output;
}

function architronix_get_spacer_options($class_prefix = '', $label_prefix = ''){
    $spacers = [ 0,1,2,3,4,5, 10,15,20,30,40,50,60,70,80,100,120 ];
    $options = [];
    foreach ($spacers as $value) {
        $class =  "{$class_prefix}{$value}";
        $label =  "{$label_prefix}{$value}";
        $options[] = [
            'label' => $label,
            'value' => $class,
        ];
    }
    
    return $options;
}

function architronix_get_editor_column_templates(){
    $templates = [
        [
            'name' => '1-3',
            'title' => '2 Columns (1:3)',
            'icon' => '',
            'templateLock' => 'all',
            'template' => [
                [
                    'wp-bootstrap-blocks/column',
                    [
                        'sizeMd' =>  3
                    ]
                ],
                [
                    'wp-bootstrap-blocks/column',
                    [
                        'sizeMd' => 9
                    ]
                ]
            ]
        ]
    ];
    return $templates;
}

function architronix_vertical_spacer_options(){
    return [
        'py-120' => 'Spacer large - 120:120',
        'py-60' => 'Spacer small - 60:60',                
        'py-100' => 'Spacer - 100:100',                
        'pt-100 pb-80' => 'Spacer - 100:80',
        'pt-100 pb-70' => 'Spacer - 100:70',
        'pt-100 pb-60' => 'Spacer - 100:60',
        'pt-100 pb-50' => 'Spacer - 100:50',
        'pt-100 pb-40' => 'Spacer - 100:40',
        'pt-100 pb-30' => 'Spacer - 100:30',
        'pt-100 pb-20' => 'Spacer - 100:20',
        'pt-100 pb-10' => 'Spacer - 100:10',
        'pt-100 pb-0' => 'Spacer - 100:0',
        'py-0' => 'No spacing',                                
    ];
}

function architronix_section_settings_field($args = [], $group = true, $prefix='section_'){
    $std = wp_parse_args($args, [
        'bg' => '',
        'align' => '',
        'spacer_y' => 'py-100',
        'container' => 'container',
        'css_class' => '',
        'css_id' => '',
    ]);
    $group_fields = [
        [
            'id' => 'container',
            'type' => 'select',
            'name' => 'Container',         
            'desc' => 'Section container width', 
            'std' => 'container',
            'options' => [
                'container' => 'Container',
                'container-fluid' => 'Container Fluid',
                '' => 'Full-width',
            ],        
        ],
        [
            'type' => 'select',
            'id' => 'bg',
            'name' => 'Background',
            'std' => '',
            'options' => [                
                '' => 'Default',
                'bg-primary' => 'Primary',
                'bg-secondary' => 'Secondary',
                'bg-danger' => 'Danger',
                'bg-warning' => 'Warning',
                'bg-info' => 'Info',
                'bg-light' => 'Light',
                'bg-dark' => 'Dark',
                'bg-white' => 'White',
                'bg-body' => 'Body',
            ],
        ],
        [
            'id' => 'pt',
            'type' => 'number',
            'name' => 'Padding top',         
            'append' => 'pixel', 
            'std' => 100,
            'min' => 0,       
            'max' => 120,       
            'step' => 10      
        ], 
        [
            'id' => 'pb',
            'type' => 'number',
            'name' => 'Padding bottom',         
            'append' => 'pixel', 
            'std' => 100,
            'min' => 0,       
            'max' => 120,       
            'step' => 10      
        ],       
                            
    ];    

    if(!$group){
        // setup default value
        foreach ($group_fields as $key => $value) {
            if(!empty($std[$value['id']])) {
                $value['std'] = $std[$value['id']];
            }
            // Add prefix
            $value['id'] = $prefix.$value['id'];
            $group_fields[$key] = $value;
        }
        return $group_fields;
    } 

    
    $field = [
        'id' => 'section',
        'type' => 'group',
        'clone' => false,
        'default_state' => 'collapsed',
        'collapsible' => true,
        'save_state' => false,
        'group_title' => 'Section: Background: {bg}, Align: {align}',	
        'std' => $std,		
        'fields' => $group_fields,
    ];

    
    return $field;
}

function architronix_get_button_fields($group = false, $args = [], $prefix = ''){
    $args = wp_parse_args($args, [
        'text' => 'Button title',
        'link' => '#',
        'style' => '',
        'outline' => false,
        'size' => '',
        'icon' => '',
        'icon_position' => 'right',
        'icon_size' => 24
    ]);
    $fields =  [      
        [
            'type' => 'text',
            'id'   => 'text',
            'name' => 'Text',
        ],  
        [
            'type' => 'text',
            'id'   => 'link',
            'name' => 'Link',
        ],
        [
            'type' => 'select',
            'id'   => 'style',
            'name' => 'Style',
            'options' => [                
                'btn-link' => 'Link',
                'btn-primary' => 'Primary',
                'btn-secondary' => 'Secondary',
                'btn-danger' => 'Danger',
                'btn-warning' => 'Warning',
                'btn-info' => 'Info',
                'btn-light' => 'Light',
                'btn-dark' => 'Dark',
            ],
        ],
        [
            'type' => 'checkbox',
            'id'   => 'outline',
            'desc' => 'Enable outline',
        ],        
        [
            'type' => 'select',
            'id'   => 'size',
            'name' => 'Size',
            'options' => [                
                '' => 'Normal',
                'btn-sm' => 'Small',
                'btn-lg' => 'Large',
                'btn-xl' => 'Extra large',
            ],
        ],
        [
            'type' => 'select',
            'id'   => 'icon',
            'name' => 'Icon',
            'options' => [ 
                '' => 'None',               
                'next' => 'Next',
                'prev' => 'Prev',
                'next2' => 'Next 2',
                'prev2' => 'Prev 2',
                'arrow_left' => 'Arrow left',
                'arrow_right' => 'Arrow Right',
                'plus' => 'Plus',
                'minus' => 'Minus',  
                'googleplay' => 'Google play store',              
                'appstore' => 'App store',              
            ],
        ],
        [
            'type' => 'number',
            'id'   => 'icon_size',
            'name' => 'Icon size',
            'visible' => ['icon', '!=', '']
        ], 
        [
            'type' => 'select',
            'id'   => 'icon_position',
            'name' => 'Icon position',
            'options' => [ 
                'right' => 'Right',
                'left' => 'Left',  
            ],
            'visible' => ['icon', '!=', '']
        ],
    ];

    foreach ($fields as $key => $field) {
        if(empty($field['id'])) continue;
        $field_id = $prefix.$field['id'];

        if(!$group && isset($args[$field_id])){
            $field['std'] = $args[$field_id];
        }

        $field['id'] = $field_id;
        $fields[$key] = $field;
    }

    return $fields;
}

function architronix_get_button_html($args){
    extract($args);    
    if(empty($link) || empty($text)) return;
    if(!empty($outline) && !empty($style)){
        $style = str_replace('btn-', 'btn-outline-', $style); 
    }
    $css_classes = [
        'btn',
        !empty($size)? $size : '',
        $style,
        'd-inline-flex',
        'align-items-center',
        'gap-2',    
        !empty($css_class)? $css_class : ''
    ];


    $css_classes = array_unique(array_filter($css_classes));

    $attributes = [
        !empty($css_id)? 'id="'.$css_id.'"' : '',
        'class="'.esc_attr(implode(' ', $css_classes)).'"'    
    ];
    
    if(empty($icon)){
        return sprintf('<a href="'.esc_url($link).'" %2$s>%1$s</a>', $text, join(' ', array_filter($attributes)));
    }
    
    $icon_svg = '';
    $icon_size = !empty($icon_size)? $icon_size : 24;
    $icon_position = !empty($icon_position)? $icon_position : 'right';
    $icon_svg = architronix_get_icon_svg('ui', $icon, $icon_size);
    if($icon_position == 'left'){
        return sprintf('<a href="'.esc_url($link).'" %2$s>%3$s%1$s</a>', $text, join(' ', array_filter($attributes)), $icon_svg);
    }else {
        return sprintf('<a href="'.esc_url($link).'" %2$s>%1$s%3$s</a>', $text, join(' ', array_filter($attributes)), $icon_svg);
    }
    
}

function architronix_get_element_common_fields(){
    return [  
        [
            'type' => 'select',
            'id'   => 'align',
            'name' => 'Align',
            'options' => [
                '' => 'Inherit',
                'text-start' => 'Start',
                'text-center' => 'Center',
                'text-end' => 'End',
            ]
        ],          
        [
            'id' => 'css_class',
            'type' => 'text',
            'name' => 'CSS class'
        ],
        [
            'id' => 'css_id',
            'type' => 'text',
            'name' => 'CSS ID'
        ],
    ];
}

function architronix_get_parallax_fields(){
    $fields = [
        [
            'id' => 'enable_parallax',
            'type' => 'checkbox',
            'desc' => 'Enable background image',
        ],
        [
            'id' => 'parallax_image',
            'type' => 'image_advanced',
            'name' => 'Background image',
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible' => [ 'enable_parallax', '=', true ]
        ],
        [
            'id' => 'parallax_opacity',
            'type' => 'number',
            'name' => 'Background image opacity',
            'std' => .5,
            'min' => 0,       
            'max' => 1,       
            'step' => .1,
            'visible' => [ 'enable_parallax', '=', true ]   
        ],
    ];

    return $fields;
}

function architronix_get_parallax_attributes($args){
    extract(wp_parse_args($args, [
        'enable_parallax' => false,
        'parallax_image' => '',
        'parallax_opacity' => 1
    ]));
    
    if(empty($enable_parallax) && empty($parallax_image)) return false;

    $css_vars = [];
    $attachment_id = reset($parallax_image);
    $attachment = wp_get_attachment_image_src($attachment_id, 'full');
    if($attachment){
        $bg_image_src = $attachment[0];            
        $css_vars = [
            '--architronix-parallax-bg: url('.esc_url($bg_image_src).')',
            !empty($parallax_opacity)? '--architronix-parallax-opacity: '.$parallax_opacity : '',
        ];
    }
     
    return $css_vars;
}

function architronix_wp_query_field($args = array(), $group = true){	
	$default = array(
        'post_type' => 'post',
		'posts_per_page' => get_option( 'posts_per_page' ),
		'post__in' => array(),
		'post__not_in' => array(),
		'ignore_sticky_posts' => 1,
		'post_status' => 'publish',
		'order' => 'DESC',
		'orderby' => 'date',
	);
	$std = wp_parse_args( $args, $default);
	extract($std);	

    $group_fields = array(
        array (
            'id' => 'post_type',
            'type' => 'hidden',	
            'std'  => $post_type,
            'attributes' => ['value' => $post_type]
        ),															
        array (
            'id' => 'posts_per_page',
            'type' => 'number',
            'name' => esc_attr__( 'Posts per page', 'architronix' ),
            'desc' => esc_attr__( ' (int) number of post to show per page. -1 to show all posts', 'architronix' ),
            'min'  => -1,
            'step' => 1,
        ),
        array (
            'id' => 'post__in',
            'type' => 'post',
            'name' => esc_attr__( 'Include specific posts', 'architronix' ),
            'placeholder' => esc_attr__( 'Select posts..', 'architronix' ),
            'desc' => esc_attr__( 'mulliple selection is allowed', 'architronix' ),
            'field_type' => 'select_advanced',
            'ajax' => true,
            'multiple' => true,
            'query_args' => array(
                'post_type' => esc_attr($post_type),
                'posts_per_page' => -1
            )

        ),
        array (
            'id' => 'post__not_in',
            'type' => 'post',
            'name' => esc_attr__( 'Exclude specific posts', 'architronix' ),
            'placeholder' => esc_attr__( 'Select posts..', 'architronix' ),
            'desc' => esc_attr__( 'mulliple selection is allowed', 'architronix' ),
            'field_type' => 'select_advanced',
            'ajax' => true,
            'multiple' => true,
            'query_args' => array(
                'post_type' => esc_attr($post_type),
                'posts_per_page' => -1
            ),

        ),
        array (
            'id' => 'ignore_sticky_posts',
            'type' => 'switch',
            'name' => esc_attr__( 'Ignore sticky posts', 'architronix' ),
        ),	
        array(
            'id'       => 'post_status',
            'name'     => esc_attr__( 'Post status', 'architronix' ),
            'type'     => 'select',
            'options'  => array(
                'publish'      => 'Publish',
                'pending'    => 'Pending',
                'draft'    => 'Draft',
                'future'    => 'Future',
                'private'    => 'Private',
                'inherit'    => 'Inherit',
                'trash'    => 'Trash',
                'any'    => 'Any',					       
            ),
            'inline'   => true,
            'multiple' => false,
        ),				
        array(
            'id'       => 'order',
            'name'     => esc_attr__( 'Order', 'architronix' ),
            'type'     => 'select',
            'options'  => array(
                'ASC'      => 'ASC',
                'DESC'    => 'DESC',
                
            ),
            'inline'   => true,
            'multiple' => false,
        ),
        array(
            'id'       => 'orderby',
            'name'     => esc_attr__( 'Order by', 'architronix' ),
            'type'     => 'select',
            'options'  => array(
                'none'      => 'none',
                'ID'    => 'ID',
                'author'    => 'Author',
                'title'    => 'Title',
                'name'    => 'Same',
                'date'    => 'Date',
                'modified'    => 'Modified date',
                'rand'    => 'Random',
                'comment_count'    => 'Comments',					       
            ),
            'inline'   => true,
            'multiple' => false,
        ),					
    );

    if(!$group){
        // setup default value
        foreach ($group_fields as $key => $value) {
            if(empty($std[$value['id']])) continue;
            $value['std'] = $std[$value['id']];
            $group_fields[$key] = $value;
        }
        return $group_fields;
    }
	
	$field = array(
        'id' => 'query_args',
        'type' => 'group',
        'clone' => false,
        'default_state' => 'collapsed',
        'collapsible' => true,
        'save_state' => false,
        'group_title' => 'Query: per_page: {posts_per_page} post_type: {post_type}',	
        'std' => $std,		
        'fields' => $group_fields,
    );

    return $field;
}

/**
 * Get size information for all currently-registered image sizes.
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
function architronix_get_image_sizes() {
	global $_wp_additional_image_sizes;
	
	$sizes = array();
	
	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array(
			 'thumbnail',
			'medium',
			'medium_large',
			'large' 
		) ) ) {
			$sizes[ $_size ][ 'width' ]  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ][ 'height' ] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ][ 'crop' ]   = (bool) get_option( "{$_size}_crop" );
		} //in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) )
		elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				 'width' => $_wp_additional_image_sizes[ $_size ][ 'width' ],
				'height' => $_wp_additional_image_sizes[ $_size ][ 'height' ],
				'crop' => $_wp_additional_image_sizes[ $_size ][ 'crop' ] 
			);
		} //isset( $_wp_additional_image_sizes[ $_size ] )
	} //get_intermediate_image_sizes() as $_size
	
	return $sizes;
}

function architronix_get_image_sizes_options() {
  $sizes = architronix_get_image_sizes();

  $arr = array();
  foreach ($sizes as $key => $value) {
     $arr[$key] = ucfirst(trim(str_replace(['-', '_', 'ctrl'], ' ', $key)));
  }
  
  return $arr;
}
/**
 * Filter callback to add image sizes to Media Uploader
 */
function architronix_display_image_size_names_muploader( $sizes ) {
	
	$new_sizes = array();
	
	$added_sizes = get_intermediate_image_sizes();
	
	// $added_sizes is an indexed array, therefore need to convert it
	// to associative array, using $value for $key and $value
	foreach( $added_sizes as $key => $value) {
		$new_sizes[$value] = $value;
	}
	
	// This preserves the labels in $sizes, and merges the two arrays
	$new_sizes = array_merge( $new_sizes, $sizes );
	
	return $new_sizes;
}
add_filter('image_size_names_choose', 'architronix_display_image_size_names_muploader', 11, 1);

function architronix_get_sidebar_options(){
    // Get the registered sidebars.
    global $wp_registered_sidebars;

    $sidebars = array();
    foreach ( $wp_registered_sidebars as $id => $sidebar ) {
        $sidebars[ $id ] = $sidebar['name'];
    }

    return $sidebars;
}

function architronix_get_the_ID(){
    return architronix_layout_get('post_id');	
}

function architronix_content( $title, $before = '', $after = '', $echo = true ) {

	if ( !is_string( $title) || strlen( $title ) == 0 ) {
		return;
	}

	if ( $echo ) {
		echo "{$before}{$title}{$after}";
	} else {
		return "{$before}{$title}{$after}";
	}
}

function architronix_layout_get($key = 'layout', $fallback = false){
    global $architronixLayout;
    if(isset($architronixLayout->{$key})){
        return $architronixLayout->{$key};
    }elseif(isset($architronixLayout->data[$key])){
        return $architronixLayout->data[$key];
    }else{
        return $fallback;
    }
}

if (!function_exists('architronix_get_terms')) :
    /**
     * 
     * @param 	string		$separator		(optional)
     * @param 	string		$taxonomy		project_cat
     * @param 	boolean		$echo			true
     * 
     * @return	string	
     */
    function architronix_get_terms($args = [], $echo = false) {
        extract(wp_parse_args($args, [
            'separator' => ', ',
            'taxonomy' => 'category',
            'wrapper_class' => '',
            'wrapper_tag' => '',
            'link_class' => '',
            'slug' => false,
            'disable_links' => false,
            'slice' => false,
            'slice_count' => 2,
        ]));
		global $post;
        // Get the term IDs assigned to post.
        $post_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
        if (!empty($post_terms) && !is_wp_error($post_terms)) {
            if (is_numeric($slice)) {
                $post_terms = array_slice($post_terms, $slice, $slice_count);
            }

            $term_ids = implode(', ', $post_terms);

            if ($slug) {
                $disable_links = true;
                $wrapper_class = false;
                $terms = '';
                foreach ($post_terms as $term_id) {
                    $term = get_term($term_id, $taxonomy);
                    $terms .= $term->slug . '<br />';
                }
            } else {
                $terms = wp_list_categories(array(
                    'title_li' => '',
                    'style'    => 'none',
                    'echo'     => false,
                    'taxonomy' => $taxonomy,
                    'include'  => $term_ids
                ));
            }

            $terms = rtrim(trim(str_replace('<br />',  $separator, $terms)), $separator);

            if ($disable_links) {
                $terms = strip_tags($terms);
            }
            if (!empty($link_class)) {
                $terms = rtrim(trim(str_replace('<a href=',  '<a class="' . esc_attr($link_class) . '" href=', $terms)), $separator);
            }

            if (!empty($wrapper_class)) {
                $terms = '<' . $wrapper_tag . ' class="' . esc_attr($wrapper_class) . '">' . $terms . '</' . $wrapper_tag . '>';
            }


            // Display terms.
            if ($echo) {
                echo wp_kses_post($terms);
            } else {
                return $terms;
            }
        }
    }
endif;


function architronix_related_query_args($post_type, $posts_per_page = 3, $tax_query = []) {
    $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
    if(empty($taxonomies)) return $tax_query;  
    
    foreach ($taxonomies as $taxonomy) {       
        $term_ids = wp_get_post_terms(get_the_ID(), $taxonomy, array('fields' => 'ids'));
        if (empty($term_ids) || is_wp_error($term_ids)) continue;
        $tax_query[] = [
            'taxonomy' => $taxonomy,
            'field' => 'term_id',
            'terms' => $term_ids,
            'operator' => 'IN',
        ];
    }


    if (count($tax_query) > 1) {
        $tax_query['relation'] = 'OR';
    }

    $query_args = [
        'post_type' => $post_type,
        'post__not_in' => [get_the_ID()],
        'posts_per_page' => intval($posts_per_page),
        'orderby' => 'rand',
        'ignore_sticky_posts' => true,
        'tax_query' => $tax_query
    ];
  

    return $query_args;
}

function architronix_get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {
    
    global $wpdb;
    
    if( empty( $key ) )
        return;
    
    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s 
        AND p.post_status = %s 
        AND p.post_type = %s
    ", $key, $status, $type ) );
    
    return $r;
}

function architronix_get_post_by_title($title, $post_type = 'page'){
    $posts = get_posts(
        array(
            'post_type'              => $post_type,
            'title'                  => $title,
            'post_status'            => 'all',
            'numberposts'            => 1,
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,           
            'orderby'                => 'post_date ID',
            'order'                  => 'ASC',
        )
    );
     
    if ( ! empty( $posts ) ) {
       return $posts[0];
    } else {
        return null;
    }
}

function architronix_banner_css_style($attachment_id, $size = 'full') {    
    if (empty($attachment_id)) return;

    $image = wp_get_attachment_image_src($attachment_id, $size, false);
    if (empty($image[0]) || is_wp_error($image)) return;

    return ' style="background-image: url(' . $image[0] . ')"';
}