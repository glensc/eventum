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
 * ProjectRoundRobin
 *
 * @ORM\Table(name="project_round_robin", uniqueConstraints={@ORM\UniqueConstraint(name="prr_prj_id", columns={"prr_prj_id"})})
 * @ORM\Entity
 */
class ProjectRoundRobin
{
    /**
     * @var int
     *
     * @ORM\Column(name="prr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prrId;

    /**
     * @var int
     *
     * @ORM\Column(name="prr_prj_id", type="integer", nullable=false)
     */
    private $prrPrjId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prr_blackout_start", type="time", nullable=false)
     */
    private $prrBlackoutStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prr_blackout_end", type="time", nullable=false)
     */
    private $prrBlackoutEnd;

    /**
     * Get prrId
     *
     * @return int
     */
    public function getPrrId()
    {
        return $this->prrId;
    }

    /**
     * Set prrPrjId
     *
     * @param int $prrPrjId
     * @return ProjectRoundRobin
     */
    public function setPrrPrjId($prrPrjId)
    {
        $this->prrPrjId = $prrPrjId;

        return $this;
    }

    /**
     * Get prrPrjId
     *
     * @return int
     */
    public function getPrrPrjId()
    {
        return $this->prrPrjId;
    }

    /**
     * Set prrBlackoutStart
     *
     * @param \DateTime $prrBlackoutStart
     * @return ProjectRoundRobin
     */
    public function setPrrBlackoutStart($prrBlackoutStart)
    {
        $this->prrBlackoutStart = $prrBlackoutStart;

        return $this;
    }

    /**
     * Get prrBlackoutStart
     *
     * @return \DateTime
     */
    public function getPrrBlackoutStart()
    {
        return $this->prrBlackoutStart;
    }

    /**
     * Set prrBlackoutEnd
     *
     * @param \DateTime $prrBlackoutEnd
     * @return ProjectRoundRobin
     */
    public function setPrrBlackoutEnd($prrBlackoutEnd)
    {
        $this->prrBlackoutEnd = $prrBlackoutEnd;

        return $this;
    }

    /**
     * Get prrBlackoutEnd
     *
     * @return \DateTime
     */
    public function getPrrBlackoutEnd()
    {
        return $this->prrBlackoutEnd;
    }
}
