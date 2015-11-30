<?php

/*
 * This file is part of the Eventum (Issue Tracking System) package.
 *
 * @copyright (c) Eventum Team
 * @license GNU General Public License, version 2 or later (GPL-2+)
 *
 * For the full copyright and license information,
 * please see the COPYING and AUTHORS files
 * that were distributed with this source code.
 */

require_once __DIR__ . '/../../init.php';

$tpl = new Template_Helper();
$tpl->setTemplate('get_emails_ajax.tpl.html');

Auth::checkAuthentication(null, true);

$account = array(
    'ema_hostname' => $_POST['hostname'],
    'ema_port' => $_POST['port'],
    'ema_type' => $_POST['type'],
    'ema_folder' => $_POST['folder'],
    'ema_username' => $_POST['username'],
    'ema_password' => $_POST['password'],
);
try {
    $mbox = new MailStorage($account);
    $tpl->assign('error', 'no_error');

} catch (Exception $e) {
    error_log(get_class($e));
    $tpl->assign('error', 'could_not_connect');
}

$tpl->displayTemplate();
