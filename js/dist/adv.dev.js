"use strict";

(function ($) {
  $.fn.advScroll = function (option) {
    $.fn.advScroll.option = {
      wrp: 'content',
      top: 0,
      easing: '',
      timer: 400
    };
    option = $.extend({}, $.fn.advScroll.option, option);
    return this.each(function () {
      var el = $(this);
      $(window).scroll(function () {
        t = parseInt($('#' + option.wrp).offset().top);
        w = $(window).scrollTop();

        if (w > t) {
          el.stop().animate({
            top: w - t
          }, option.timer, option.easing);
        } else {
          el.stop().animate({
            top: option.top
          }, option.timer, option.easing);
        }
      });
    });
  };
})(jQuery);