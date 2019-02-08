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
 * ProjectUser
 *
 * @ORM\Table(name="project_user", uniqueConstraints={@ORM\UniqueConstraint(name="pru_prj_id", columns={"pru_prj_id", "pru_usr_id"})})
 * @ORM\Entity
 */
class ProjectUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="pru_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pruId;

    /**
     * @var int
     *
     * @ORM\Column(name="pru_prj_id", type="integer", nullable=false)
     */
    private $pruPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="pru_usr_id", type="integer", nullable=false)
     */
    private $pruUsrId;

    /**
     * @var bool
     *
     * @ORM\Column(name="pru_role", type="boolean", nullable=false)
     */
    private $pruRole;

    /**
     * Get pruId
     *
     * @return int
     */
    public function getPruId()
    {
        return $this->pruId;
    }

    /**
     * Set pruPrjId
     *
     * @param int $pruPrjId
     * @return ProjectUser
     */
    public function setPruPrjId($pruPrjId)
    {
        $this->pruPrjId = $pruPrjId;

        return $this;
    }

    /**
     * Get pruPrjId
     *
     * @return int
     */
    public function getPruPrjId()
    {
        return $this->pruPrjId;
    }

    /**
     * Set pruUsrId
     *
     * @param int $pruUsrId
     * @return ProjectUser
     */
    public function setPruUsrId($pruUsrId)
    {
        $this->pruUsrId = $pruUsrId;

        return $this;
    }

    /**
     * Get pruUsrId
     *
     * @return int
     */
    public function getPruUsrId()
    {
        return $this->pruUsrId;
    }

    /**
     * Set pruRole
     *
     * @param bool $pruRole
     * @return ProjectUser
     */
    public function setPruRole($pruRole)
    {
        $this->pruRole = $pruRole;

        return $this;
    }

    /**
     * Get pruRole
     *
     * @return bool
     */
    public function getPruRole()
    {
        return $this->pruRole;
    }
}
