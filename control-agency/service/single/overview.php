<?php 
// expertises
if(!empty($offers_title))
control_agency_render_template('global/simple-group.php', [
    'title' => $offers_title,
    'group' => $offers
]); 
// philosophy
if(!empty($work_steps_title))
control_agency_render_template('global/simple-group.php', [
    'title' => $work_steps_title,
    'group' => $work_steps
]);

$desc = str_replace('[post_title]', get_the_title(), $desc);
control_agency_content($desc, '<p class="mb-0 fs-5 fw-bold">', '</p>');