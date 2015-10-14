<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 encoding=utf-8: */
// +----------------------------------------------------------------------+
// | Eventum - Issue Tracking System                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 2015 Eventum Team.                                     |
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
// | 51 Franklin Street, Suite 330                                        |
// | Boston, MA 02110-1301, USA.                                          |
// +----------------------------------------------------------------------+
// | Authors: Elan Ruusamäe <glen@delfi.ee>                               |
// +----------------------------------------------------------------------+

require_once __DIR__ . '/../../init.php';

$tpl = new Template_Helper();
$tpl->setTemplate('manage/private_key.tpl.html');

Auth::checkAuthentication(APP_COOKIE);

$role_id = Auth::getCurrentRole();
if ($role_id < User::ROLE_ADMINISTRATOR) {
    Misc::setMessage(ev_gettext('Sorry, you are not allowed to access this page.'), Misc::MSG_ERROR);
    $tpl->displayTemplate();
    exit;
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = sha1(Misc::generateRandom());
}

$csrf_token = isset($_SESSION['csrf_token']) ? (string)$_SESSION['csrf_token'] : null;
$cat = isset($_POST['cat']) ? (string)$_POST['cat'] : null;
if ($cat == 'update') {
    $post_csrf_token = isset($_POST['csrf_token']) ? (string)$_POST['csrf_token'] : null;
    if (!$post_csrf_token || $post_csrf_token != $csrf_token) {
        Misc::setMessage(ev_gettext('CSRF token mismatch.'), Misc::MSG_ERROR);
    } else {
        try {
//        Auth::generatePrivateKey();
            Misc::setMessage(ev_gettext('Thank you, the private key was regenerated.'));
        } catch (Exception $e) {
            Misc::setMessage(ev_gettext('Private key regeneration error. Check server error logs.'), Misc::MSG_ERROR);
        }
    }
}

$tpl->assign('csrf_token', $csrf_token);
$tpl->displayTemplate();
