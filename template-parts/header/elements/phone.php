<?php
$args = get_theme_mod('header_phone', []);
extract(wp_parse_args($args, [
    'label' => esc_attr__('Call Us:', 'architronix'),
    'phones' => '+(1800)456-7890'
]));
if(empty($phones)) return;
$phonesArr = explode(',', $phones);
foreach ($phonesArr as $key => $value) {
    if(empty(trim($value))) continue;
    $phonesArr[$key] = sprintf('<a href="tel:%1$s" class="text-decoration-none link-hover-animation-1">%1$s</a>', esc_attr(trim($value)));
}
?>
<div class="header-element header-contact top-bar-contact-lists">
    <p class="mb-0 fw-bold">
        <?php echo esc_attr($label); ?>
        <?php echo implode(', ', $phonesArr); ?>
    </p>
</div>
