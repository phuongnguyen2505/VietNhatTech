"use strict";

var x = 'My ' + 'string';
var x = 'My ' + 1234;
var x = 'My ' + y + ' test';
(void 0).errors['test'] = x;
(void 0).errors['test' + 10] = x;
(void 0).errors['test' + y] = x;
(void 0).errors['test' + 'blah'] = x;
(void 0).errors[y] = x;
(void 0).errors[y + z] = x;
(void 0).errors[y + z + 'My' + 'String'] = x;

var _long = 'This is a really long string. ' + 'It is being used for errors. ' + 'The message is not translated.';