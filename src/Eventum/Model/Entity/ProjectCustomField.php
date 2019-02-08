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
 * ProjectCustomField
 *
 * @ORM\Table(name="project_custom_field", indexes={@ORM\Index(name="pcf_prj_id", columns={"pcf_prj_id"}), @ORM\Index(name="pcf_fld_id", columns={"pcf_fld_id"})})
 * @ORM\Entity
 */
class ProjectCustomField
{
    /**
     * @var int
     *
     * @ORM\Column(name="pcf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pcfId;

    /**
     * @var int
     *
     * @ORM\Column(name="pcf_prj_id", type="integer", nullable=false)
     */
    private $pcfPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="pcf_fld_id", type="integer", nullable=false)
     */
    private $pcfFldId;

    /**
     * Get pcfId
     *
     * @return int
     */
    public function getPcfId()
    {
        return $this->pcfId;
    }

    /**
     * Set pcfPrjId
     *
     * @param int $pcfPrjId
     * @return ProjectCustomField
     */
    public function setPcfPrjId($pcfPrjId)
    {
        $this->pcfPrjId = $pcfPrjId;

        return $this;
    }

    /**
     * Get pcfPrjId
     *
     * @return int
     */
    public function getPcfPrjId()
    {
        return $this->pcfPrjId;
    }

    /**
     * Set pcfFldId
     *
     * @param int $pcfFldId
     * @return ProjectCustomField
     */
    public function setPcfFldId($pcfFldId)
    {
        $this->pcfFldId = $pcfFldId;

        return $this;
    }

    /**
     * Get pcfFldId
     *
     * @return int
     */
    public function getPcfFldId()
    {
        return $this->pcfFldId;
    }
}
