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

namespace Eventum\Mail\Exception;

use InvalidArgumentException;

class ParseException extends InvalidArgumentException
{
    private $res;

    public static function create($emails, $res)
    {
        $e = new self("{$res['reason']}: {$emails}");
        $e->res = $res;

        return $e;
    }

    public function getDetails()
    {
        $reasons = [];
        foreach ($this->res['email_addresses'] as $email) {
            if ($email['invalid_reason']) {
                $reasons[] = "{$email['original_address']}: {$email['invalid_reason']}";
            }
        }

        return $reasons;
    }
}
