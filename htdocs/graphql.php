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

use Siler\GraphQL;
use Siler\Route;

require __DIR__ . '/../vendor/autoload.php';

$type_defs = file_get_contents(__DIR__ . '/../res/graphql/schema.graphql');
$resolvers = [
    'Query' => [
        'hello' => static function ($root, $args, $context, $info) {
            return 'Hello, World!';
        },
    ],
];

$schema = GraphQL\schema($type_defs, $resolvers);

Route\post('/graphql', function () use ($schema) {
    return GraphQL\init($schema);
});
