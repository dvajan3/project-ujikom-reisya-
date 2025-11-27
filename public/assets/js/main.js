// Main JavaScript file
(function($) {
    'use strict';
    
    // Document ready
    $(document).ready(function() {
        // Mobile menu
        $('.mobile_menu').slicknav({
            prependTo: '.mobile_menu'
        });
        
        // Search functionality
        $('.search-switch').on('click', function() {
            $('.search-model-box').fadeIn(400);
        });
        
        $('.search-close-btn').on('click', function() {
            $('.search-model-box').fadeOut(400, function() {
                $('#search-input').val('');
            });
        });
        
        // Smooth scrolling
        $('a[href*="#"]').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 500, 'linear');
        });
    });
    
})(jQuery);