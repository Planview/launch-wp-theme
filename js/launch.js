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

// Limelight Video
jQuery(document).ready(function ($) {
  $(window).on('resize', function(e) {
    console.log("hello world");
    $('.limelight-video-respond').each(function () {
      var $wrapper = $(this),
          $video = $(this).find('*[width]'),
          controlsHeight = $(this).data('controlsHeight') || 51,
          newHeight,
          newWidth;

      //  See if we have the aspect ratio already
      if ( ! $wrapper.data('aspectRatio') ) {
        var aspectRatio = ( $video.attr('height') - controlsHeight ) / $video.attr('width');
        $wrapper.data('aspectRatio', aspectRatio );
      }

      newWidth = $wrapper.width();
      newHeight = newWidth * $wrapper.data('aspectRatio') + controlsHeight;

      $video.attr('height', newHeight);
      $video.attr('width', newWidth)
    });
  });
  $(window).trigger('resize');
});