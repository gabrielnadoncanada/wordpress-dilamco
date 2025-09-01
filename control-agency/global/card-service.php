<div class="card-corp-type-2 parallax-item grow-up card-service<?php echo esc_attr($class) ?>">
    <?php if(!empty($icon)): ?>
    <div class="card-icon">
        <span><img src="<?php echo esc_url($icon) ?>" alt="<?php esc_attr($title) ?>"></span>
    </div>
    <?php endif; ?>
    <div class="card-info">
        <?php control_agency_content($title, '<h4 class="card-title color-white">', '</h4>') ?>
        <?php control_agency_content($subtitle, '<p class="card-desc font-lg color-white">', '</p>') ?>
        <?php if(!empty($button_text) || !empty($button_url)): ?>
        <a class="font-xl color-900" href="<?php echo esc_url($button_url) ?>"><?php echo esc_html($button_text) ?><img class="ml-15" src="<?php echo get_theme_file_uri('assets/imgs/template/icons/arrow.svg') ?>" alt="<?php esc_attr($button_text) ?>"></a>
        <?php endif; ?>
    </div>
</div>