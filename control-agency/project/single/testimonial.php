<div class="box-quote-portfolio">
    <div class="box-quote-inner">
        <div class="quote-content">
            <?php architronix_content($testimonial_content, '<p class="font-42">', '</p>'); ?>
            
            <div class="box-author">
                <?php if(!empty($testimonial_image) ): ?>
                <a href="<?php echo esc_url($website) ?>"><img src="<?php echo esc_url($testimonial_image) ?>" alt="<?php echo esc_attr($name) ?>"></a>
                <?php endif; ?>
                <div class="author-info">
                    <a href="<?php echo esc_url($website) ?>"><span class="heading-5 color-900 author-name"><?php echo esc_html($name) ?></span></a>
                    <span class="font-lg color-600 department"><?php echo esc_html($designation) ?></span>
                </div>
            </div>
        </div>
    </div>
</div>