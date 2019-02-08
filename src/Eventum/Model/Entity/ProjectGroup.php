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
 * ProjectGroup
 *
 * @ORM\Table(name="project_group")
 * @ORM\Entity
 */
class ProjectGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="pgr_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pgrPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="pgr_grp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pgrGrpId;

    /**
     * Set pgrPrjId
     *
     * @param int $pgrPrjId
     * @return ProjectGroup
     */
    public function setPgrPrjId($pgrPrjId)
    {
        $this->pgrPrjId = $pgrPrjId;

        return $this;
    }

    /**
     * Get pgrPrjId
     *
     * @return int
     */
    public function getPgrPrjId()
    {
        return $this->pgrPrjId;
    }

    /**
     * Set pgrGrpId
     *
     * @param int $pgrGrpId
     * @return ProjectGroup
     */
    public function setPgrGrpId($pgrGrpId)
    {
        $this->pgrGrpId = $pgrGrpId;

        return $this;
    }

    /**
     * Get pgrGrpId
     *
     * @return int
     */
    public function getPgrGrpId()
    {
        return $this->pgrGrpId;
    }
}
