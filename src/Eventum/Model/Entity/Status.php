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
 * Status
 *
 * @ORM\Table(name="status", uniqueConstraints={@ORM\UniqueConstraint(name="sta_abbreviation", columns={"sta_abbreviation"})}, indexes={@ORM\Index(name="sta_rank", columns={"sta_rank"}), @ORM\Index(name="sta_is_closed", columns={"sta_is_closed"})})
 * @ORM\Entity
 */
class Status
{
    /**
     * @var int
     *
     * @ORM\Column(name="sta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $staId;

    /**
     * @var string
     *
     * @ORM\Column(name="sta_title", type="string", length=64, nullable=false)
     */
    private $staTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="sta_abbreviation", type="string", length=3, nullable=false)
     */
    private $staAbbreviation;

    /**
     * @var int
     *
     * @ORM\Column(name="sta_rank", type="integer", nullable=false)
     */
    private $staRank;

    /**
     * @var string
     *
     * @ORM\Column(name="sta_color", type="string", length=7, nullable=false)
     */
    private $staColor;

    /**
     * @var bool
     *
     * @ORM\Column(name="sta_is_closed", type="boolean", nullable=false)
     */
    private $staIsClosed;

    /**
     * Get staId
     *
     * @return int
     */
    public function getStaId()
    {
        return $this->staId;
    }

    /**
     * Set staTitle
     *
     * @param string $staTitle
     * @return Status
     */
    public function setStaTitle($staTitle)
    {
        $this->staTitle = $staTitle;

        return $this;
    }

    /**
     * Get staTitle
     *
     * @return string
     */
    public function getStaTitle()
    {
        return $this->staTitle;
    }

    /**
     * Set staAbbreviation
     *
     * @param string $staAbbreviation
     * @return Status
     */
    public function setStaAbbreviation($staAbbreviation)
    {
        $this->staAbbreviation = $staAbbreviation;

        return $this;
    }

    /**
     * Get staAbbreviation
     *
     * @return string
     */
    public function getStaAbbreviation()
    {
        return $this->staAbbreviation;
    }

    /**
     * Set staRank
     *
     * @param int $staRank
     * @return Status
     */
    public function setStaRank($staRank)
    {
        $this->staRank = $staRank;

        return $this;
    }

    /**
     * Get staRank
     *
     * @return int
     */
    public function getStaRank()
    {
        return $this->staRank;
    }

    /**
     * Set staColor
     *
     * @param string $staColor
     * @return Status
     */
    public function setStaColor($staColor)
    {
        $this->staColor = $staColor;

        return $this;
    }

    /**
     * Get staColor
     *
     * @return string
     */
    public function getStaColor()
    {
        return $this->staColor;
    }

    /**
     * Set staIsClosed
     *
     * @param bool $staIsClosed
     * @return Status
     */
    public function setStaIsClosed($staIsClosed)
    {
        $this->staIsClosed = $staIsClosed;

        return $this;
    }

    /**
     * Get staIsClosed
     *
     * @return bool
     */
    public function getStaIsClosed()
    {
        return $this->staIsClosed;
    }
}
