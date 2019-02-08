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
 * ProjectStatus
 *
 * @ORM\Table(name="project_status", indexes={@ORM\Index(name="prs_prj_id", columns={"prs_prj_id", "prs_sta_id"})})
 * @ORM\Entity
 */
class ProjectStatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="prs_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prsId;

    /**
     * @var int
     *
     * @ORM\Column(name="prs_prj_id", type="integer", nullable=false)
     */
    private $prsPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="prs_sta_id", type="integer", nullable=false)
     */
    private $prsStaId;

    /**
     * Get prsId
     *
     * @return int
     */
    public function getPrsId()
    {
        return $this->prsId;
    }

    /**
     * Set prsPrjId
     *
     * @param int $prsPrjId
     * @return ProjectStatus
     */
    public function setPrsPrjId($prsPrjId)
    {
        $this->prsPrjId = $prsPrjId;

        return $this;
    }

    /**
     * Get prsPrjId
     *
     * @return int
     */
    public function getPrsPrjId()
    {
        return $this->prsPrjId;
    }

    /**
     * Set prsStaId
     *
     * @param int $prsStaId
     * @return ProjectStatus
     */
    public function setPrsStaId($prsStaId)
    {
        $this->prsStaId = $prsStaId;

        return $this;
    }

    /**
     * Get prsStaId
     *
     * @return int
     */
    public function getPrsStaId()
    {
        return $this->prsStaId;
    }
}
