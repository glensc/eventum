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
 * IssueAttachmentFilePath
 *
 * @ORM\Table(name="issue_attachment_file_path")
 * @ORM\Entity
 */
class IssueAttachmentFilePath
{
    /**
     * @var int
     *
     * @ORM\Column(name="iap_iaf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iapIafId;

    /**
     * @var string
     *
     * @ORM\Column(name="iap_flysystem_path", type="string", length=255, nullable=true)
     */
    private $iapFlysystemPath;

    /**
     * Get iapIafId
     *
     * @return int
     */
    public function getIapIafId()
    {
        return $this->iapIafId;
    }

    /**
     * Set iapFlysystemPath
     *
     * @param string $iapFlysystemPath
     * @return IssueAttachmentFilePath
     */
    public function setIapFlysystemPath($iapFlysystemPath)
    {
        $this->iapFlysystemPath = $iapFlysystemPath;

        return $this;
    }

    /**
     * Get iapFlysystemPath
     *
     * @return string
     */
    public function getIapFlysystemPath()
    {
        return $this->iapFlysystemPath;
    }
}
