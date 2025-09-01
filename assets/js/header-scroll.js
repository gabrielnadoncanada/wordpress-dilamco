/**
 * Header Hide/Show on Scroll
 * 
 * Hides header when scrolling down and shows it when scrolling up
 */
(function($) {
    'use strict';
    
    const $header = $('header');
    const $window = $(window);
    let lastScrollTop = 0;
    let scrollThreshold = $header.innerHeight(); // Minimum scroll distance before hiding header
    let isHeaderHidden = false;
    
    // Cache DOM elements
 console.log(scrollThreshold);
    
    // Add necessary CSS class for transitions
    $header.addClass('scroll-header');
    
    function handleScroll() {
        const currentScrollTop = $window.scrollTop();
        const scrollDifference = Math.abs(currentScrollTop - lastScrollTop);
        
        // Only proceed if we've scrolled enough
        if (scrollDifference < 5) {
            return;
        }
        
        // Check if we've scrolled past the threshold
        if (currentScrollTop > scrollThreshold) {
            
            // Scrolling down - hide header
            if (currentScrollTop > lastScrollTop && !isHeaderHidden) {
                $header.addClass('header-hidden').removeClass('header-visible');
                isHeaderHidden = true;
            }
            // Scrolling up - show header
            else if (currentScrollTop < lastScrollTop && isHeaderHidden) {
                $header.addClass('header-visible').removeClass('header-hidden');
                isHeaderHidden = false;
            }
        } 
        // At top of page - always show header
        else if (currentScrollTop <= scrollThreshold && isHeaderHidden) {
            $header.addClass('header-visible').removeClass('header-hidden');
            isHeaderHidden = false;
        }
        
        lastScrollTop = currentScrollTop;
    }
    
    // Throttle scroll events for better performance
    let scrollTimer = null;
    function throttledScroll() {
        if (scrollTimer !== null) {
            return;
        }
        
        scrollTimer = setTimeout(function() {
            handleScroll();
            scrollTimer = null;
        }, 10);
    }
    
    // Initialize
    $(document).ready(function() {
        // Add fallback class to body for browsers that don't support :has()
        $('body').addClass('header-scroll-active');
        
        // Bind scroll event
        $window.on('scroll', throttledScroll);
        
        // Handle mobile menu toggle - always show header when menu is opened
        $(document).on('click', '[data-bs-toggle="offcanvas"]', function() {
            if (!$header.hasClass('header-visible')) {
                $header.addClass('header-visible').removeClass('header-hidden');
                isHeaderHidden = false;
            }
        });
    });
    
})(jQuery);
