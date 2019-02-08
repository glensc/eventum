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

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueCommit
 *
 * @ORM\Table(name="issue_commit")
 * @ORM\Entity
 */
class IssueCommit
{
    /**
     * @var int
     *
     * @ORM\Column(name="isc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iscId;

    /**
     * @var int
     *
     * @ORM\Column(name="isc_iss_id", type="integer", nullable=false)
     */
    private $iscIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="isc_com_id", type="integer", nullable=false)
     */
    private $iscComId;

    /**
     * Get iscId
     *
     * @return int
     */
    public function getIscId()
    {
        return $this->iscId;
    }

    /**
     * Set iscIssId
     *
     * @param int $iscIssId
     * @return IssueCommit
     */
    public function setIscIssId($iscIssId)
    {
        $this->iscIssId = $iscIssId;

        return $this;
    }

    /**
     * Get iscIssId
     *
     * @return int
     */
    public function getIscIssId()
    {
        return $this->iscIssId;
    }

    /**
     * Set iscComId
     *
     * @param int $iscComId
     * @return IssueCommit
     */
    public function setIscComId($iscComId)
    {
        $this->iscComId = $iscComId;

        return $this;
    }

    /**
     * Get iscComId
     *
     * @return int
     */
    public function getIscComId()
    {
        return $this->iscComId;
    }
}
