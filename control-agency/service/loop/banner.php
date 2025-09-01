<!--Banner Section ======================-->
<?php
$wrapper_classes = [
    'section-banner',
    'position-relative',
    'section-bg',
    'mb-lg-120 mb-60'
];
$image = architronix_layout_get('banner_image');
$args = [
    'name' => architronix_layout_get('banner_prefix'),
    'title' => architronix_layout_get('banner_title'),
    'subtitle' => architronix_layout_get('banner_subtitle'),
    'name_color' => 'primary'
];
?>
<section class="<?php echo implode(' ', array_filter(array_unique($wrapper_classes))) ?>"<?php echo !empty($image)?control_agency_banner_css_style($image): '' ?>>
    <div class="section-full-width">
        <?php
            control_agency_render_template('global/section-title-1.php', $args); 
        ?>
    </div>		
    <!-- section-full-width -->	
</section>
<!--Banner Section ======================-->