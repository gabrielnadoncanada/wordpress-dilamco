<?php
$args = get_theme_mod('header_email', []);
$defaults = [
    'label' => '',
    'emails' => 'contact@themeperch.net'
];
extract(wp_parse_args($args, $defaults));
if(empty($emails)) return;
$emailsArr = explode(',', $emails);
foreach ($emailsArr as $key => $value) {
    if(empty(trim($value))) continue;
    $emailsArr[$key] = sprintf('<a href="mailto:%1$s" class="text-decoration-none link-hover-animation-1">%1$s</a>', esc_attr(trim($value)));
}
?>
<div class="header-element header-contact top-bar-contact-lists">
    <p class="mb-0 fw-bold">
        <?php if(!empty($label)) echo esc_attr($label); ?>
        <?php echo implode(', ', $emailsArr); ?>
    </p>
</div>
