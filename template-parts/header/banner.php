<?php 
if(!architronix_layout_get('display_banner')) return; 
$wrapper_classes = [
    'section-banner',
    'position-relative'
];

$args = [
    'name' => architronix_layout_get('banner_prefix'),
    'title' => architronix_layout_get('banner_title'),
    'subtitle' => architronix_layout_get('banner_subtitle'),
    'name_color' => 'primary'
];
$image = architronix_layout_get('banner_image');
if(!empty($image)){
    $wrapper_classes[] = 'section-bg';
    $wrapper_classes[] = 'mb-lg-120 mb-60';
}
?>
<!--Banner Section ======================-->
<section class="<?php echo implode(' ', array_filter(array_unique($wrapper_classes))) ?>"<?php echo !empty($image)?architronix_banner_css_style($image): '' ?>>
    <div class="section-full-width">
        <div class="section-title-wrapper position-relative">	
            
                <?php architronix_content( architronix_layout_get('banner_prefix'), '<div class="scroll-move scroll-move-right"><span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">', '</span></div>' ) ?>
            				
            
            <div class="container">	
                <div class="section-title section-separator">
                    <?php architronix_content(architronix_layout_get('banner_title'),'<h2 class="fw-extra-bold heading-title separator lh-1">', '</h2>') ?>
                    <?php architronix_content( architronix_layout_get('banner_subtitle'), '<div><p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">', '</p></div>') ?>
                </div>
            </div>
        </div>
        <!-- section-title-wrapper -->	
    </div>		
    <!-- section-full-width -->	
</section>
<!--Banner Section ======================-->
