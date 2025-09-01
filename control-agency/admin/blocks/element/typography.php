<?php
extract(wp_parse_args($args, [
    'name' => '',
    'id' => '',
    'color' => '',
    'size' => '',
    'css_class' => '',
    'color_options' => [
        'primary'   => 'Primary',
        'secondary' => 'Secondary',
        'success'   => 'Success',
        'danger'    => 'Danger',
        'warning'   => 'Warning',
        'info'      => 'Info',
        'light'     => 'Light',
        'dark'      => 'Dark',
    ],
    'size_options' => [
        'display-1' => esc_attr__('Display 1', 'architronix'),
        'display-2' => esc_attr__('Display 2', 'architronix'),
        'display-3' => esc_attr__('Display 3', 'architronix'),
        'display-4' => esc_attr__('Display 4', 'architronix'),
        'display-5' => esc_attr__('Display 5', 'architronix'),
        'display-6' => esc_attr__('Display 6', 'architronix'),
        'fs-1' => esc_attr__('Heading 1', 'architronix'),
        'fs-2' => esc_attr__('Heading 2', 'architronix'),
        'fs-3' => esc_attr__('Heading 3', 'architronix'),
        'fs-4' => esc_attr__('Heading 4', 'architronix'),
        'fs-5' => esc_attr__('Heading 5', 'architronix'),
        'fs-6' => esc_attr__('Heading 6', 'architronix'),
        'lead' => esc_attr__('Lead', 'architronix'),
    ],
]));
$prefix = "{$id}_";
$fields = [
    [
        'name'            => '&nbsp;',
        'id'              => "{$prefix}customize",
        'type'            => 'checkbox',
        'std'             => false,
        'desc'             => sprintf(esc_attr__('Checked to edit %s typography', 'architronix'), '<strong>'.$name.'</strong>'),
        'visible'       => [$id, '!=', '']
    ], 
    [
     
        'type'            => 'custom_html',
        'before'          => '<div class="control-agency-group-field"><div class="rwmb-label"></div>',
    ],   
    [
        'name'            => 'Color',
        'id'              => "{$prefix}color",
        'type'            => 'select',
        'std'             => $color,
        'options'         => $color_options,
    ],
    [
        'name'        => esc_attr__('Size', 'architronix'),
        'id'          => "{$prefix}size",
        'type'        => 'select',
        'std'         => $size,
        'options'     => $size_options            
    ],
    [
        'name'            => 'CSS class',
        'id'              => "{$prefix}css_class",
        'type'            => 'text',
        'std'             => '',
        
    ],
    [
     
        'type'            => 'custom_html',
        'after'          => '</div>',
    ],
    
];

foreach ($fields as $key => $field) {    
    if($key > 1){
        $field['visible'] = ["{$prefix}customize", '=', true];
        if(!empty($field['name'])){
            $field['placeholder'] = $field['name'];
        }
    }
    $fields[$key] = $field;
}

return $fields;