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
 * ProjectPhoneCategory
 *
 * @ORM\Table(name="project_phone_category", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_category", columns={"phc_prj_id", "phc_title"})}, indexes={@ORM\Index(name="phc_prj_id", columns={"phc_prj_id"})})
 * @ORM\Entity
 */
class ProjectPhoneCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="phc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phcId;

    /**
     * @var int
     *
     * @ORM\Column(name="phc_prj_id", type="integer", nullable=false)
     */
    private $phcPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="phc_title", type="string", length=64, nullable=false)
     */
    private $phcTitle;

    /**
     * Get phcId
     *
     * @return int
     */
    public function getPhcId()
    {
        return $this->phcId;
    }

    /**
     * Set phcPrjId
     *
     * @param int $phcPrjId
     * @return ProjectPhoneCategory
     */
    public function setPhcPrjId($phcPrjId)
    {
        $this->phcPrjId = $phcPrjId;

        return $this;
    }

    /**
     * Get phcPrjId
     *
     * @return int
     */
    public function getPhcPrjId()
    {
        return $this->phcPrjId;
    }

    /**
     * Set phcTitle
     *
     * @param string $phcTitle
     * @return ProjectPhoneCategory
     */
    public function setPhcTitle($phcTitle)
    {
        $this->phcTitle = $phcTitle;

        return $this;
    }

    /**
     * Get phcTitle
     *
     * @return string
     */
    public function getPhcTitle()
    {
        return $this->phcTitle;
    }
}
