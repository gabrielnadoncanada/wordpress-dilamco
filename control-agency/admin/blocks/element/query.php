<?php
extract(wp_parse_args($args, [
    'name' => '',
    'id' => '',
    'query' => [],
    'size' => '',
    'css_class' => '',   
    'size_options' => [
        '' => esc_attr__('Default', 'architronix'),
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
$prefix = "{$query_id}_";

$group_fields = [
    [
        'name'        => esc_attr__('Post in', 'architronix'),
        'id'          => "posts__in",
        'type'        => 'post',
        'placeholder' => sprintf(esc_attr__('%s includes', 'architronix'), $name),
        'post_type'   => !empty($query['post_type'])? $query['post_type'] : 'post',
        'field_type'  => 'select_advanced',
        'multiple'  => true,
    ],
    [
        'name'            => 'Post type',
        'id'              => "post_type",        
        'type'            => 'select',
        'std'            => $query['post_type'],
        'attributes'        => [
            'value' => !empty($query['post_type'])? $query['post_type'] : 'post',
        ],
        'disabled'            => true,
    ],
    [
        'name'        => esc_attr__('Posts per page', 'architronix'),
        'id'          => "posts_per_page",
        'type'        => 'number',
        'min'         => '-1',
        'step'         => '1',
        'max'         => '20',
        'size' => 15
    ],
];
foreach ($group_fields as $key => $field) {     
     
    if(!empty($field['name'])){
        $field['placeholder'] = $field['name'];
        unset($field['name']);
    }
    $group_fields[$key] = $field;
}
$fields = [    
    [
        'name'            => '&nbsp;',
        'id'              => "{$query_id}",
        'type'            => 'group',
        'clone'             => true,
        'sort_clone'        => true,
        'clone_default'     => true,
        'clone_as_multiple' => true,
        'collapsible'       => true,
        'save_state'       => true,
        'class'             => 'control-agency-block-presets',
        'group_title'       => "{post_type}, {posts_per_page}",
        'std'             => (!empty($query[0]) && is_array($query[0]))?  $query : [$query],
        'fields'        => $group_fields
    ],
    
    
];

foreach ($fields as $key => $field) { 
    if(!empty($args['visible'])) {
        $field['visible'] = $args['visible'];  
    }
     
    $fields[$key] = $field;
}

return $fields;