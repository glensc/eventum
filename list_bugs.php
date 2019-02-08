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

$dql = 'SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC';

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

foreach ($bugs as $bug) {
    echo $bug->getDescription() . ' - ' . $bug->getCreated()->format('d.m.Y') . "\n";
    echo '    Reported by: ' . $bug->getReporter()->getName() . "\n";
    echo '    Assigned to: ' . $bug->getEngineer()->getName() . "\n";
    foreach ($bug->getProducts() as $product) {
        echo '    Platform: ' . $product->getName() . "\n";
    }
    echo "\n";
}
