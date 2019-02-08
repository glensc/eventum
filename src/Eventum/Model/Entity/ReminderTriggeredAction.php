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
 * ReminderTriggeredAction
 *
 * @ORM\Table(name="reminder_triggered_action")
 * @ORM\Entity
 */
class ReminderTriggeredAction
{
    /**
     * @var int
     *
     * @ORM\Column(name="rta_iss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rtaIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="rta_rma_id", type="integer", nullable=false)
     */
    private $rtaRmaId;

    /**
     * Get rtaIssId
     *
     * @return int
     */
    public function getRtaIssId()
    {
        return $this->rtaIssId;
    }

    /**
     * Set rtaRmaId
     *
     * @param int $rtaRmaId
     * @return ReminderTriggeredAction
     */
    public function setRtaRmaId($rtaRmaId)
    {
        $this->rtaRmaId = $rtaRmaId;

        return $this;
    }

    /**
     * Get rtaRmaId
     *
     * @return int
     */
    public function getRtaRmaId()
    {
        return $this->rtaRmaId;
    }
}
