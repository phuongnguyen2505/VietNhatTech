"use strict";

var _x;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var x = (_x = {
  abc: 1,
  zyz: 2
}, _defineProperty(_x, "abc", 5), _defineProperty(_x, "mno", {
  abc: 4
}), _defineProperty(_x, "abc", 5), _x);