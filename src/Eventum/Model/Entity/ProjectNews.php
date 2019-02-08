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
 * ProjectNews
 *
 * @ORM\Table(name="project_news")
 * @ORM\Entity
 */
class ProjectNews
{
    /**
     * @var int
     *
     * @ORM\Column(name="prn_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prnPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="prn_nws_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prnNwsId;

    /**
     * Set prnPrjId
     *
     * @param int $prnPrjId
     * @return ProjectNews
     */
    public function setPrnPrjId($prnPrjId)
    {
        $this->prnPrjId = $prnPrjId;

        return $this;
    }

    /**
     * Get prnPrjId
     *
     * @return int
     */
    public function getPrnPrjId()
    {
        return $this->prnPrjId;
    }

    /**
     * Set prnNwsId
     *
     * @param int $prnNwsId
     * @return ProjectNews
     */
    public function setPrnNwsId($prnNwsId)
    {
        $this->prnNwsId = $prnNwsId;

        return $this;
    }

    /**
     * Get prnNwsId
     *
     * @return int
     */
    public function getPrnNwsId()
    {
        return $this->prnNwsId;
    }
}
