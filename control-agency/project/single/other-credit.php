<div class='container'>
<?php control_agency_content($section_title, '<div class="section-padding-md"><div class="row"><div class="col-lg-8"><div class="section-title section-separator"><h2 class="fw-extra-bold heading-title lh-1">', '</h2></div></div></div></div>'); ?>

<?php if (!empty($credits)) : ?>
    <?php $credit_count = 0; ?>
    <div class="row">
        <?php foreach ($credits as $credit) : ?>
            <?php if ($credit_count > 0 && $credit_count % 3 === 0) : ?>
                </div><div class="row">
            <?php endif; ?>
            <div class="col-lg-4">
                <div class="credits-wrapper">
                    <?php
                    if (!empty($credit['image']) && !is_array($credit['image'])) {
                        $credit['image'] = explode(',', $credit['image']);
                    }
                    if (!empty($credit['image'][0])) {
                        $image_url = wp_get_attachment_image_url($credit['image'][0], 'full');
                    } else {
                        $image_url = get_theme_file_uri('assets/images/credit-image-1.jpg');
                    }
                    ?>
                    <div class="credit-image">
                        <img src="<?php echo esc_url($image_url); ?>" class="object-fit-cover" width="415" height="415" alt="<?php bloginfo('name') ?>">
                    </div>
                    <?php if (!empty($credit['company_name'])) : ?>
                        <a href="<?php echo esc_url($credit['company_url']); ?>">
                            <h5 class="mt-4 mt-lg-30"><?php echo esc_html($credit['company_name']); ?></h5>
                        </a>
                    <?php endif; ?>
                    <?php control_agency_content($credit['company_type'], '<p class="mb-0 pt-1">', '</p>'); ?>
                </div>
            </div>
            <?php $credit_count++; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</div>


