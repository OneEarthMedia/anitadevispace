(function($) {
    
    // Empty
    
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