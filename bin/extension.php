#!/usr/bin/env php
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

require_once __DIR__ . '/../init.php';

use Eventum\Console\Command\ExtensionEnableCommand as Command;
use Eventum\ServiceContainer;

$app = ServiceContainer::getApplication();
$app->setDefaultCommand('eventum:' . Command::DEFAULT_COMMAND, true);
$app->run();
