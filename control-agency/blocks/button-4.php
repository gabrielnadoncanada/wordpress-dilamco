<?php if (!empty($button_text) && !empty($button_url)) : ?>
<div class="architronix-button w-100">
    <a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary gap-10 w-100"><?php echo wp_kses_post($button_text); ?>
        <svg class="arrow" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
        </svg>
    </a>
</div>
<?php endif; ?>	