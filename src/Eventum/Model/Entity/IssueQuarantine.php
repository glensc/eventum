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
 * IssueQuarantine
 *
 * @ORM\Table(name="issue_quarantine", indexes={@ORM\Index(name="iqu_expiration", columns={"iqu_expiration"})})
 * @ORM\Entity
 */
class IssueQuarantine
{
    /**
     * @var int
     *
     * @ORM\Column(name="iqu_iss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iquIssId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iqu_expiration", type="datetime", nullable=true)
     */
    private $iquExpiration;

    /**
     * @var bool
     *
     * @ORM\Column(name="iqu_status", type="boolean", nullable=true)
     */
    private $iquStatus;

    /**
     * Get iquIssId
     *
     * @return int
     */
    public function getIquIssId()
    {
        return $this->iquIssId;
    }

    /**
     * Set iquExpiration
     *
     * @param \DateTime $iquExpiration
     * @return IssueQuarantine
     */
    public function setIquExpiration($iquExpiration)
    {
        $this->iquExpiration = $iquExpiration;

        return $this;
    }

    /**
     * Get iquExpiration
     *
     * @return \DateTime
     */
    public function getIquExpiration()
    {
        return $this->iquExpiration;
    }

    /**
     * Set iquStatus
     *
     * @param bool $iquStatus
     * @return IssueQuarantine
     */
    public function setIquStatus($iquStatus)
    {
        $this->iquStatus = $iquStatus;

        return $this;
    }

    /**
     * Get iquStatus
     *
     * @return bool
     */
    public function getIquStatus()
    {
        return $this->iquStatus;
    }
}
