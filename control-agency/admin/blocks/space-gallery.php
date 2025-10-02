<?php 
return [
    'title'           => 'Space Gallery',
    'id'              => 'space-gallery',
    'icon'            => 'format-gallery',
    'description'     => 'Display space gallery',
    'fields'          => [
        [            
            'type' => 'select',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'space/single/media-isotope.php',
            'options' => [
                'space/single/media-isotope.php' => 'Grid',
                'space/single/media-carousel.php' => 'Carousel',
                'space/single/media-slider.php' => 'Slider',
            ] 
        ],
        [
            'id'               => 'gallery',
            'name'             => esc_attr__('Gallery images', 'architronix'),
            'desc'             => esc_attr__('Used for single space gallery inmages in content', 'architronix'),
            'type'             => 'image_advanced',
            'force_delete'     => false,
            'max_file_uploads' => 6,
            'max_status'       => true,
            'image_size'       => 'thumbnail',
        ],       
        [
            'type'  => 'textarea',
            'id'    => 'gallery_desc',
            'name' => esc_attr('Gallery Description', 'architronix'),
            'std' => 'The structural system is composed of pillars and beams with the same section, connected by a metallic cube that works as a structural node. When combined, they can result in different configurations of layouts and attend several programs within a limit of up to three floors, either in a flat or sloped terrain. the external and internal finishings, such as floors, walls and linings, are also conceived as part of a docking system. In this way, you can assembly and disassemble the residence in the lot without generating waste or consuming natural resources such as water - abundantly wasted in conventional construction. From design to conclusion can take only 6 months.',
        ],
      
                
    ],
];