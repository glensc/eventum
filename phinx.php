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

/**
 * Configuration proxy for sphix
 *
 * @see http://docs.phinx.org/en/latest/commands.html#configuration-file-parameter
 */

// init minimal constants needed for some classes to work
if (!defined('APP_PATH')) {
    define('APP_PATH', __DIR__);
    define('APP_CONFIG_PATH', APP_PATH . '/config');
    define('APP_SETUP_FILE', APP_CONFIG_PATH . '/setup.php');
}

$config = DB_Helper::getConfig();

// TODO: use "connection" => $pdo_instance once PEAR DB support is dropped
// http://docs.phinx.org/en/latest/commands.html#configuration-file-parameter

return [
    'paths' => [
        'migrations' => 'db/migrations',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'production',
        'production' => [
            'adapter' => 'mysql',
            'host' => $config['hostname'],
            'name' => $config['database'],
            'user' => $config['username'],
            'pass' => $config['password'],
            'port' => $config['port'],
            'unix_socket' => isset($config['socket']) ? $config['socket'] : null,

            // Specify MySQL storage engine
            // if not specified mysql server default will be used
            // Examples: 'MyISAM', 'InnoDB'
            'engine' => 'MyISAM',

            // charset and collation must be utf8 compatible

            // for MySQL < 5.5.3
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',

            // for MySQL >= 5.5.3
//            'charset' => 'utf8mb4',
//            'collation' => 'utf8mb4_unicode_ci',

            // set SQL_MODE
            // http://dev.mysql.com/doc/refman/5.7/en/sql-mode.html
            // https://github.com/robmorgan/phinx/blob/v0.8.0/src/Phinx/Db/Adapter/MysqlAdapter.php#L104-L110
            'mysql_attr_init_command' => "SET SQL_MODE = ''",
        ],
    ],
];