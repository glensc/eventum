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
 * TimeTracking
 *
 * @ORM\Table(name="time_tracking", indexes={@ORM\Index(name="ttr_ttc_id", columns={"ttr_ttc_id", "ttr_iss_id", "ttr_usr_id"}), @ORM\Index(name="ttr_iss_id", columns={"ttr_iss_id"}), @ORM\Index(name="ft_time_tracking", columns={"ttr_summary"})})
 * @ORM\Entity
 */
class TimeTracking
{
    /**
     * @var int
     *
     * @ORM\Column(name="ttr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ttrId;

    /**
     * @var int
     *
     * @ORM\Column(name="ttr_ttc_id", type="integer", nullable=false)
     */
    private $ttrTtcId;

    /**
     * @var int
     *
     * @ORM\Column(name="ttr_iss_id", type="integer", nullable=false)
     */
    private $ttrIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="ttr_usr_id", type="integer", nullable=false)
     */
    private $ttrUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ttr_created_date", type="datetime", nullable=false)
     */
    private $ttrCreatedDate;

    /**
     * @var int
     *
     * @ORM\Column(name="ttr_time_spent", type="integer", nullable=false)
     */
    private $ttrTimeSpent;

    /**
     * @var string
     *
     * @ORM\Column(name="ttr_summary", type="string", length=255, nullable=false)
     */
    private $ttrSummary;

    /**
     * Get ttrId
     *
     * @return int
     */
    public function getTtrId()
    {
        return $this->ttrId;
    }

    /**
     * Set ttrTtcId
     *
     * @param int $ttrTtcId
     * @return TimeTracking
     */
    public function setTtrTtcId($ttrTtcId)
    {
        $this->ttrTtcId = $ttrTtcId;

        return $this;
    }

    /**
     * Get ttrTtcId
     *
     * @return int
     */
    public function getTtrTtcId()
    {
        return $this->ttrTtcId;
    }

    /**
     * Set ttrIssId
     *
     * @param int $ttrIssId
     * @return TimeTracking
     */
    public function setTtrIssId($ttrIssId)
    {
        $this->ttrIssId = $ttrIssId;

        return $this;
    }

    /**
     * Get ttrIssId
     *
     * @return int
     */
    public function getTtrIssId()
    {
        return $this->ttrIssId;
    }

    /**
     * Set ttrUsrId
     *
     * @param int $ttrUsrId
     * @return TimeTracking
     */
    public function setTtrUsrId($ttrUsrId)
    {
        $this->ttrUsrId = $ttrUsrId;

        return $this;
    }

    /**
     * Get ttrUsrId
     *
     * @return int
     */
    public function getTtrUsrId()
    {
        return $this->ttrUsrId;
    }

    /**
     * Set ttrCreatedDate
     *
     * @param \DateTime $ttrCreatedDate
     * @return TimeTracking
     */
    public function setTtrCreatedDate($ttrCreatedDate)
    {
        $this->ttrCreatedDate = $ttrCreatedDate;

        return $this;
    }

    /**
     * Get ttrCreatedDate
     *
     * @return \DateTime
     */
    public function getTtrCreatedDate()
    {
        return $this->ttrCreatedDate;
    }

    /**
     * Set ttrTimeSpent
     *
     * @param int $ttrTimeSpent
     * @return TimeTracking
     */
    public function setTtrTimeSpent($ttrTimeSpent)
    {
        $this->ttrTimeSpent = $ttrTimeSpent;

        return $this;
    }

    /**
     * Get ttrTimeSpent
     *
     * @return int
     */
    public function getTtrTimeSpent()
    {
        return $this->ttrTimeSpent;
    }

    /**
     * Set ttrSummary
     *
     * @param string $ttrSummary
     * @return TimeTracking
     */
    public function setTtrSummary($ttrSummary)
    {
        $this->ttrSummary = $ttrSummary;

        return $this;
    }

    /**
     * Get ttrSummary
     *
     * @return string
     */
    public function getTtrSummary()
    {
        return $this->ttrSummary;
    }
}
