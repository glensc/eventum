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

final class Query
{
    /**
     * @\Siler\GraphQL\Annotation\Field()
     */
    public static function hello($root, $args, $context, $info): string
    {
        return 'Hello, World!';
    }
}

use Siler\GraphQL;
use Siler\Route;

require __DIR__ . '/../vendor/autoload.php';

$schema = GraphQL\annotated([Query::class]);

Route\post('/graphql', function () use ($schema) {
    return GraphQL\init($schema);
});
