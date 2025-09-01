<?php
$args = get_theme_mod('header_email', []);
extract(wp_parse_args($args, [
    'label' => esc_attr__('Email Us:', 'architronix'),
    'emails' => 'contact@themeperch.net'
]));
if(empty($emails)) return;
$emailsArr = explode(',', $emails);
foreach ($emailsArr as $key => $value) {
    if(empty(trim($value))) continue;
    $emailsArr[$key] = sprintf('<a href="mailto:%1$s" class="text-decoration-none link-hover-animation-1">%1$s</a>', esc_attr(trim($value)));
}
?>
<div class="header-element header-contact top-bar-contact-lists">
    <p class="mb-0 fw-bold">
        <?php echo esc_attr($label); ?>
        <?php echo implode(', ', $emailsArr); ?>
    </p>
</div>
