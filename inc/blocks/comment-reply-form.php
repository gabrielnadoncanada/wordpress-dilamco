<?php
function custom_comment_form_defaults($defaults) {
    $req = get_option('require_name_email');
    $html5 = false;
    $required_attribute = ($html5 ? ' required' : ' required="required"');
    $checked_attribute  = ($html5 ? ' checked' : ' checked="checked"');
    $required_indicator = ' ' . wp_required_field_indicator();
    $required_text      = ' ' . wp_required_field_message();

    $defaults = array(
        'format' => $html5 ? 'html5' : 'xhtml',
        'title_reply'        => esc_attr__('Leave a comment', 'architronix'),
        'title_reply_before' => '<h4 id="reply-title" class="display-5 mb-4 mb-lg-30">',
        'title_reply_after'  => '</h4>',
        'class_container'    => 'comment-respond',
        'class_form'         => 'row',
        'comment_field' => sprintf(
            '<p class="col-12 comment-form-comment">%s</p>',
            sprintf(
                '<textarea id="comment" class="form-control" name="comment" cols="45" rows="5" placeholder="%s" maxlength="65525"%s></textarea>',
                esc_attr__('Write your comment*', 'architronix'),
                $required_attribute
            )
        ),
        'submit_field'       => '<p class="col-12 form-group form-submit mb-0">%1$s %2$s</p>',
        'submit_button'      => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-primary gap-10 %3$s">%4$s' . architronix_get_icon_svg('ui', 'next', 35) . '</button>'
    );

    return $defaults;
}
add_filter('comment_form_defaults', 'custom_comment_form_defaults');

function custom_comment_form_default_fields($fields) {
    $req = get_option('require_name_email');
    $html5 = false;
    $required_attribute = ($html5 ? ' required' : ' required="required"');
    $checked_attribute  = ($html5 ? ' checked' : ' checked="checked"');

    $commenter = wp_get_current_commenter();

    $fields = array(
        'author' => sprintf(
            '<div class="col-md-6"><p class="comment-form-author">%s</p></div>',
            sprintf(
                '<input id="author" class="form-control" name="author" placeholder="%s" type="text" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
                esc_attr__('Your name*', 'architronix'),
                esc_attr($commenter['comment_author']),
                ($req ? $required_attribute : '')
            )
        ),
        'email' => sprintf(
            '<div class="col-md-6"><p class="comment-form-email">%s</p></div>',
            sprintf(
                '<input id="email" class="form-control" placeholder="%s" name="email" type="email" value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
                esc_attr__('Your email*', 'architronix'),
                esc_attr($commenter['comment_author_email']),
                ($req ? $required_attribute : '')
            )
        ),
    );

    if (has_action('set_comment_cookies', 'wp_set_comment_cookies') && get_option('show_comments_cookies_opt_in')) {
        $consent = empty($commenter['comment_author_email']) ? '' : $checked_attribute;

        $fields['cookies'] = sprintf(
            '<p class="comment-form-cookies-consent">%s %s</p>',
            sprintf(
                '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
                $consent
            ),
            sprintf(
                '<label for="wp-comment-cookies-consent">%s</label>',
                __('Save my name, email, and website in this browser for the next time I comment.', 'architronix')
            )
        );
    }

    return $fields;
}
add_filter('comment_form_default_fields', 'custom_comment_form_default_fields');


