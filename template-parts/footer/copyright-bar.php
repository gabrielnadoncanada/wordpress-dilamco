<?php
 

extract(wp_parse_args($args, array(
    'made_by_text' => get_theme_mod('made_by_text', sprintf(' %s, Made with Love by %s',esc_attr(get_bloginfo('name', 'display')), '<a class="text-decoration-none link-hover-animation-1" href="//themeperch.net/">Themeperch</a>')),
    'made_by_link' => get_theme_mod('made_by_link', '#'),
)));

$made_by_text = architronix_parse_link_text($made_by_text, $made_by_link);
   

$copyright_text = get_theme_mod('copyright_text', '©'.date('Y').', Architronix, All Rights Reserved');

?>

<div class="copyright d-flex flex-column gap-2 flex-lg-row justify-content-lg-between align-items-lg-center text-center text-sm-start">
    <p class="mb-0 right"><?php echo wp_kses_post($copyright_text) ?></p>
</div>
 