<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<section class="section-faq section-full-width position-relative<?php echo esc_attr($additional_class); ?>">
    <div class="container">
        <div class="row align-items-center gx-60 gy-5">
            <div class="col-lg-5">
                <?php $image_url = control_agency_get_attachment_url($image, 'full', get_theme_file_uri('assets/images/faq-image.jpg')); ?>
                <div class="faq-image overflow-hidden">
                    <img src="<?php echo esc_url($image_url) ?>" class="obeject-fit-cover wow slideInLeft responsive-image" width="505" height="657" alt="<?php bloginfo('name') ?>">
                </div>
            </div>
            <!-- col-5 -->
            <div class="col-lg-7">
                <?php if (!empty($faqs)) :
                    $accordion_id = uniqid('accordionFAQ-');
                ?>
                    <div class="faq-accordion">
                        <div class="accordion" id="<?php echo esc_attr($accordion_id); ?>">
                            <?php
                            $count = 1;
                            foreach ($faqs as $faq) :
                                if (empty($faq['question']) || empty($faq['answer'])) continue;

                                $faq['accordion_id'] = $accordion_id;
                                $faq['count'] = $count;
                                $faq['accordion_question_id'] = uniqid('accordionListingFaq-');
                                $faq['accordion_answer_id'] = uniqid('listingFaqAnswer-');
                                $faq['collapse_class'] = ($count > 1) ? ' collapsed' : '';
                                $faq['show_class'] = ($count == 1) ? ' show' : '';
                                $faq['aria_expanded'] = ($count == 1) ? 'true' : 'false';

                                control_agency_render_template('global/faq.php', $faq);
                                $count++;
                            endforeach;
                            ?>
                        </div>
                        <!-- .accordion -->
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
