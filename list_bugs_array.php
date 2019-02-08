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

$dql = 'SELECT b, e, r, p FROM Bug b JOIN b.engineer e ' .
    'JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC';
$query = $entityManager->createQuery($dql);
$bugs = $query->getArrayResult();

foreach ($bugs as $bug) {
    echo $bug['description'] . ' - ' . $bug['created']->format('d.m.Y') . "\n";
    echo '    Reported by: ' . $bug['reporter']['name'] . "\n";
    echo '    Assigned to: ' . $bug['engineer']['name'] . "\n";
    foreach ($bug['products'] as $product) {
        echo '    Platform: ' . $product['name'] . "\n";
    }
    echo "\n";
}
