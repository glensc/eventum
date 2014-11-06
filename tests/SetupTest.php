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

namespace Eventum\Test;

use ConfigStore;
use Setup;

class SetupTest extends TestCase
{
    private $configfile;

    public function SetUp()
    {
        $this->configfile = __DIR__ . '/_' . __CLASS__ . '.php';
    }

    public function testLoad(): void
    {
        $setup = Setup::load(true);
    }

    public function testInstance(): void
    {
        $setup = Setup::getInstance();
    }

    public function testAccess(): void
    {
        $config = new ConfigStore($this->configfile);
        $this->assertFalse($config['falsekey']);
    }
}
