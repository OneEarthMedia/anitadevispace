/**
 * JS to make the theme beautiful
 */

( function($) {
    
    // AOS Init
    AOS.init({
      offset: 100,
      duration: 400,
      easing: 'ease-in-sine',
    });
    
    // Smooth Scrolling to element
    $('html').on('click', '.scroll-to', function() {
        var scrollToID = $(this).attr('href'),
            headerHeight = $('#masthead').height();
        
        $('html, body').animate({
            scrollTop: $(scrollToID).offset().top - headerHeight,
        }, 500);
        
    });

})(jQuery);

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