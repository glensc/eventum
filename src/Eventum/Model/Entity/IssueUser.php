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
 * IssueUser
 *
 * @ORM\Table(name="issue_user", indexes={@ORM\Index(name="isu_order", columns={"isu_order"}), @ORM\Index(name="isu_usr_id", columns={"isu_usr_id"}), @ORM\Index(name="isu_iss_id", columns={"isu_iss_id"})})
 * @ORM\Entity
 */
class IssueUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="isu_iss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $isuIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="isu_usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $isuUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="isu_assigned_date", type="datetime", nullable=true)
     */
    private $isuAssignedDate;

    /**
     * @var int
     *
     * @ORM\Column(name="isu_order", type="integer", nullable=false)
     */
    private $isuOrder;

    /**
     * Set isuIssId
     *
     * @param int $isuIssId
     * @return IssueUser
     */
    public function setIsuIssId($isuIssId)
    {
        $this->isuIssId = $isuIssId;

        return $this;
    }

    /**
     * Get isuIssId
     *
     * @return int
     */
    public function getIsuIssId()
    {
        return $this->isuIssId;
    }

    /**
     * Set isuUsrId
     *
     * @param int $isuUsrId
     * @return IssueUser
     */
    public function setIsuUsrId($isuUsrId)
    {
        $this->isuUsrId = $isuUsrId;

        return $this;
    }

    /**
     * Get isuUsrId
     *
     * @return int
     */
    public function getIsuUsrId()
    {
        return $this->isuUsrId;
    }

    /**
     * Set isuAssignedDate
     *
     * @param \DateTime $isuAssignedDate
     * @return IssueUser
     */
    public function setIsuAssignedDate($isuAssignedDate)
    {
        $this->isuAssignedDate = $isuAssignedDate;

        return $this;
    }

    /**
     * Get isuAssignedDate
     *
     * @return \DateTime
     */
    public function getIsuAssignedDate()
    {
        return $this->isuAssignedDate;
    }

    /**
     * Set isuOrder
     *
     * @param int $isuOrder
     * @return IssueUser
     */
    public function setIsuOrder($isuOrder)
    {
        $this->isuOrder = $isuOrder;

        return $this;
    }

    /**
     * Get isuOrder
     *
     * @return int
     */
    public function getIsuOrder()
    {
        return $this->isuOrder;
    }
}
