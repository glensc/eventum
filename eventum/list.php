<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | Eventum - Issue Tracking System                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003, 2004 MySQL AB                                    |
// |                                                                      |
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License as published by |
// | the Free Software Foundation; either version 2 of the License, or    |
// | (at your option) any later version.                                  |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to:                           |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+
// | Authors: Jo�o Prado Maia <jpm@mysql.com>                             |
// +----------------------------------------------------------------------+
//
// @(#) $Id: s.list.php 1.16 03/10/14 15:38:03-00:00 jpradomaia $
//
include_once("config.inc.php");
include_once(APP_INC_PATH . "db_access.php");
include_once(APP_INC_PATH . "class.template.php");
include_once(APP_INC_PATH . "class.auth.php");
include_once(APP_INC_PATH . "class.category.php");
include_once(APP_INC_PATH . "class.priority.php");
include_once(APP_INC_PATH . "class.misc.php");
include_once(APP_INC_PATH . "class.release.php");
include_once(APP_INC_PATH . "class.issue.php");
include_once(APP_INC_PATH . "class.project.php");
include_once(APP_INC_PATH . "class.filter.php");
include_once(APP_INC_PATH . "class.status.php");
include_once(APP_INC_PATH . "class.user.php");
include_once(APP_INC_PATH . "class.group.php");
include_once(APP_INC_PATH . "class.display_column.php");

$tpl = new Template_API();
$tpl->setTemplate("list.tpl.html");

Auth::checkAuthentication(APP_COOKIE);

$pagerRow = Issue::getParam('pagerRow');
if (empty($pagerRow)) {
    $pagerRow = 0;
}
$rows = Issue::getParam('rows');
if (empty($rows)) {
    $rows = APP_DEFAULT_PAGER_SIZE;
}

if (@$_REQUEST['view'] == 'my_assignments') {
    setcookie(APP_LIST_COOKIE, '', APP_LIST_COOKIE_EXPIRE);
    Auth::redirect(APP_BASE_URL . "list.php?users=" . Auth::getUserID() . "&hide_closed=1&rows=$rows");
}

$options = Issue::saveSearchParams();
$tpl->assign("options", $options);
$tpl->assign("sorting", Issue::getSortingInfo($options));

$prj_id = Auth::getCurrentProject();

// generate options for assign list. If there are groups and user is above a customer, include groups
$groups = Group::getAssocList($prj_id);
$users = Project::getUserAssocList($prj_id, 'active', User::getRoleID('Customer'));
$assign_options = array(
    ""      =>  "Any",
    "-1"    =>  "un-assigned",
    "-2"    =>  "myself and un-assigned"
);
if (User::getGroupID(Auth::getUserID()) != '') {
    $assign_options['-3'] = 'myself and my group';
    $assign_options['-4'] = 'myself, un-assigned and my group';
}
if ((count($groups) > 0) && ( Auth::getCurrentRole() >User::getRoleID("Customer"))) {
    foreach ($groups as $grp_id => $grp_name) {
        $assign_options["grp:$grp_id"] = "Group: " . $grp_name;
    }
}
$assign_options += $users;

$list = Issue::getListing($prj_id, $options, $pagerRow, $rows);
$tpl->assign("list", $list["list"]);
$tpl->assign("list_info", $list["info"]);
$tpl->assign("csv_data", base64_encode(@$list["csv"]));

$tpl->assign("columns", Display_Column::getColumnsToDisplay($prj_id, 'list_issues'));
$tpl->assign("priorities", Priority::getList($prj_id));
$tpl->assign("status", Status::getAssocStatusList($prj_id));
$tpl->assign("users", $users);
$tpl->assign("assign_options", $assign_options);
$tpl->assign("custom", Filter::getAssocList($prj_id));
$tpl->assign("csts", Filter::getListing(true));
$tpl->assign("filter_info", Filter::getFiltersInfo());
$tpl->assign("categories", Category::getAssocList($prj_id));
$tpl->assign("groups", $groups);

$prefs = Prefs::get(Auth::getUserID());
$tpl->assign("refresh_rate", $prefs['list_refresh_rate'] * 60);
$tpl->assign("refresh_page", "list.php");

$tpl->displayTemplate();
?>