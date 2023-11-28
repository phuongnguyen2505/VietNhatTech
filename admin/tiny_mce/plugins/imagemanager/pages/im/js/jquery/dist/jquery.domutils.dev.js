"use strict";

/**
 * $Id: jquery.domutils.js 460 2008-10-14 16:06:43Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright � 2004-2008, Moxiecode Systems AB, All rights reserved.
 */
(function ($) {
  $.extend({
    createElm: function createElm(n, a, h) {
      n = $(document.createElement(n));
      n.attr(a).html(h);
      return n;
    },
    appendElements: function appendElements(te, ne) {
      var i, n;
      if (typeof ne == 'string') te.appendChild(document.createTextNode(ne));else if (ne.length) {
        te = te.appendChild($.createElm(ne[0], ne[1])[0]);

        for (i = 2; i < ne.length; i++) {
          $.appendElements(te, ne[i]);
        }
      }
    },
    scrollPos: function scrollPos() {
      var w = window,
          b = document.body;
      return {
        x: w.pageXOffset || b.scrollLeft,
        y: w.pageYOffset || b.scrollTop
      };
    },
    winWidth: function winWidth() {
      return window.innerWidth || $(window).width();
    },
    winHeight: function winHeight() {
      return window.innerHeight || $(window).height();
    }
  });
  $.fn.extend({
    appendAll: function appendAll(ne) {
      this.each(function (i, v) {
        $.appendElements(v, ne);
      });
    }
  });
})(jQuery);