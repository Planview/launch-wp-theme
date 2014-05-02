// Call webshims and force it to use our current jQuery
webshims.cfg.no$Switch = true;
webshims.polyfill();

// Hack for IE8 font-face in pseudo-elements aka icons
(function ($) {
    'use strict';
    if ( $('html').hasClass('lt-ie9') ) {
        $("<style>*:before,*:after{content:none !important;}</style>")
            .attr('id', 'icon-fix').attr('type', 'text/css').appendTo('head');
    }
})(jQuery);
jQuery(document).ready(function ($) {
    'use strict';
    if ( $('html').hasClass('lt-ie9') ) {
        $('#icon-fix').remove();
    }
});

//  Fancybox and bxSlider
jQuery(document).ready(function($) {
    $('.fancybox').fancybox();
  	$('.bxslider').bxSlider({
  		auto: true,
  	});
});
