<?php 
$site_title = get_bloginfo('name');
$site_tagline = get_bloginfo('description');
$tagline = get_theme_mod('header_tagline', $site_tagline);
$tagline = str_replace(['[site_title]', '[site_tagline]'], [$site_title, $site_tagline], $tagline);
architronix_content($tagline, '<p class="header-element header-tagline mb-0 top-bar-text fw-semibold">', '</p>');
?>