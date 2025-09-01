<!--Banner Section ======================-->
<?php
$classes = [
    'section-banner',
    'position-relative'
];
if(!empty($image)){
    $classes[] = 'section-bg';
    $classes[] = 'mb-lg-120 mb-60';
}
?>
<section class="<?php echo implode(' ', array_filter(array_unique($classes))) ?>"<?php echo !empty($image)?control_agency_banner_css_style($image): '' ?>>
    <div class="section-full-width">
        <?php
            control_agency_render_template('global/section-title-1.php', $args); 
        ?>
    </div>		
    <!-- section-full-width -->	
</section>
<!--Banner Section ======================-->
