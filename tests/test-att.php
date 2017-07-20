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

require __DIR__ . '/../init.php';
// 14, 15, 16, 17,18,19,20,21,22,23,42,43,49,50,51,95,101,102,103,104,105,106,107,124,
// 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 140, 10357

$db = DB_Helper::getInstance();
//$res = $db->getAll("SELECT sup_id, sup_has_attachment FROM support_email where sup_id not in (1)");
$res = $db->getAll('SELECT seb_sup_id FROM support_email_body');
//$res = $db->getAll("SELECT seb_sup_id FROM support_email_body where seb_sup_id in (9077)");

foreach ($res as $i => $row) {
    $sup_id = $row['seb_sup_id'];
    echo "$sup_id\n";
    try {
        $mail = Support::getSupportEmail($sup_id);
    } catch (Exception $e) {
        echo "# Exc: {$sup_id}: {$e->getMessage()}\n";
        echo "delete from support_email where sup_id={$sup_id};\n";
        continue;
    }
    try {
        $has_att = $mail->getAttachment()->hasAttachments();
    } catch (Exception $e) {
        echo $mail->getRawContent();
        die("# Exc {$sup_id}: {$e->getMessage()}");
    }
    dump($has_att);
//    if ($has_att != $row['sup_has_attachment']) {
//        echo "# Fail: {$row['sup_id']}\n";
//    }
}
