"use strict";

/**
 * $Id: basemanager.js 453 2008-10-14 12:24:41Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright � 2004-2008, Moxiecode Systems AB, All rights reserved.
 */
(function ($) {
  window.BaseManager = {
    currentWin: $.WindowManager.find(window),
    path: '{default}',
    visualPath: '',
    files: [],
    selectedFiles: [],
    focusedFile: null,
    demoMode: false,
    disabled: {},
    specialFolders: [],
    getFile: function getFile(id) {
      var o;
      $(this.files).each(function () {
        if (this.id == id) o = this;
      });
      return o;
    },
    setDisabled: function setDisabled(v, st) {
      this.disabled[v] = st;
      if (st) $('#' + v).addClass('disabled').addClass('deactivated');else $('#' + v).removeClass('disabled').removeClass('deactivated');
    },
    isDisabled: function isDisabled(v) {
      return this.disabled[v] ? this.disabled[v] : 0;
    },
    addSpecialFolder: function addSpecialFolder(o) {
      this.specialFolders.push(o);
    },
    isDemo: function isDemo() {
      if (this.demoMode) {
        $.WindowManager.info($.translate('{#error.demo}'));
        return true;
      }
    }
  };
})(jQuery);