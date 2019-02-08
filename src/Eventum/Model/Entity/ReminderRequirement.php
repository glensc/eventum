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
 * ReminderRequirement
 *
 * @ORM\Table(name="reminder_requirement")
 * @ORM\Entity
 */
class ReminderRequirement
{
    /**
     * @var int
     *
     * @ORM\Column(name="rer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rerId;

    /**
     * @var int
     *
     * @ORM\Column(name="rer_rem_id", type="integer", nullable=false)
     */
    private $rerRemId;

    /**
     * @var int
     *
     * @ORM\Column(name="rer_iss_id", type="integer", nullable=true)
     */
    private $rerIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="rer_support_level_id", type="integer", nullable=true)
     */
    private $rerSupportLevelId;

    /**
     * @var string
     *
     * @ORM\Column(name="rer_customer_id", type="string", length=128, nullable=true)
     */
    private $rerCustomerId;

    /**
     * @var bool
     *
     * @ORM\Column(name="rer_trigger_all_issues", type="boolean", nullable=false)
     */
    private $rerTriggerAllIssues;

    /**
     * Get rerId
     *
     * @return int
     */
    public function getRerId()
    {
        return $this->rerId;
    }

    /**
     * Set rerRemId
     *
     * @param int $rerRemId
     * @return ReminderRequirement
     */
    public function setRerRemId($rerRemId)
    {
        $this->rerRemId = $rerRemId;

        return $this;
    }

    /**
     * Get rerRemId
     *
     * @return int
     */
    public function getRerRemId()
    {
        return $this->rerRemId;
    }

    /**
     * Set rerIssId
     *
     * @param int $rerIssId
     * @return ReminderRequirement
     */
    public function setRerIssId($rerIssId)
    {
        $this->rerIssId = $rerIssId;

        return $this;
    }

    /**
     * Get rerIssId
     *
     * @return int
     */
    public function getRerIssId()
    {
        return $this->rerIssId;
    }

    /**
     * Set rerSupportLevelId
     *
     * @param int $rerSupportLevelId
     * @return ReminderRequirement
     */
    public function setRerSupportLevelId($rerSupportLevelId)
    {
        $this->rerSupportLevelId = $rerSupportLevelId;

        return $this;
    }

    /**
     * Get rerSupportLevelId
     *
     * @return int
     */
    public function getRerSupportLevelId()
    {
        return $this->rerSupportLevelId;
    }

    /**
     * Set rerCustomerId
     *
     * @param string $rerCustomerId
     * @return ReminderRequirement
     */
    public function setRerCustomerId($rerCustomerId)
    {
        $this->rerCustomerId = $rerCustomerId;

        return $this;
    }

    /**
     * Get rerCustomerId
     *
     * @return string
     */
    public function getRerCustomerId()
    {
        return $this->rerCustomerId;
    }

    /**
     * Set rerTriggerAllIssues
     *
     * @param bool $rerTriggerAllIssues
     * @return ReminderRequirement
     */
    public function setRerTriggerAllIssues($rerTriggerAllIssues)
    {
        $this->rerTriggerAllIssues = $rerTriggerAllIssues;

        return $this;
    }

    /**
     * Get rerTriggerAllIssues
     *
     * @return bool
     */
    public function getRerTriggerAllIssues()
    {
        return $this->rerTriggerAllIssues;
    }
}
