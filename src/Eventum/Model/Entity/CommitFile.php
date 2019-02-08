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
 * CommitFile
 *
 * @ORM\Table(name="commit_file")
 * @ORM\Entity
 */
class CommitFile
{
    /**
     * @var int
     *
     * @ORM\Column(name="cof_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cofId;

    /**
     * @var int
     *
     * @ORM\Column(name="cof_com_id", type="integer", nullable=false)
     */
    private $cofComId;

    /**
     * @var string
     *
     * @ORM\Column(name="cof_filename", type="string", length=255, nullable=false)
     */
    private $cofFilename;

    /**
     * @var bool
     *
     * @ORM\Column(name="cof_added", type="boolean", nullable=false)
     */
    private $cofAdded;

    /**
     * @var bool
     *
     * @ORM\Column(name="cof_modified", type="boolean", nullable=false)
     */
    private $cofModified;

    /**
     * @var bool
     *
     * @ORM\Column(name="cof_removed", type="boolean", nullable=false)
     */
    private $cofRemoved;

    /**
     * @var string
     *
     * @ORM\Column(name="cof_old_version", type="string", length=40, nullable=true)
     */
    private $cofOldVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="cof_new_version", type="string", length=40, nullable=true)
     */
    private $cofNewVersion;

    /**
     * Get cofId
     *
     * @return int
     */
    public function getCofId()
    {
        return $this->cofId;
    }

    /**
     * Set cofComId
     *
     * @param int $cofComId
     * @return CommitFile
     */
    public function setCofComId($cofComId)
    {
        $this->cofComId = $cofComId;

        return $this;
    }

    /**
     * Get cofComId
     *
     * @return int
     */
    public function getCofComId()
    {
        return $this->cofComId;
    }

    /**
     * Set cofFilename
     *
     * @param string $cofFilename
     * @return CommitFile
     */
    public function setCofFilename($cofFilename)
    {
        $this->cofFilename = $cofFilename;

        return $this;
    }

    /**
     * Get cofFilename
     *
     * @return string
     */
    public function getCofFilename()
    {
        return $this->cofFilename;
    }

    /**
     * Set cofAdded
     *
     * @param bool $cofAdded
     * @return CommitFile
     */
    public function setCofAdded($cofAdded)
    {
        $this->cofAdded = $cofAdded;

        return $this;
    }

    /**
     * Get cofAdded
     *
     * @return bool
     */
    public function getCofAdded()
    {
        return $this->cofAdded;
    }

    /**
     * Set cofModified
     *
     * @param bool $cofModified
     * @return CommitFile
     */
    public function setCofModified($cofModified)
    {
        $this->cofModified = $cofModified;

        return $this;
    }

    /**
     * Get cofModified
     *
     * @return bool
     */
    public function getCofModified()
    {
        return $this->cofModified;
    }

    /**
     * Set cofRemoved
     *
     * @param bool $cofRemoved
     * @return CommitFile
     */
    public function setCofRemoved($cofRemoved)
    {
        $this->cofRemoved = $cofRemoved;

        return $this;
    }

    /**
     * Get cofRemoved
     *
     * @return bool
     */
    public function getCofRemoved()
    {
        return $this->cofRemoved;
    }

    /**
     * Set cofOldVersion
     *
     * @param string $cofOldVersion
     * @return CommitFile
     */
    public function setCofOldVersion($cofOldVersion)
    {
        $this->cofOldVersion = $cofOldVersion;

        return $this;
    }

    /**
     * Get cofOldVersion
     *
     * @return string
     */
    public function getCofOldVersion()
    {
        return $this->cofOldVersion;
    }

    /**
     * Set cofNewVersion
     *
     * @param string $cofNewVersion
     * @return CommitFile
     */
    public function setCofNewVersion($cofNewVersion)
    {
        $this->cofNewVersion = $cofNewVersion;

        return $this;
    }

    /**
     * Get cofNewVersion
     *
     * @return string
     */
    public function getCofNewVersion()
    {
        return $this->cofNewVersion;
    }
}
