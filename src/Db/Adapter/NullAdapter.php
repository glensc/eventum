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

namespace Eventum\Db\Adapter;

/**
 * Class NullAdapter
 *
 * Database which all methods do nothing, to be used for offline.php
 */
class NullAdapter implements AdapterInterface
{
    public function __construct(array $config)
    {
    }

    public function getAll($query, $params = [], $fetchMode = AdapterInterface::DB_FETCHMODE_ASSOC): void
    {
    }

    public function fetchAssoc($query, $params = [], $fetchMode = AdapterInterface::DB_FETCHMODE_DEFAULT): void
    {
    }

    public function getColumn($query, $params = []): void
    {
    }

    public function getOne($query, $params = []): void
    {
    }

    public function getPair($query, $params = []): void
    {
    }

    public function getRow($query, $params = [], $fetchMode = AdapterInterface::DB_FETCHMODE_ASSOC): void
    {
    }

    public function escapeSimple($str): void
    {
    }

    public function query($query, $params = []): void
    {
    }

    public function quoteIdentifier($str): void
    {
    }
}
