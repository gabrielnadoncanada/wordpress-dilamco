<div class="project-overview-details bg-primary text-secondary wow slideInLeft">
    <div>
        <?php !empty($title) ? architronix_content($title, '<h5 class="display-5 fw-extra-bold mb-0">', '</h5>') : ''; ?>
        <?php !empty($description) ? architronix_content($description, '<p class="project-overview-description mb-0">', '</p>') : ''; ?>
        <ul class="project-overview-list list-unstyled mb-0 d-flex flex-column gap-10">
            <?php if (!empty($details)) :
                foreach ($details as $detail) :
            ?>
                    <li class="d-flex align-items-center">
                        <?php !empty($detail['label']) ? architronix_content($detail['label'], '<span class="fw-extra-bold">', '</span>') : ''; ?>
                        <?php !empty($detail['content']) ? architronix_content($detail['content'], '<span>', '</span>') : ''; ?>
                    </li>
            <?php endforeach;
            endif;
            ?>
        </ul>
        <?php if (!empty($button_url) && !empty($button_text)) : ?>
            <div class="mt-4 mt-lg-30 mt-xxl-40">
                <a href="<?php echo esc_url($button_url); ?>" class="btn btn-link link-hover-animation-1 d-inline-flex gap-10 align-items-center"><?php echo esc_html($button_text);  ?><span>
                        <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
                        </svg></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>