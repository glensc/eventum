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

return [
    'database' => [
        'driver' => 'mysql',
        'hostname' => getenv('MYSQL_HOST') ?: 'localhost',
        'database' => getenv('MYSQL_DATABASE') ?: 'e_test',
        'username' => getenv('MYSQL_USER') ?: 'root',
        'password' => getenv('MYSQL_PASSWORD') ?: '',
        'port' => getenv('MYSQL_PORT') ?: 3306,
        'charset' => 'utf8',
    ],
];
