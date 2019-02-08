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
 * ProjectLinkFilter
 *
 * @ORM\Table(name="project_link_filter")
 * @ORM\Entity
 */
class ProjectLinkFilter
{
    /**
     * @var int
     *
     * @ORM\Column(name="plf_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $plfPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="plf_lfi_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $plfLfiId;

    /**
     * Set plfPrjId
     *
     * @param int $plfPrjId
     * @return ProjectLinkFilter
     */
    public function setPlfPrjId($plfPrjId)
    {
        $this->plfPrjId = $plfPrjId;

        return $this;
    }

    /**
     * Get plfPrjId
     *
     * @return int
     */
    public function getPlfPrjId()
    {
        return $this->plfPrjId;
    }

    /**
     * Set plfLfiId
     *
     * @param int $plfLfiId
     * @return ProjectLinkFilter
     */
    public function setPlfLfiId($plfLfiId)
    {
        $this->plfLfiId = $plfLfiId;

        return $this;
    }

    /**
     * Get plfLfiId
     *
     * @return int
     */
    public function getPlfLfiId()
    {
        return $this->plfLfiId;
    }
}
