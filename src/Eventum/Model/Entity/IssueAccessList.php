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
 * IssueAccessList
 *
 * @ORM\Table(name="issue_access_list", indexes={@ORM\Index(name="ial_iss_id", columns={"ial_iss_id", "ial_usr_id"})})
 * @ORM\Entity
 */
class IssueAccessList
{
    /**
     * @var int
     *
     * @ORM\Column(name="ial_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ialId;

    /**
     * @var int
     *
     * @ORM\Column(name="ial_iss_id", type="integer", nullable=false)
     */
    private $ialIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="ial_usr_id", type="integer", nullable=false)
     */
    private $ialUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ial_created", type="datetime", nullable=false)
     */
    private $ialCreated;

    /**
     * Get ialId
     *
     * @return int
     */
    public function getIalId()
    {
        return $this->ialId;
    }

    /**
     * Set ialIssId
     *
     * @param int $ialIssId
     * @return IssueAccessList
     */
    public function setIalIssId($ialIssId)
    {
        $this->ialIssId = $ialIssId;

        return $this;
    }

    /**
     * Get ialIssId
     *
     * @return int
     */
    public function getIalIssId()
    {
        return $this->ialIssId;
    }

    /**
     * Set ialUsrId
     *
     * @param int $ialUsrId
     * @return IssueAccessList
     */
    public function setIalUsrId($ialUsrId)
    {
        $this->ialUsrId = $ialUsrId;

        return $this;
    }

    /**
     * Get ialUsrId
     *
     * @return int
     */
    public function getIalUsrId()
    {
        return $this->ialUsrId;
    }

    /**
     * Set ialCreated
     *
     * @param \DateTime $ialCreated
     * @return IssueAccessList
     */
    public function setIalCreated($ialCreated)
    {
        $this->ialCreated = $ialCreated;

        return $this;
    }

    /**
     * Get ialCreated
     *
     * @return \DateTime
     */
    public function getIalCreated()
    {
        return $this->ialCreated;
    }
}
