<div class="accordion-item">
    <h2 class="accordion-header" id="<?php echo esc_attr($accordion_question_id); ?>">
        <button class="accordion-button d-flex justify-content-between align-items-center <?php echo esc_attr($collapse_class) ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($accordion_answer_id) ?>" aria-expanded="<?php echo esc_attr($aria_expanded) ?>" aria-controls="<?php echo esc_attr($count) ?>">
            <?php architronix_content($question, '<span class="accordion-title fw-semibold">', '</span>'); ?>
            <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 11L21.5 11" stroke="#253B2F" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                <path d="M11.5 1L11.5 21" stroke="#253B2F" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
            </svg>
        </button>
    </h2>
    <div id="<?php echo esc_attr($accordion_answer_id) ?>" class="accordion-collapse collapse <?php echo esc_attr($show_class) ?>" data-bs-parent="#<?php echo esc_attr($accordion_id); ?>">
        <?php architronix_content(wpautop($answer), '<div class="accordion-body mb-0">', '</div>'); ?>
    </div>
</div>