"use strict";

var x = {
  a: function (_a) {
    function a() {
      return _a.apply(this, arguments);
    }

    a.toString = function () {
      return _a.toString();
    };

    return a;
  }(function () {
    alert('thats right');
    x = x ? a : x;
  })
};
id = id.replace(/row\/:;/gi, '');

for (i = 0; i < 3; i++) {
  for (j = 0; j < 5; j++) {
    if (j == x) break;
  }
}

alert('hi');
;
var sum = a
/* + b */
;
var sum = a // +b
;
var sum = a
/* +b
+ c */
;