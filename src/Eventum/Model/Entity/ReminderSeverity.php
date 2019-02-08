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
 * ReminderSeverity
 *
 * @ORM\Table(name="reminder_severity")
 * @ORM\Entity
 */
class ReminderSeverity
{
    /**
     * @var int
     *
     * @ORM\Column(name="rms_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmsId;

    /**
     * @var int
     *
     * @ORM\Column(name="rms_rem_id", type="integer", nullable=false)
     */
    private $rmsRemId;

    /**
     * @var int
     *
     * @ORM\Column(name="rms_sev_id", type="integer", nullable=false)
     */
    private $rmsSevId;

    /**
     * Get rmsId
     *
     * @return int
     */
    public function getRmsId()
    {
        return $this->rmsId;
    }

    /**
     * Set rmsRemId
     *
     * @param int $rmsRemId
     * @return ReminderSeverity
     */
    public function setRmsRemId($rmsRemId)
    {
        $this->rmsRemId = $rmsRemId;

        return $this;
    }

    /**
     * Get rmsRemId
     *
     * @return int
     */
    public function getRmsRemId()
    {
        return $this->rmsRemId;
    }

    /**
     * Set rmsSevId
     *
     * @param int $rmsSevId
     * @return ReminderSeverity
     */
    public function setRmsSevId($rmsSevId)
    {
        $this->rmsSevId = $rmsSevId;

        return $this;
    }

    /**
     * Get rmsSevId
     *
     * @return int
     */
    public function getRmsSevId()
    {
        return $this->rmsSevId;
    }
}
