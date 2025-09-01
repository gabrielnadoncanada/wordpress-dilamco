<?php 
// expertises
if(!empty($expertises_title))
control_agency_render_template('global/simple-group.php', [
    'title' => $expertises_title,
    'group' => $expertises
]); 
// philosophy
if(!empty($philosophy_title))
control_agency_render_template('global/simple-group.php', [
    'title' => $philosophy_title,
    'group' => $philosophy
]);
// education
if(!empty($education_title))
control_agency_render_template('global/simple-group.php', [
    'title' => $education_title,
    'group' => $education
]);
// awards
if(!empty($awards_title))
control_agency_render_template('global/simple-group.php', [
    'title' => $awards_title,
    'group' => $awards
]);

// Contact info
control_agency_render_template('member/single/contact-info.php');
