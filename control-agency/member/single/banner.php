<?php
$designation = get_post_meta(get_the_ID(), 'designation', true);
$subtitle = architronix_layout_get('banner_subtitle');
if(empty($subtitle)){
    $subtitle = $designation;
}
?>
<!--Banner Section ======================-->
<section class="section-banner position-relative pt-60">
    <div class="section-full-width">
        <div class="section-title-wrapper position-relative">	
            <div class="scroll-move">
                <?php architronix_content( architronix_layout_get('banner_prefix'), '<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">', '</span>' ) ?>
            </div>				
            
            <div class="container">	
                <div class="section-title section-separator">
                    <?php architronix_content(architronix_layout_get('banner_title'),'<h2 class="fw-extra-bold heading-title heading-title-style-2 separator lh-1">', '</h2>') ?>
                    <?php architronix_content( $subtitle, '<div><p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">', '</p></div>') ?>
                </div>
            </div>
        </div>
        <!-- section-title-wrapper -->	
    </div>		
    <!-- section-full-width -->	
</section>
<!--Banner Section ======================-->
