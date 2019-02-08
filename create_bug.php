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

$theReporterId = $argv[1];
$theDefaultEngineerId = $argv[2];
$productIds = explode(',', $argv[3]);

$reporter = $entityManager->find('User', $theReporterId);
$engineer = $entityManager->find('User', $theDefaultEngineerId);
if (!$reporter || !$engineer) {
    echo "No reporter and/or engineer found for the input.\n";
    exit(1);
}

$bug = new Bug();
$bug->setDescription('Something does not work!');
$bug->setCreated(new DateTime('now'));
$bug->setStatus('OPEN');

foreach ($productIds as $productId) {
    $product = $entityManager->find('Product', $productId);
    $bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo 'Your new Bug Id: ' . $bug->getId() . "\n";
