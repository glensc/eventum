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
 * FaqSupportLevel
 *
 * @ORM\Table(name="faq_support_level")
 * @ORM\Entity
 */
class FaqSupportLevel
{
    /**
     * @var int
     *
     * @ORM\Column(name="fsl_faq_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fslFaqId;

    /**
     * @var string
     *
     * @ORM\Column(name="fsl_support_level_id", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fslSupportLevelId;

    /**
     * Set fslFaqId
     *
     * @param int $fslFaqId
     * @return FaqSupportLevel
     */
    public function setFslFaqId($fslFaqId)
    {
        $this->fslFaqId = $fslFaqId;

        return $this;
    }

    /**
     * Get fslFaqId
     *
     * @return int
     */
    public function getFslFaqId()
    {
        return $this->fslFaqId;
    }

    /**
     * Set fslSupportLevelId
     *
     * @param string $fslSupportLevelId
     * @return FaqSupportLevel
     */
    public function setFslSupportLevelId($fslSupportLevelId)
    {
        $this->fslSupportLevelId = $fslSupportLevelId;

        return $this;
    }

    /**
     * Get fslSupportLevelId
     *
     * @return string
     */
    public function getFslSupportLevelId()
    {
        return $this->fslSupportLevelId;
    }
}
