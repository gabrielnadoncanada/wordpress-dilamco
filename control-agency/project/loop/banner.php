<!--Banner Section ======================-->
<?php
$wrapper_classes = [
    'section-banner',
    'position-relative',
    'pt-100',
    'pt-xxl-120'
];
if(!empty($image)){
    $wrapper_classes[] = 'section-bg';
    $wrapper_classes[] = 'mb-lg-120 mb-60';
}
$args = [
    'name' => __('Projets', 'architronix'),
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
