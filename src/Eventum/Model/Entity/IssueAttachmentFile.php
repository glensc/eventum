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
 * IssueAttachmentFile
 *
 * @ORM\Table(name="issue_attachment_file", indexes={@ORM\Index(name="iaf_iat_id", columns={"iaf_iat_id"})})
 * @ORM\Entity
 */
class IssueAttachmentFile
{
    /**
     * @var int
     *
     * @ORM\Column(name="iaf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iafId;

    /**
     * @var int
     *
     * @ORM\Column(name="iaf_iat_id", type="integer", nullable=false)
     */
    private $iafIatId;

    /**
     * @var string
     *
     * @ORM\Column(name="iaf_file", type="blob", nullable=true)
     */
    private $iafFile;

    /**
     * @var string
     *
     * @ORM\Column(name="iaf_filename", type="string", length=255, nullable=false)
     */
    private $iafFilename;

    /**
     * @var string
     *
     * @ORM\Column(name="iaf_filetype", type="string", length=255, nullable=true)
     */
    private $iafFiletype;

    /**
     * @var string
     *
     * @ORM\Column(name="iaf_filesize", type="string", length=32, nullable=false)
     */
    private $iafFilesize;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iaf_created_date", type="datetime", nullable=false)
     */
    private $iafCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="iaf_flysystem_path", type="string", length=255, nullable=true)
     */
    private $iafFlysystemPath;

    /**
     * Get iafId
     *
     * @return int
     */
    public function getIafId()
    {
        return $this->iafId;
    }

    /**
     * Set iafIatId
     *
     * @param int $iafIatId
     * @return IssueAttachmentFile
     */
    public function setIafIatId($iafIatId)
    {
        $this->iafIatId = $iafIatId;

        return $this;
    }

    /**
     * Get iafIatId
     *
     * @return int
     */
    public function getIafIatId()
    {
        return $this->iafIatId;
    }

    /**
     * Set iafFile
     *
     * @param string $iafFile
     * @return IssueAttachmentFile
     */
    public function setIafFile($iafFile)
    {
        $this->iafFile = $iafFile;

        return $this;
    }

    /**
     * Get iafFile
     *
     * @return string
     */
    public function getIafFile()
    {
        return $this->iafFile;
    }

    /**
     * Set iafFilename
     *
     * @param string $iafFilename
     * @return IssueAttachmentFile
     */
    public function setIafFilename($iafFilename)
    {
        $this->iafFilename = $iafFilename;

        return $this;
    }

    /**
     * Get iafFilename
     *
     * @return string
     */
    public function getIafFilename()
    {
        return $this->iafFilename;
    }

    /**
     * Set iafFiletype
     *
     * @param string $iafFiletype
     * @return IssueAttachmentFile
     */
    public function setIafFiletype($iafFiletype)
    {
        $this->iafFiletype = $iafFiletype;

        return $this;
    }

    /**
     * Get iafFiletype
     *
     * @return string
     */
    public function getIafFiletype()
    {
        return $this->iafFiletype;
    }

    /**
     * Set iafFilesize
     *
     * @param string $iafFilesize
     * @return IssueAttachmentFile
     */
    public function setIafFilesize($iafFilesize)
    {
        $this->iafFilesize = $iafFilesize;

        return $this;
    }

    /**
     * Get iafFilesize
     *
     * @return string
     */
    public function getIafFilesize()
    {
        return $this->iafFilesize;
    }

    /**
     * Set iafCreatedDate
     *
     * @param \DateTime $iafCreatedDate
     * @return IssueAttachmentFile
     */
    public function setIafCreatedDate($iafCreatedDate)
    {
        $this->iafCreatedDate = $iafCreatedDate;

        return $this;
    }

    /**
     * Get iafCreatedDate
     *
     * @return \DateTime
     */
    public function getIafCreatedDate()
    {
        return $this->iafCreatedDate;
    }

    /**
     * Set iafFlysystemPath
     *
     * @param string $iafFlysystemPath
     * @return IssueAttachmentFile
     */
    public function setIafFlysystemPath($iafFlysystemPath)
    {
        $this->iafFlysystemPath = $iafFlysystemPath;

        return $this;
    }

    /**
     * Get iafFlysystemPath
     *
     * @return string
     */
    public function getIafFlysystemPath()
    {
        return $this->iafFlysystemPath;
    }
}
