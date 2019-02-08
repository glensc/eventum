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

$bugs = $entityManager->getRepository('Bug')->getRecentBugs();

foreach ($bugs as $bug) {
    echo $bug->getDescription() . ' - ' . $bug->getCreated()->format('d.m.Y') . "\n";
    echo '    Reported by: ' . $bug->getReporter()->getName() . "\n";
    echo '    Assigned to: ' . $bug->getEngineer()->getName() . "\n";
    foreach ($bug->getProducts() as $product) {
        echo '    Platform: ' . $product->getName() . "\n";
    }
    echo "\n";
}
