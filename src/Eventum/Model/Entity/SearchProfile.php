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
 * SearchProfile
 *
 * @ORM\Table(name="search_profile", uniqueConstraints={@ORM\UniqueConstraint(name="sep_usr_id", columns={"sep_usr_id", "sep_prj_id", "sep_type"})})
 * @ORM\Entity
 */
class SearchProfile
{
    /**
     * @var int
     *
     * @ORM\Column(name="sep_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sepId;

    /**
     * @var int
     *
     * @ORM\Column(name="sep_usr_id", type="integer", nullable=false)
     */
    private $sepUsrId;

    /**
     * @var int
     *
     * @ORM\Column(name="sep_prj_id", type="integer", nullable=false)
     */
    private $sepPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="sep_type", type="string", length=5, nullable=false)
     */
    private $sepType;

    /**
     * @var string
     *
     * @ORM\Column(name="sep_user_profile", type="blob", length=65535, nullable=false)
     */
    private $sepUserProfile;

    /**
     * Get sepId
     *
     * @return int
     */
    public function getSepId()
    {
        return $this->sepId;
    }

    /**
     * Set sepUsrId
     *
     * @param int $sepUsrId
     * @return SearchProfile
     */
    public function setSepUsrId($sepUsrId)
    {
        $this->sepUsrId = $sepUsrId;

        return $this;
    }

    /**
     * Get sepUsrId
     *
     * @return int
     */
    public function getSepUsrId()
    {
        return $this->sepUsrId;
    }

    /**
     * Set sepPrjId
     *
     * @param int $sepPrjId
     * @return SearchProfile
     */
    public function setSepPrjId($sepPrjId)
    {
        $this->sepPrjId = $sepPrjId;

        return $this;
    }

    /**
     * Get sepPrjId
     *
     * @return int
     */
    public function getSepPrjId()
    {
        return $this->sepPrjId;
    }

    /**
     * Set sepType
     *
     * @param string $sepType
     * @return SearchProfile
     */
    public function setSepType($sepType)
    {
        $this->sepType = $sepType;

        return $this;
    }

    /**
     * Get sepType
     *
     * @return string
     */
    public function getSepType()
    {
        return $this->sepType;
    }

    /**
     * Set sepUserProfile
     *
     * @param string $sepUserProfile
     * @return SearchProfile
     */
    public function setSepUserProfile($sepUserProfile)
    {
        $this->sepUserProfile = $sepUserProfile;

        return $this;
    }

    /**
     * Get sepUserProfile
     *
     * @return string
     */
    public function getSepUserProfile()
    {
        return $this->sepUserProfile;
    }
}
