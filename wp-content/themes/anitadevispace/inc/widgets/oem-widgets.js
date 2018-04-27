(function($) {
    
    // Empty
    
    // Album Widget
    // ------------------------------------
    
    $('.album-widget').each(function() {
        var albumId = $(this).attr('data-album-id');
        
        // Slideshow style (default)
        $('.oem-album-'+ albumId +'.slideshow').owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            responsiveClass: true,
            nav: false,
            navText: ['<span class="album-nav fa fa-angle-left"></span>','<span class="album-nav fa fa-angle-right"></span>'],
            responsive: {
                0:{
                    items:2,
                },
                960:{
                    items:3,
                },
                1280:{
                    items:5
                }
            }
        });    

        // Banner Style
        $('.oem-album-'+ albumId +'.banner').owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            responsiveClass: true,
            nav: false,
            navText: ['<span class="album-nav fa fa-angle-left"></span>','<span class="album-nav fa fa-angle-right"></span>'],
        });    

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