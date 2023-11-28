"use strict";

function FuncOne() {} // Code here.
//end AdjustModalDialogWidgetType


Testing.prototype = {
  doSomething: function doSomething() {// Code here.
  },
  doSomethingElse: function doSomethingElse() {// Code here.
  },
  start: function start() {
    this.toolbarPlugin.addButton('Image', 'imageEditor', 'Insert/Edit Image', function () {
      self.editImage();
    });
  }
};

function FuncFour() {// Code here.
}

AbstractAttributeEditorWidgetType.prototype = {
  isActive: function isActive() {
    return this.active;
  },
  activate: function activate(data) {
    var x = {
      test: function test() {
        alert('This is ok');
      }
    };
    this.active = true;
  }
};

function test() {
  var x = 1;

  var y = function y() {
    alert(1);
  };

  return x;
}

var myFunc = function myFunc() {
  var x = 1;
  blah(x, y, function () {
    alert(2);
  }, z);
  blah(function () {
    alert(2);
  });
  return x;
};

HelpWidgetType.prototype = {
  init: function init() {
    var x = 1;
    var y = {
      test: function test() {
        alert(3);
      }
    };
    return x;
  }
};
CustomFormEditWidgetType.prototype = {
  addQuestion: function addQuestion() {
    var settings = {
      "default": ''
    };
  },
  addQuestionRulesEvent: function addQuestionRulesEvent() {
    var self = this;
  }
};