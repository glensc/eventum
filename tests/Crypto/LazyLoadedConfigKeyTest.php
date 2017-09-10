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

namespace Eventum\Test\Crypto;

use Eventum\Crypto\EncryptedConfigValue;
use Eventum\Test\TestCase;
use Setup;

class LazyLoadedConfigKeyTest extends TestCase
{
    public function test1()
    {
        // Setup is not loaded until yet
        $value = new EncryptedConfigValue('database.password');
        $array = [
            'value' => $value,
        ];

        // Setup is loaded only now
        printf("array: '%s'\n", json_encode($array));
//        printf("it is: '%s'\n", $value);
    }
}
