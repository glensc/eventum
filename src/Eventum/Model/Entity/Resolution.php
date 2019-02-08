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
 * Resolution
 *
 * @ORM\Table(name="resolution", uniqueConstraints={@ORM\UniqueConstraint(name="res_title", columns={"res_title"})})
 * @ORM\Entity
 */
class Resolution
{
    /**
     * @var int
     *
     * @ORM\Column(name="res_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resId;

    /**
     * @var string
     *
     * @ORM\Column(name="res_title", type="string", length=64, nullable=false)
     */
    private $resTitle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="res_created_date", type="datetime", nullable=false)
     */
    private $resCreatedDate;

    /**
     * @var int
     *
     * @ORM\Column(name="res_rank", type="integer", nullable=false)
     */
    private $resRank;

    /**
     * Get resId
     *
     * @return int
     */
    public function getResId()
    {
        return $this->resId;
    }

    /**
     * Set resTitle
     *
     * @param string $resTitle
     * @return Resolution
     */
    public function setResTitle($resTitle)
    {
        $this->resTitle = $resTitle;

        return $this;
    }

    /**
     * Get resTitle
     *
     * @return string
     */
    public function getResTitle()
    {
        return $this->resTitle;
    }

    /**
     * Set resCreatedDate
     *
     * @param \DateTime $resCreatedDate
     * @return Resolution
     */
    public function setResCreatedDate($resCreatedDate)
    {
        $this->resCreatedDate = $resCreatedDate;

        return $this;
    }

    /**
     * Get resCreatedDate
     *
     * @return \DateTime
     */
    public function getResCreatedDate()
    {
        return $this->resCreatedDate;
    }

    /**
     * Set resRank
     *
     * @param int $resRank
     * @return Resolution
     */
    public function setResRank($resRank)
    {
        $this->resRank = $resRank;

        return $this;
    }

    /**
     * Get resRank
     *
     * @return int
     */
    public function getResRank()
    {
        return $this->resRank;
    }
}
