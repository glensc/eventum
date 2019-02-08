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
 * ProjectSeverity
 *
 * @ORM\Table(name="project_severity", uniqueConstraints={@ORM\UniqueConstraint(name="sev_title", columns={"sev_title", "sev_prj_id"})})
 * @ORM\Entity
 */
class ProjectSeverity
{
    /**
     * @var int
     *
     * @ORM\Column(name="sev_id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sevId;

    /**
     * @var int
     *
     * @ORM\Column(name="sev_prj_id", type="integer", nullable=false)
     */
    private $sevPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="sev_title", type="string", length=64, nullable=false)
     */
    private $sevTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="sev_description", type="string", length=255, nullable=true)
     */
    private $sevDescription;

    /**
     * @var bool
     *
     * @ORM\Column(name="sev_rank", type="boolean", nullable=false)
     */
    private $sevRank;

    /**
     * Get sevId
     *
     * @return int
     */
    public function getSevId()
    {
        return $this->sevId;
    }

    /**
     * Set sevPrjId
     *
     * @param int $sevPrjId
     * @return ProjectSeverity
     */
    public function setSevPrjId($sevPrjId)
    {
        $this->sevPrjId = $sevPrjId;

        return $this;
    }

    /**
     * Get sevPrjId
     *
     * @return int
     */
    public function getSevPrjId()
    {
        return $this->sevPrjId;
    }

    /**
     * Set sevTitle
     *
     * @param string $sevTitle
     * @return ProjectSeverity
     */
    public function setSevTitle($sevTitle)
    {
        $this->sevTitle = $sevTitle;

        return $this;
    }

    /**
     * Get sevTitle
     *
     * @return string
     */
    public function getSevTitle()
    {
        return $this->sevTitle;
    }

    /**
     * Set sevDescription
     *
     * @param string $sevDescription
     * @return ProjectSeverity
     */
    public function setSevDescription($sevDescription)
    {
        $this->sevDescription = $sevDescription;

        return $this;
    }

    /**
     * Get sevDescription
     *
     * @return string
     */
    public function getSevDescription()
    {
        return $this->sevDescription;
    }

    /**
     * Set sevRank
     *
     * @param bool $sevRank
     * @return ProjectSeverity
     */
    public function setSevRank($sevRank)
    {
        $this->sevRank = $sevRank;

        return $this;
    }

    /**
     * Get sevRank
     *
     * @return bool
     */
    public function getSevRank()
    {
        return $this->sevRank;
    }
}
