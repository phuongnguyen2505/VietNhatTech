"use strict";

tinyMCEPopup.requireLangPack();
var EmotionsDialog = {
  addKeyboardNavigation: function addKeyboardNavigation() {
    var tableElm, cells, settings;
    cells = tinyMCEPopup.dom.select("a.emoticon_link", "emoticon_table");
    settings = {
      root: "emoticon_table",
      items: cells
    };
    cells[0].tabindex = 0;
    tinyMCEPopup.dom.addClass(cells[0], "mceFocus");

    if (tinymce.isGecko) {
      cells[0].focus();
    } else {
      setTimeout(function () {
        cells[0].focus();
      }, 100);
    }

    tinyMCEPopup.editor.windowManager.createInstance('tinymce.ui.KeyboardNavigation', settings, tinyMCEPopup.dom);
  },
  init: function init(ed) {
    tinyMCEPopup.resizeToInnerSize();
    this.addKeyboardNavigation();
  },
  insert: function insert(file, title) {
    var ed = tinyMCEPopup.editor,
        dom = ed.dom;
    tinyMCEPopup.execCommand('mceInsertContent', false, dom.createHTML('img', {
      src: tinyMCEPopup.getWindowArg('plugin_url') + '/img/' + file,
      alt: ed.getLang(title),
      title: ed.getLang(title),
      border: 0
    }));
    tinyMCEPopup.close();
  }
};
tinyMCEPopup.onInit.add(EmotionsDialog.init, EmotionsDialog);