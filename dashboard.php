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

require_once 'bootstrap.php';

$theUserId = $argv[1];

$dql = 'SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ' .
    "WHERE b.status = 'OPEN' AND (e.id = ?1 OR r.id = ?1) ORDER BY b.created DESC";

$myBugs = $entityManager->createQuery($dql)
    ->setParameter(1, $theUserId)
    ->setMaxResults(15)
    ->getResult();

echo 'You have created or assigned to ' . count($myBugs) . " open bugs:\n\n";

foreach ($myBugs as $bug) {
    echo $bug->getId() . ' - ' . $bug->getDescription() . "\n";
}
