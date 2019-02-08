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
 * ReminderHistory
 *
 * @ORM\Table(name="reminder_history")
 * @ORM\Entity
 */
class ReminderHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="rmh_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmhId;

    /**
     * @var int
     *
     * @ORM\Column(name="rmh_iss_id", type="integer", nullable=false)
     */
    private $rmhIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="rmh_rma_id", type="integer", nullable=false)
     */
    private $rmhRmaId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rmh_created_date", type="datetime", nullable=false)
     */
    private $rmhCreatedDate;

    /**
     * Get rmhId
     *
     * @return int
     */
    public function getRmhId()
    {
        return $this->rmhId;
    }

    /**
     * Set rmhIssId
     *
     * @param int $rmhIssId
     * @return ReminderHistory
     */
    public function setRmhIssId($rmhIssId)
    {
        $this->rmhIssId = $rmhIssId;

        return $this;
    }

    /**
     * Get rmhIssId
     *
     * @return int
     */
    public function getRmhIssId()
    {
        return $this->rmhIssId;
    }

    /**
     * Set rmhRmaId
     *
     * @param int $rmhRmaId
     * @return ReminderHistory
     */
    public function setRmhRmaId($rmhRmaId)
    {
        $this->rmhRmaId = $rmhRmaId;

        return $this;
    }

    /**
     * Get rmhRmaId
     *
     * @return int
     */
    public function getRmhRmaId()
    {
        return $this->rmhRmaId;
    }

    /**
     * Set rmhCreatedDate
     *
     * @param \DateTime $rmhCreatedDate
     * @return ReminderHistory
     */
    public function setRmhCreatedDate($rmhCreatedDate)
    {
        $this->rmhCreatedDate = $rmhCreatedDate;

        return $this;
    }

    /**
     * Get rmhCreatedDate
     *
     * @return \DateTime
     */
    public function getRmhCreatedDate()
    {
        return $this->rmhCreatedDate;
    }
}
