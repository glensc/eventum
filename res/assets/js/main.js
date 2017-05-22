// var path = require('path');

// var JS_PATH = path.resolve(__dirname, '../../htdocs/js');

// require('./components');

// require(JS_PATH + "/main.js");
// require(JS_PATH + "/page.js");

// require("jquery");
// require("htdocs-js/main.js");
require("htdocs-js/page.js");

window.Eventum = require("exports-loader?Eventum=Eventum!htdocs-js/main.js");

// require("exports-loader?file,parse=helpers.parse!./file.js");
// adds below code to the file's source:
//  exports["file"] = file;
//  exports["parse"] = helpers.parse;

// require("exports-loader?file!./file.js");
// adds below code to the file's source:
//  module.exports = file;
