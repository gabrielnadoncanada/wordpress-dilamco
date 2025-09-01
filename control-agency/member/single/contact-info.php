<?php
$contact_title = get_post_meta(get_the_ID(), 'contact_title', true);
$emails_title = get_post_meta(get_the_ID(), 'emails_title', true);
$emails = get_post_meta(get_the_ID(), 'emails', true);
$phones_title = get_post_meta(get_the_ID(), 'phones_title', true);
$phones = get_post_meta(get_the_ID(), 'phones', true);
$social_links_title = get_post_meta(get_the_ID(), 'social_links_title', true);
$social_links = get_post_meta(get_the_ID(), 'social_links', true);
?>
<div>
    <?php control_agency_content($contact_title, '<h4 class="mb-4 mb-lg-30">', '</h4>') ?>	
    <ul class="team-contact-list list-unstyled mb-0 d-flex flex-column gap-10">
        <?php if(!empty($emails)): ?>
            <li class="d-flex align-items-center">
                <?php
                control_agency_content($emails_title, '<span class="fw-extra-bold">', '</span>');
                $emailsArr = explode(',', $emails);
                foreach ($emailsArr as $email) {
                    if(empty($email)) continue;
                    printf('<a href="mailto:%1$s" class="text-decoration-none link-hover-animation-1">%1$s</a>', $email);
                }
                ?>
            </li>
        <?php endif; ?>

        <?php if(!empty($phones)): ?>
            <li class="d-flex align-items-center">
                <?php
                control_agency_content($phones_title, '<span class="fw-extra-bold">', '</span>');
                $phonesArr = explode(',', $phones);
                foreach ($phonesArr as $phone) {
                    if(empty($phone)) continue;
                    printf('<a href="tel:%1$s" class="text-decoration-none link-hover-animation-1">%1$s</a>', $phone);
                }
                ?>
            </li>
        <?php endif; ?>

        <?php if(!empty($social_links)): ?>
        <li class="d-flex align-items-center">
            <?php 
            control_agency_render_template('global/social-links.php', [
                'title' => $social_links_title,
                'social_links' => $social_links,
            ]); 
            ?>
        </li>
        <?php endif; ?>
    </ul>									
</div>