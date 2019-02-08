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
 * IrcNotice
 *
 * @ORM\Table(name="irc_notice", indexes={@ORM\Index(name="ino_status", columns={"ino_status", "ino_prj_id"})})
 * @ORM\Entity
 */
class IrcNotice
{
    /**
     * @var int
     *
     * @ORM\Column(name="ino_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $inoId;

    /**
     * @var int
     *
     * @ORM\Column(name="ino_prj_id", type="integer", nullable=false)
     */
    private $inoPrjId;

    /**
     * @var int
     *
     * @ORM\Column(name="ino_iss_id", type="integer", nullable=false)
     */
    private $inoIssId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ino_created_date", type="datetime", nullable=false)
     */
    private $inoCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ino_message", type="string", length=255, nullable=false)
     */
    private $inoMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="ino_status", type="string", length=8, nullable=false)
     */
    private $inoStatus;

    /**
     * @var int
     *
     * @ORM\Column(name="ino_target_usr_id", type="integer", nullable=true)
     */
    private $inoTargetUsrId;

    /**
     * @var string
     *
     * @ORM\Column(name="ino_category", type="string", length=25, nullable=true)
     */
    private $inoCategory;

    /**
     * Get inoId
     *
     * @return int
     */
    public function getInoId()
    {
        return $this->inoId;
    }

    /**
     * Set inoPrjId
     *
     * @param int $inoPrjId
     * @return IrcNotice
     */
    public function setInoPrjId($inoPrjId)
    {
        $this->inoPrjId = $inoPrjId;

        return $this;
    }

    /**
     * Get inoPrjId
     *
     * @return int
     */
    public function getInoPrjId()
    {
        return $this->inoPrjId;
    }

    /**
     * Set inoIssId
     *
     * @param int $inoIssId
     * @return IrcNotice
     */
    public function setInoIssId($inoIssId)
    {
        $this->inoIssId = $inoIssId;

        return $this;
    }

    /**
     * Get inoIssId
     *
     * @return int
     */
    public function getInoIssId()
    {
        return $this->inoIssId;
    }

    /**
     * Set inoCreatedDate
     *
     * @param \DateTime $inoCreatedDate
     * @return IrcNotice
     */
    public function setInoCreatedDate($inoCreatedDate)
    {
        $this->inoCreatedDate = $inoCreatedDate;

        return $this;
    }

    /**
     * Get inoCreatedDate
     *
     * @return \DateTime
     */
    public function getInoCreatedDate()
    {
        return $this->inoCreatedDate;
    }

    /**
     * Set inoMessage
     *
     * @param string $inoMessage
     * @return IrcNotice
     */
    public function setInoMessage($inoMessage)
    {
        $this->inoMessage = $inoMessage;

        return $this;
    }

    /**
     * Get inoMessage
     *
     * @return string
     */
    public function getInoMessage()
    {
        return $this->inoMessage;
    }

    /**
     * Set inoStatus
     *
     * @param string $inoStatus
     * @return IrcNotice
     */
    public function setInoStatus($inoStatus)
    {
        $this->inoStatus = $inoStatus;

        return $this;
    }

    /**
     * Get inoStatus
     *
     * @return string
     */
    public function getInoStatus()
    {
        return $this->inoStatus;
    }

    /**
     * Set inoTargetUsrId
     *
     * @param int $inoTargetUsrId
     * @return IrcNotice
     */
    public function setInoTargetUsrId($inoTargetUsrId)
    {
        $this->inoTargetUsrId = $inoTargetUsrId;

        return $this;
    }

    /**
     * Get inoTargetUsrId
     *
     * @return int
     */
    public function getInoTargetUsrId()
    {
        return $this->inoTargetUsrId;
    }

    /**
     * Set inoCategory
     *
     * @param string $inoCategory
     * @return IrcNotice
     */
    public function setInoCategory($inoCategory)
    {
        $this->inoCategory = $inoCategory;

        return $this;
    }

    /**
     * Get inoCategory
     *
     * @return string
     */
    public function getInoCategory()
    {
        return $this->inoCategory;
    }
}
