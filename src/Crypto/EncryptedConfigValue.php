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

namespace Eventum\Crypto;

use Setup;

class EncryptedConfigValue
{
    /** @var string */
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
        error_log(__CLASS__ . '::' . __FUNCTION__);
    }

    public function __toString()
    {
        error_log(__CLASS__ . '::' . __FUNCTION__);
        $setup = Setup::get();
        $keys = explode('.', $this->key);
        foreach ($keys as $key) {
//            error_log("expand: '$key': ".var_export($setup->toArray()));
            $setup = $setup[$key];
        }

        // this should be the final value
        return $setup === null ? $setup : (string)$setup;
    }
}
