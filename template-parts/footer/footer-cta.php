<?php 
extract(wp_parse_args($args, [
    'enable_cta' => get_theme_mod('enable_cta', false),
    'cta_title' => get_theme_mod('cta_title', esc_attr__("Drop Us a Line", 'architronix')),
    'button_text' => get_theme_mod('button_text', esc_attr__('Let\'s Talk', 'architronix')),
    'button_link' => get_theme_mod('button_link', '#'),
    'background_image' => get_theme_mod('background_image')
]));
if(!$enable_cta) return;
?>

<!--Feedback Section ====================== -->

<section class="section-feedback feedback-1 text-secondary section-full-width">
<?php
if(!is_front_page()) {
?>
    <div class="feedback-wrapper position-relative"<?php echo architronix_inline_background_image($background_image); ?>>
        <div class="container">
            <div class="feedback-content d-flex flex-column gap-4 flex-lg-row align-items-lg-end justify-content-lg-around">
                <?php architronix_content($cta_title, '<h2 class="fw-extra-bold feedback-title">', '</h2>') ?>
                <?php if(!empty($button_link) || !empty($button_text)): ?>
                <div class="architronix-button">
                    <a href="<?php echo esc_url($button_link); ?>" class="btn btn-secondary gap-10">
                        <?php echo esc_attr($button_text); ?>
                        <svg class="arrow" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
                        </svg>
                    </a>
                </div>	
                <?php endif; ?>						
            </div>
        </div>
    </div>
    <?php } ?>
</section>

<!--Feedback Section ====================== -->


