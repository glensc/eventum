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
 * UserGroup
 *
 * @ORM\Table(name="user_group")
 * @ORM\Entity
 */
class UserGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="ugr_usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ugrUsrId;

    /**
     * @var int
     *
     * @ORM\Column(name="ugr_grp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ugrGrpId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ugr_created", type="datetime", nullable=false)
     */
    private $ugrCreated;

    /**
     * Set ugrUsrId
     *
     * @param int $ugrUsrId
     * @return UserGroup
     */
    public function setUgrUsrId($ugrUsrId)
    {
        $this->ugrUsrId = $ugrUsrId;

        return $this;
    }

    /**
     * Get ugrUsrId
     *
     * @return int
     */
    public function getUgrUsrId()
    {
        return $this->ugrUsrId;
    }

    /**
     * Set ugrGrpId
     *
     * @param int $ugrGrpId
     * @return UserGroup
     */
    public function setUgrGrpId($ugrGrpId)
    {
        $this->ugrGrpId = $ugrGrpId;

        return $this;
    }

    /**
     * Get ugrGrpId
     *
     * @return int
     */
    public function getUgrGrpId()
    {
        return $this->ugrGrpId;
    }

    /**
     * Set ugrCreated
     *
     * @param \DateTime $ugrCreated
     * @return UserGroup
     */
    public function setUgrCreated($ugrCreated)
    {
        $this->ugrCreated = $ugrCreated;

        return $this;
    }

    /**
     * Get ugrCreated
     *
     * @return \DateTime
     */
    public function getUgrCreated()
    {
        return $this->ugrCreated;
    }
}
