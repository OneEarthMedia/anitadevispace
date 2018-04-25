/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function($) {
    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    
    // Sub-nav hover class
    // ------------------------------------------
    $('#primary-menu li.menu-item-has-children').hover(function() {
        $(this).find('ul.sub-menu').toggleClass('visible');
    });
    
    // Change the full nav when scrolling down
    // ------------------------------------------
    $(window).scroll(function() {
        
        var currentScroll = $(window).scrollTop();
        
        if ( currentScroll < 50 ) {
            $('#masthead').removeClass('scrolled');
        } else {
            $('#masthead').addClass('scrolled');
        }
                
    });
    
    // Toggle Mobile Navigation
    // ------------------------------------------    
    $('#masthead .toggle-mobnav').click(function(e) {
        e.preventDefault();
        
        if ( $(this).hasClass('toggled') ) {
            $('.toggle-mobnav').removeClass('toggled');
            $('body').removeClass('noscroll');
            
            $('#mobile-navigation').addClass('animated fadeOutUp').one(animationEnd, function() {
                jQuery(this).removeClass('animated fadeOutUp toggled');
                jQuery(this).off(animationEnd);
            });
            
            return;
        }
        
        $(this).addClass('toggled');
        $('body').addClass('noscroll');
        $('#mobile-navigation').addClass('toggled').animateCss('fadeInDown');
        
    });
    
    // Mobile Navigation Subnav
    $('#mobile-navigation li.menu-item-has-children a').click(function(e) {
        e.preventDefault();
        
        if ( $(this).next('ul.sub-menu').hasClass('toggled') ) {
            $('#mobile-navigation ul.sub-menu').removeClass('toggled');
            $(this).removeClass('expanded');
            return;
        } else {
            $('#mobile-navigation ul.sub-menu').removeClass('toggled');
            $(this).removeClass('expanded');
        }
        
        $(this).addClass('expanded');
        $(this).next('ul.sub-menu').addClass('toggled').animateCss('fadeIn');
    });
    
}) (jQuery);

// animateCSS function ** https://github.com/daneden/animate.css
// This is useful for removing the aninmation classes after the animation is complete.
jQuery.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        jQuery(this).addClass('animated ' + animationName).one(animationEnd, function() {
            jQuery(this).removeClass('animated ' + animationName);
            jQuery(this).off(animationEnd);
        });
    }
});