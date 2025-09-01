<div class="sticky-elements overflow-hidden">
    <div class="wow slideInRight">
        <?php if(has_post_thumbnail()): ?>
        <div class="team-single-image">
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'architronix-538x656-cropped' ) ?>" class="img-fluid object-fit-cover" alt="<?php esc_attr(get_the_title()) ?>">
        </div>
        <?php endif; ?>        
       
        <div class="architronix-button mt-30 mt-lg-40">
            <?php 
            $website = get_post_meta(get_the_ID(), 'website');
            control_agency_render_block('website', $website, true); 
            ?>            
        </div>        
    </div>								
</div>	