<?php
return [
    [
        'id' => 'body',
        'label' => 'Body',
        'selectors' => 'body',
        'prefix' => 'bs-body',
        'excludes' => ['font_family', 'color'],
        'css_vars' => ['color', 'line_height', 'font_family', 'font_size', 'font_weight', 'text_align']
    ],
    [
        'id' => 'link',
        'label' => 'Link',
        'selectors' => 'a',
        'excludes' => 'color'
    ],
    [
        'id' => 'button',
        'label' => 'Button',
        'selectors' => '.btn',
        'prefix' => 'btn',
        'excludes' => 'color'
    ],
    [
        'id' => 'heading_1',
        'label' => 'Heading 1',
        'selectors' => '.h1, .fs-1',
    ],
    [
        'id' => 'heading_2',
        'label' => 'Heading 2',
        'selectors' => '.h2, .fs-2',
    ],
    [
        'id' => 'heading_3',
        'label' => 'Heading 3',
        'selectors' => '.h3, .fs-3',
    ],
    [
        'id' => 'heading_4',
        'label' => 'Heading 4',
        'selectors' => '.h4, .fs-4',
    ],
    [
        'id' => 'heading_5',
        'label' => 'Heading 5',
        'selectors' => '.h5, .fs-5',
    ],
    [
        'id' => 'heading_6',
        'label' => 'Heading 6',
        'selectors' => '.h6, .fs-6',
    ],
    [
        'id' => 'display_1',
        'label' => 'Display 1',
        'selectors' => '.display-1',
        'includes' => 'font_size',
        'important' => true
    ],
    [
        'id' => 'display_2',
        'label' => 'Display 2',
        'selectors' => '.display-2',
        'includes' => 'font_size',
        'important' => false
    ],
    [
        'id' => 'display_3',
        'label' => 'Display 3',
        'selectors' => '.display-3',
        'includes' => 'font_size',
        'important' => false
    ],
    [
        'id' => 'display_4',
        'label' => 'Display 4',
        'selectors' => '.display-4',
        'includes' => 'font_size',
        'important' => false
    ],
    [
        'id' => 'display_5',
        'label' => 'Display 5',
        'selectors' => '.display-5',
        'includes' => 'font_size',
        'important' => false
    ],
    [
        'id' => 'display_6',
        'label' => 'Display 6',
        'selectors' => '.display-6',
        'includes' => 'font_size',
        'important' => false
    ],
];