// Call webshims and force it to use our current jQuery
webshims.cfg.no$Switch = true;
webshims.polyfill("canvas details es5 filereader geolocation mediaelement " +
    "picture promise track");


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

    $('.bxslider').each(function () {
      var $el = $(this);

      $el.data('sliderOptions', {
        auto: !($el.data('auto') === 'false'),
        speed: parseInt($el.data('speed') || 500),
        controls: $el.data('controls'),
        pager: $el.data('pager'),
        pause: parseInt($el.data('pause') || 4000),
        onSliderLoad: function () {
          if ( $el.data('boxShadow') === false ) {
            $el.closest('.bx-viewport').css('box-shadow', 'none').css('-webkit-box-shadow', 'none');
          }
          if ( $el.data('bgColor') ) {
            $el.closest('.bx-viewport').css('background-color', $el.data('bgColor'));
          }
        }
      });

      $el.bxSlider($el.data('sliderOptions'));
    });
});
