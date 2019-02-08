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
 * Group
 *
 * @ORM\Table(name="group", uniqueConstraints={@ORM\UniqueConstraint(name="grp_name", columns={"grp_name"})})
 * @ORM\Entity
 */
class Group
{
    /**
     * @var int
     *
     * @ORM\Column(name="grp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grpId;

    /**
     * @var string
     *
     * @ORM\Column(name="grp_name", type="string", length=100, nullable=false)
     */
    private $grpName;

    /**
     * @var string
     *
     * @ORM\Column(name="grp_description", type="string", length=255, nullable=true)
     */
    private $grpDescription;

    /**
     * @var int
     *
     * @ORM\Column(name="grp_manager_usr_id", type="integer", nullable=false)
     */
    private $grpManagerUsrId;

    /**
     * Get grpId
     *
     * @return int
     */
    public function getGrpId()
    {
        return $this->grpId;
    }

    /**
     * Set grpName
     *
     * @param string $grpName
     * @return Group
     */
    public function setGrpName($grpName)
    {
        $this->grpName = $grpName;

        return $this;
    }

    /**
     * Get grpName
     *
     * @return string
     */
    public function getGrpName()
    {
        return $this->grpName;
    }

    /**
     * Set grpDescription
     *
     * @param string $grpDescription
     * @return Group
     */
    public function setGrpDescription($grpDescription)
    {
        $this->grpDescription = $grpDescription;

        return $this;
    }

    /**
     * Get grpDescription
     *
     * @return string
     */
    public function getGrpDescription()
    {
        return $this->grpDescription;
    }

    /**
     * Set grpManagerUsrId
     *
     * @param int $grpManagerUsrId
     * @return Group
     */
    public function setGrpManagerUsrId($grpManagerUsrId)
    {
        $this->grpManagerUsrId = $grpManagerUsrId;

        return $this;
    }

    /**
     * Get grpManagerUsrId
     *
     * @return int
     */
    public function getGrpManagerUsrId()
    {
        return $this->grpManagerUsrId;
    }
}
