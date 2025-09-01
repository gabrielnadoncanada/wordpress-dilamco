<?php
foreach ($buttons as $key => $button) {
    $button = wp_parse_args($button, [
        'button_text' => '',
        'button_url' => '',
        'class' => '',
    ]);
    if(empty($button['button_text']) || empty($button['button_url'])) continue;
    printf('<a class="%s" href="%s">%s%s</a>', $button['class'], esc_url($button['button_url']), esc_attr($button['button_text']), '<img class="ml-15" src="'.get_theme_file_uri('assets/imgs/template/icons/arrow.svg').'" alt="'.esc_attr($button['button_text']).'">' );
}