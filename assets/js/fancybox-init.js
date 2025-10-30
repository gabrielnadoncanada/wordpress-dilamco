/**
 * Fancybox Initialization
 * 
 * Initializes Fancybox for images, galleries, and videos
 */
(function($) {
    'use strict';

    // Wait for DOM and Fancybox to be ready
    $(document).ready(function() {
        if (typeof Fancybox !== 'undefined') {
            
            // // Initialize Fancybox with default options
            // Fancybox.bind('[data-fancybox]', {
            //     // Animation effect
            //     animated: true,
                
            //     // Enable keyboard navigation
            //     keyboard: {
            //         Escape: "close",
            //         Delete: "close",
            //         Backspace: "close",
            //         PageUp: "next",
            //         PageDown: "prev",
            //         ArrowUp: "prev",
            //         ArrowDown: "next",
            //         ArrowRight: "next",
            //         ArrowLeft: "prev",
            //     },
                
            //     // Enable touch gestures
            //     touch: {
            //         vertical: true,
            //         momentum: true
            //     },
                
            //     // Toolbar buttons
            //     Toolbar: {
            //         display: {
            //             left: [],
            //             middle: [],
            //             right: ["close"],
            //         },
            //     },
                
            //     // Thumbnails
            //     Thumbs: {
            //         type: "classic",
            //     },
                
            //     // Image settings
            //     Image: {
            //         zoom: true,
            //         click: "toggleZoom",
            //         wheel: "zoom",
            //     },
                
            //     // Customizable options
            //     l10n: {
            //         CLOSE: "Fermer",
            //         NEXT: "Suivant",
            //         PREV: "Précédent",
            //         MODAL: "Vous pouvez fermer cette fenêtre avec la touche ESC",
            //         ERROR: "Une erreur s'est produite. Veuillez réessayer plus tard",
            //         IMAGE_ERROR: "Image introuvable",
            //         ELEMENT_NOT_FOUND: "Élément HTML introuvable",
            //         AJAX_NOT_FOUND: "Erreur lors du chargement AJAX : Introuvable",
            //         AJAX_FORBIDDEN: "Erreur lors du chargement AJAX : Interdit",
            //         IFRAME_ERROR: "Erreur lors du chargement de la page",
            //     },
            // });
            Fancybox.bind("[data-fancybox]", {
                on: {
                    reveal: () => {
                        document.documentElement.classList.add('fancybox-active');
                    },
                    destroy: () => {
                        document.documentElement.classList.remove('fancybox-active');
                    }
                }
            });

            console.log('Fancybox initialized successfully');
        } else {
            console.warn('Fancybox library not loaded');
        }
    });

})(jQuery);

