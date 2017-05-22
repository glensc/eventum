window.Eventum = require("exports-loader?Eventum!htdocs/js/main.js");

/*
 var pages = [
 'select_project',
 'list_issues',
 'issue_view',
 'issue_update',
 'close_issue',
 'adv_search',
 'new_issue',
 'anon_post',
 'stats',
 'product',
 'preferences',
 'custom_field_options',
 ];
 */

// var page_exports = require("exports-loader?" + pages.join(',') + "!htdocs/js/page.js");
var page_exports = require("exports-loader?select_project,list_issues,issue_view,issue_update,close_issue,adv_search,new_issue,anon_post,stats,product,preferences,custom_field_options!htdocs/js/page.js");
// console.log(page_exports);
window.select_project = page_exports.select_project;
window.list_issues = page_exports.list_issues;
window.issue_view = page_exports.issue_view;
window.issue_update = page_exports.issue_update;
window.close_issue = page_exports.close_issue;
window.adv_search = page_exports.adv_search;
window.new_issue = page_exports.new_issue;
window.anon_post = page_exports.anon_post;
window.stats = page_exports.stats;
window.product = page_exports.product;
window.preferences = page_exports.preferences;
window.custom_field_options = page_exports.custom_field_options;


// require("exports-loader?file,parse=helpers.parse!./file.js");
// adds below code to the file's source:
//  exports["file"] = file;
//  exports["parse"] = helpers.parse;

// require("exports-loader?file!./file.js");
// adds below code to the file's source:
//  module.exports = file;
