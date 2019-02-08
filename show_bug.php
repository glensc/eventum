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

$theBugId = $argv[1];

$bug = $entityManager->find('Bug', (int)$theBugId);

echo 'Bug: ' . $bug->getDescription() . "\n";
echo 'Engineer: ' . $bug->getEngineer()->getName() . "\n";
