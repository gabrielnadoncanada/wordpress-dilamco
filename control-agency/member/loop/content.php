<?php
global $control_agency_counter;
$designation = get_post_meta(get_the_ID(), 'designation', true);
$read_more_text = control_agency_post_type_option('read_more_text');
$social_links = get_post_meta(get_the_ID(), 'social_links', true);
?>
<div class="col-md-6 col-lg-4">
    <div class="team-wrapper position-relative <?php echo esc_attr($control_agency_counter%3) == 1? 'team-style-2': 'team-style-1'; ?>">
        <?php if(has_post_thumbnail()): ?>
            <?php if(!empty($social_links)): ?>
                <?php 
                control_agency_render_template('global/social-links.php', [
                    'title' => '',
                    'social_links' => $social_links,
                ]); 
                ?>            
            <?php endif; ?>
        <div class="team-author-image overflow-hidden">
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'architronix-422x517-cropped' ) ?>" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="<?php esc_attr(get_the_title()) ?>">
        </div>
        <?php endif; ?>
        <a href="<?php the_permalink() ?>" class="text-decoration-none stretched-link" title="<?php echo esc_attr($read_more_text) ?>">
            <div class="team-details">											
                <div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
                    <div>
                        <span class="team-line-horizontal"></span>												
                        <span class="team-line-vertical"></span>
                        <?php the_title('<h5 class="author-name">', '</h5>'); ?>
                        <?php architronix_content($designation, '<p class="mb-0">', '</p>'); ?>                        
                    </div>
                    <div class="team-arrow-icon">
                        <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                        </svg>
                    </div>
                </div>																		
            </div>
        </a>
        
    </div>
</div>