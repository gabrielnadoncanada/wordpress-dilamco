<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-hero hero-3 position-relative max-width z-1 overflow-hidden bg-dark<?php echo esc_attr($additional_class); ?>">
    <div class="video-bg">
        <video muted loop autoplay>
            <?php
            if (!empty($background_video)) {
            ?>
                <source src="<?php echo esc_url($background_video); ?>" type="video/mp4">
            <?php
            } else {
                $background_video_url = get_theme_file_uri('assets/video/video-3.mp4');
            ?>
                <source src="<?php echo esc_url($background_video_url); ?>" type="video/mp4">
            <?php
            }
            ?>
        </video>
        <div class="video-bg-overlay"></div>
        <div>
            <div class="container">
                <div class="content-text text-start">
                    <h2 class="huge-text light-text typed-text fw-extra-bold lh-1">
                        <?php if (!empty($title_3)) : ?>
                            <span><?php echo esc_html($title_3); ?></span><br>
                        <?php endif; ?>
                        <?php
                        if (!empty($typed_texts)) :
                            $typed_texts = is_string($typed_texts) ? explode(',', $typed_texts) : $typed_texts;
                        ?>
                            <div id="typed-strings">
                                <?php foreach ($typed_texts as $typed_text) : ?>
                                    <p><?php echo esc_html($typed_text); ?></p>
                                <?php endforeach; ?>
                            </div>
                            <span id="typed"></span>
                        <?php endif; ?>
                    </h2>
                    <?php if (!empty($button3_text) && !empty($button3_url)) : ?>
                        <div class="architronix-button">
                            <a href="<?php echo esc_url($button3_url); ?>" class="btn btn-secondary gap-10"><?php echo wp_kses_post($button3_text); ?>
                                <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
