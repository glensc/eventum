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
 * ReminderPriority
 *
 * @ORM\Table(name="reminder_priority")
 * @ORM\Entity
 */
class ReminderPriority
{
    /**
     * @var int
     *
     * @ORM\Column(name="rep_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $repId;

    /**
     * @var int
     *
     * @ORM\Column(name="rep_rem_id", type="integer", nullable=false)
     */
    private $repRemId;

    /**
     * @var int
     *
     * @ORM\Column(name="rep_pri_id", type="integer", nullable=false)
     */
    private $repPriId;

    /**
     * Get repId
     *
     * @return int
     */
    public function getRepId()
    {
        return $this->repId;
    }

    /**
     * Set repRemId
     *
     * @param int $repRemId
     * @return ReminderPriority
     */
    public function setRepRemId($repRemId)
    {
        $this->repRemId = $repRemId;

        return $this;
    }

    /**
     * Get repRemId
     *
     * @return int
     */
    public function getRepRemId()
    {
        return $this->repRemId;
    }

    /**
     * Set repPriId
     *
     * @param int $repPriId
     * @return ReminderPriority
     */
    public function setRepPriId($repPriId)
    {
        $this->repPriId = $repPriId;

        return $this;
    }

    /**
     * Get repPriId
     *
     * @return int
     */
    public function getRepPriId()
    {
        return $this->repPriId;
    }
}
