"use strict";

// Uncomment and change this document.domain value if you are loading the script cross subdomains
// document.domain = 'moxiecode.com';
var tinymce = null,
    tinyMCEPopup,
    tinyMCE;
tinyMCEPopup = {
  init: function init() {
    var b = this,
        a,
        c;
    a = b.getWin();
    tinymce = a.tinymce;
    tinyMCE = a.tinyMCE;
    b.editor = tinymce.EditorManager.activeEditor;
    b.params = b.editor.windowManager.params;
    b.features = b.editor.windowManager.features;
    b.dom = b.editor.windowManager.createInstance("tinymce.dom.DOMUtils", document, {
      ownEvents: true,
      proxy: tinyMCEPopup._eventProxy
    });
    b.dom.bind(window, "ready", b._onDOMLoaded, b);

    if (b.features.popup_css !== false) {
      b.dom.loadCSS(b.features.popup_css || b.editor.settings.popup_css);
    }

    b.listeners = [];
    b.onInit = {
      add: function add(e, d) {
        b.listeners.push({
          func: e,
          scope: d
        });
      }
    };
    b.isWindow = !b.getWindowArg("mce_inline");
    b.id = b.getWindowArg("mce_window_id");
    b.editor.windowManager.onOpen.dispatch(b.editor.windowManager, window);
  },
  getWin: function getWin() {
    return !window.frameElement && window.dialogArguments || opener || parent || top;
  },
  getWindowArg: function getWindowArg(c, b) {
    var a = this.params[c];
    return tinymce.is(a) ? a : b;
  },
  getParam: function getParam(b, a) {
    return this.editor.getParam(b, a);
  },
  getLang: function getLang(b, a) {
    return this.editor.getLang(b, a);
  },
  execCommand: function execCommand(d, c, e, b) {
    b = b || {};
    b.skip_focus = 1;
    this.restoreSelection();
    return this.editor.execCommand(d, c, e, b);
  },
  resizeToInnerSize: function resizeToInnerSize() {
    var a = this;
    setTimeout(function () {
      var b = a.dom.getViewPort(window);
      a.editor.windowManager.resizeBy(a.getWindowArg("mce_width") - b.w, a.getWindowArg("mce_height") - b.h, a.id || window);
    }, 10);
  },
  executeOnLoad: function executeOnLoad(s) {
    this.onInit.add(function () {
      eval(s);
    });
  },
  storeSelection: function storeSelection() {
    this.editor.windowManager.bookmark = tinyMCEPopup.editor.selection.getBookmark(1);
  },
  restoreSelection: function restoreSelection() {
    var a = tinyMCEPopup;

    if (!a.isWindow && tinymce.isIE) {
      a.editor.selection.moveToBookmark(a.editor.windowManager.bookmark);
    }
  },
  requireLangPack: function requireLangPack() {
    var b = this,
        a = b.getWindowArg("plugin_url") || b.getWindowArg("theme_url");

    if (a && b.editor.settings.language && b.features.translate_i18n !== false && b.editor.settings.language_load !== false) {
      a += "/langs/" + b.editor.settings.language + "_dlg.js";

      if (!tinymce.ScriptLoader.isDone(a)) {
        document.write('<script type="text/javascript" src="' + tinymce._addVer(a) + '"><\/script>');
        tinymce.ScriptLoader.markDone(a);
      }
    }
  },
  pickColor: function pickColor(b, a) {
    this.execCommand("mceColorPicker", true, {
      color: document.getElementById(a).value,
      func: function func(e) {
        document.getElementById(a).value = e;

        try {
          document.getElementById(a).onchange();
        } catch (d) {}
      }
    });
  },
  openBrowser: function openBrowser(a, c, b) {
    tinyMCEPopup.restoreSelection();
    this.editor.execCallback("file_browser_callback", a, document.getElementById(a).value, c, window);
  },
  confirm: function confirm(b, a, c) {
    this.editor.windowManager.confirm(b, a, c, window);
  },
  alert: function alert(b, a, c) {
    this.editor.windowManager.alert(b, a, c, window);
  },
  close: function close() {
    var a = this;

    function b() {
      a.editor.windowManager.close(window);
      tinymce = tinyMCE = a.editor = a.params = a.dom = a.dom.doc = null;
    }

    if (tinymce.isOpera) {
      a.getWin().setTimeout(b, 0);
    } else {
      b();
    }
  },
  _restoreSelection: function _restoreSelection() {
    var a = window.event.srcElement;

    if (a.nodeName == "INPUT" && (a.type == "submit" || a.type == "button")) {
      tinyMCEPopup.restoreSelection();
    }
  },
  _onDOMLoaded: function _onDOMLoaded() {
    var b = tinyMCEPopup,
        d = document.title,
        e,
        c,
        a;

    if (b.features.translate_i18n !== false) {
      c = document.body.innerHTML;

      if (tinymce.isIE) {
        c = c.replace(/ (value|title|alt)=([^"][^\s>]+)/gi, ' $1="$2"');
      }

      document.dir = b.editor.getParam("directionality", "");

      if ((a = b.editor.translate(c)) && a != c) {
        document.body.innerHTML = a;
      }

      if ((a = b.editor.translate(d)) && a != d) {
        document.title = d = a;
      }
    }

    if (!b.editor.getParam("browser_preferred_colors", false) || !b.isWindow) {
      b.dom.addClass(document.body, "forceColors");
    }

    document.body.style.display = "";

    if (tinymce.isIE) {
      document.attachEvent("onmouseup", tinyMCEPopup._restoreSelection);
      b.dom.add(b.dom.select("head")[0], "base", {
        target: "_self"
      });
    }

    b.restoreSelection();
    b.resizeToInnerSize();

    if (!b.isWindow) {
      b.editor.windowManager.setTitle(window, d);
    } else {
      window.focus();
    }

    if (!tinymce.isIE && !b.isWindow) {
      b.dom.bind(document, "focus", function () {
        b.editor.windowManager.focus(b.id);
      });
    }

    tinymce.each(b.dom.select("select"), function (f) {
      f.onkeydown = tinyMCEPopup._accessHandler;
    });
    tinymce.each(b.listeners, function (f) {
      f.func.call(f.scope, b.editor);
    });

    if (b.getWindowArg("mce_auto_focus", true)) {
      window.focus();
      tinymce.each(document.forms, function (g) {
        tinymce.each(g.elements, function (f) {
          if (b.dom.hasClass(f, "mceFocus") && !f.disabled) {
            f.focus();
            return false;
          }
        });
      });
    }

    document.onkeyup = tinyMCEPopup._closeWinKeyHandler;
  },
  _accessHandler: function _accessHandler(a) {
    a = a || window.event;

    if (a.keyCode == 13 || a.keyCode == 32) {
      var b = a.target || a.srcElement;

      if (b.onchange) {
        b.onchange();
      }

      return tinymce.dom.Event.cancel(a);
    }
  },
  _closeWinKeyHandler: function _closeWinKeyHandler(a) {
    a = a || window.event;

    if (a.keyCode == 27) {
      tinyMCEPopup.close();
    }
  },
  _eventProxy: function _eventProxy(a) {
    return function (b) {
      tinyMCEPopup.dom.events.callNativeHandler(a, b);
    };
  }
};
tinyMCEPopup.init();