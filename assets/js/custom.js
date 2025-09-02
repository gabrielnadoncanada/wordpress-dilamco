
(function($) {
    'use strict';
    
    const $header = $('header');
    const $window = $(window);
    const $mobileMenu = $('#architronixNavbar')
    const $mobileMenuOpen = $('#mobile-menu-open')
    const $mobileMenuClose = $('#mobile-menu-close')

    let lastScrollTop = 0;
    let scrollThreshold = $header.innerHeight(); // Minimum scroll distance before hiding header
    let isHeaderHidden = false;
    let isMobileMenuOpen = false;
    
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
        if (currentScrollTop > scrollThreshold && !isMobileMenuOpen) {
            
            // Scrolling down - hide header
            if (currentScrollTop > lastScrollTop && !isHeaderHidden) {
                hideHeader();
            }
            // Scrolling up - show header
            else if (currentScrollTop < lastScrollTop && isHeaderHidden) {
                showHeader();
            }
        } 
        // At top of page - always show header
        else if (currentScrollTop <= scrollThreshold && isHeaderHidden) {
            showHeader();
        }
        
        lastScrollTop = currentScrollTop;
    }


    function showHeader() {
        $header.addClass('header-visible').removeClass('header-hidden');
        isHeaderHidden = false;
    }

    function hideHeader() {
        $header.addClass('header-hidden').removeClass('header-visible');
        isHeaderHidden = true;
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
        
        $mobileMenu.css({
            'top': $header.innerHeight()
        })
        
        $mobileMenu.on('show.bs.offcanvas', function () {
  
         isMobileMenuOpen = true;
         $('.offcanvas-backdrop.show').css({
          'top': $header.innerHeight()  
         })

         $('body').addClass('mobile-menu-open');

         $mobileMenuOpen.hide();
         $mobileMenuClose.show();
        })

        $mobileMenu.on('hidden.bs.offcanvas', function () {
            isMobileMenuOpen = false;
            $mobileMenuOpen.show();
            $mobileMenuClose.hide();
            $('body').removeClass('mobile-menu-open');
        })

        $mobileMenu.find('.nav-link').on('click', function() {
          const offcanvas = bootstrap.Offcanvas.getInstance($mobileMenu[0]);
          if (offcanvas) {
              offcanvas.hide();
          }
      });
    });
    
})(jQuery);
