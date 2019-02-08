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
 * ProjectPriority
 *
 * @ORM\Table(name="project_priority", uniqueConstraints={@ORM\UniqueConstraint(name="pri_title", columns={"pri_title", "pri_prj_id"})})
 * @ORM\Entity
 */
class ProjectPriority
{
    /**
     * @var int
     *
     * @ORM\Column(name="pri_id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $priId;

    /**
     * @var int
     *
     * @ORM\Column(name="pri_prj_id", type="integer", nullable=false)
     */
    private $priPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="pri_title", type="string", length=64, nullable=false)
     */
    private $priTitle;

    /**
     * @var bool
     *
     * @ORM\Column(name="pri_rank", type="boolean", nullable=false)
     */
    private $priRank;

    /**
     * @var bool
     *
     * @ORM\Column(name="pri_icon", type="boolean", nullable=false)
     */
    private $priIcon;

    /**
     * Get priId
     *
     * @return int
     */
    public function getPriId()
    {
        return $this->priId;
    }

    /**
     * Set priPrjId
     *
     * @param int $priPrjId
     * @return ProjectPriority
     */
    public function setPriPrjId($priPrjId)
    {
        $this->priPrjId = $priPrjId;

        return $this;
    }

    /**
     * Get priPrjId
     *
     * @return int
     */
    public function getPriPrjId()
    {
        return $this->priPrjId;
    }

    /**
     * Set priTitle
     *
     * @param string $priTitle
     * @return ProjectPriority
     */
    public function setPriTitle($priTitle)
    {
        $this->priTitle = $priTitle;

        return $this;
    }

    /**
     * Get priTitle
     *
     * @return string
     */
    public function getPriTitle()
    {
        return $this->priTitle;
    }

    /**
     * Set priRank
     *
     * @param bool $priRank
     * @return ProjectPriority
     */
    public function setPriRank($priRank)
    {
        $this->priRank = $priRank;

        return $this;
    }

    /**
     * Get priRank
     *
     * @return bool
     */
    public function getPriRank()
    {
        return $this->priRank;
    }

    /**
     * Set priIcon
     *
     * @param bool $priIcon
     * @return ProjectPriority
     */
    public function setPriIcon($priIcon)
    {
        $this->priIcon = $priIcon;

        return $this;
    }

    /**
     * Get priIcon
     *
     * @return bool
     */
    public function getPriIcon()
    {
        return $this->priIcon;
    }
}
