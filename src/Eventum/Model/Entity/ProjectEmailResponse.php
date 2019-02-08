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
 * ProjectEmailResponse
 *
 * @ORM\Table(name="project_email_response")
 * @ORM\Entity
 */
class ProjectEmailResponse
{
    /**
     * @var int
     *
     * @ORM\Column(name="per_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $perPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="per_ere_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $perEreId;

    /**
     * Set perPrjId
     *
     * @param int $perPrjId
     * @return ProjectEmailResponse
     */
    public function setPerPrjId($perPrjId)
    {
        $this->perPrjId = $perPrjId;

        return $this;
    }

    /**
     * Get perPrjId
     *
     * @return int
     */
    public function getPerPrjId()
    {
        return $this->perPrjId;
    }

    /**
     * Set perEreId
     *
     * @param int $perEreId
     * @return ProjectEmailResponse
     */
    public function setPerEreId($perEreId)
    {
        $this->perEreId = $perEreId;

        return $this;
    }

    /**
     * Get perEreId
     *
     * @return int
     */
    public function getPerEreId()
    {
        return $this->perEreId;
    }
}
