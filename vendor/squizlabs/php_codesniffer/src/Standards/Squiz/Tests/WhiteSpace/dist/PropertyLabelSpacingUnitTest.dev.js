"use strict";

var x = {
  b: 'x',
  xasd: x,
  abc: x,
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
  }),
  casdasd: 123123,
  omgwtfbbq: {
    a: 1,
    b: 2
  }
};
id = id.replace(/row\/:/gi, '');

outer_loop: for (i = 0; i < 3; i++) {
  for (j = 0; j < 5; j++) {
    if (j == x) break outer_loop;
  }
}

alert('hi');

even_number: if (i % 2 == 0) {
  if (i == 12) break even_number;
}

switch (blah) {
  case dfx.DOM_VK_LEFT:
    (void 0).caretLeft(shiftKey);
    break;

  default:
    if (blah) {}

    break;
}