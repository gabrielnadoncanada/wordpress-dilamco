(function ($) {
    'use strict';

    const { select, subscribe } = wp.data;

    class architronix_PageTemplateSwitcher {
        constructor() {
            this.template = null;
        }

        init() {
            // Only initialize if we are in the post editor
            if (wp.editPost) {
                // We're in the post editor
                subscribe(() => {
                    const newTemplate = select('core/editor').getEditedPostAttribute('template');
                    this.handleTemplateChange(newTemplate);
                });
            }
            
        }

        handleTemplateChange(newTemplate) {
            architronix_add_container_wrapper_class(newTemplate);
            if (newTemplate && newTemplate !== this.template) {
                this.template = newTemplate;
                this.changeTemplate();
            }
        }

        changeTemplate() {
            architronix_add_container_wrapper_class(this.template);
        }
    }

    function architronix_add_container_wrapper_class(template) {
        $('body').removeClass('editor-styles-wrapper-full');
        if (template === 'templates/fullwidth-template.php' || template === 'templates/blank-template.php') {
            $('body').addClass('editor-styles-wrapper-full');
        }
    }

    new architronix_PageTemplateSwitcher().init();
})(jQuery);