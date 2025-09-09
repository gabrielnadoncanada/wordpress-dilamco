<?php 
$site_title = get_bloginfo('name');
$site_tagline = get_bloginfo('description');
$mobile_tagline = get_theme_mod('mobile_header_tagline', '[site_title] - [site_tagline]');
$mobile_tagline = str_replace(['[site_title]', '[site_tagline]'], [$site_title, $site_tagline], $mobile_tagline);
architronix_content($mobile_tagline, '<p class="header-element mobile-header-tagline mb-0 mobile-text fw-semibold text-center">', '</p>');
?>
