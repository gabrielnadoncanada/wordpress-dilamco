<?php 
$social_links = get_theme_mod('header_social_links', []);
if(empty($social_links) || !is_array($social_links)) return; 
?>         
<ul class="element-header header-social-links contact-lists list-unstyled mb-0 d-flex">
    <?php
        foreach ($social_links as $social_link) {
            extract(wp_parse_args($social_link, [
                'title' => '',
                'label' => '',
                'icon' => '',
                'url' => '',
                'css_class' => '',
            ]), EXTR_PREFIX_ALL, 'social');
            if(empty($social_title) || empty($social_url)) continue;
            $social_label = !empty($social_label)? $social_label : $social_title;
            $social_label = !empty($social_icon)? architronix_get_icon_svg('social', $social_icon, 24) : $social_label;
            $css_class = !empty($social_icon)? 'text-decoration-none' : 'text-decoration-none text-uppercase link-hover-animation-1';
            $css_class .= !empty($social_css_class)? ' '.$social_css_class : '';
            printf('<li><a href="%2$s" target="_blank" class="%3$s" aria-label="top-bar-link">%1$s</a></li>', $social_label, esc_url($social_url), esc_attr($css_class));
        }
    ?>
</ul>