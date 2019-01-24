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

use Eventum\Db\Doctrine;
use Eventum\Model\Repository\RemoteLinkRepository;

/**
 * @group db
 */
class RemoteLinkTest extends TestCase
{
    /** @var \Doctrine\ORM\EntityRepository|RemoteLinkRepository */
    private $repo;

    public function setUp()
    {
        $this->repo = Doctrine::getRemoteLinkRepository();
    }

    public function testAddRemoteLink(): void
    {
        $issue_id = 1;
        $url = 'http://example.org';
        $title = 'example';

        $link = $this->repo->addRemoteLink($issue_id, $url, $title);

        $this->assertEquals($url, $link->getUrl());
        $this->assertEquals($title, $link->getTitle());
        $this->assertNull($link->getGid());
    }

    public function testAddEmptyGid(): void
    {
        $issue_id = 1;
        $url = 'http://example.org';
        $title = 'example';
        $relation = RemoteLinkRepository::DEFAULT_RELATION;
        $gid = '';

        $link = $this->repo->addRemoteLink($issue_id, $url, $title, $relation, $gid);

        $this->assertEquals($url, $link->getUrl());
        $this->assertEquals($title, $link->getTitle());
        $this->assertNull($link->getGid());
    }

    public function testUpdateRemoteLink(): void
    {
        $issue_id = 1;
        $url = 'http://example.org';
        $title = 'example';
        $title2 = 'example';
        $relation = RemoteLinkRepository::DEFAULT_RELATION;
        $gid = 'eventum:test';

        $link1 = $this->repo->addRemoteLink($issue_id, $url, $title, $relation, $gid);
        $link2 = $this->repo->addRemoteLink($issue_id, $url, $title2, $relation, $gid);

        $this->assertEquals($gid, $link1->getGid());
        $this->assertEquals($link1, $link2);
    }
}
