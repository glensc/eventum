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
 * EmailDraft
 *
 * @ORM\Table(name="email_draft")
 * @ORM\Entity
 */
class EmailDraft
{
    /**
     * @var int
     *
     * @ORM\Column(name="emd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emdId;

    /**
     * @var int
     *
     * @ORM\Column(name="emd_usr_id", type="integer", nullable=false)
     */
    private $emdUsrId;

    /**
     * @var int
     *
     * @ORM\Column(name="emd_iss_id", type="integer", nullable=false)
     */
    private $emdIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="emd_sup_id", type="integer", nullable=true)
     */
    private $emdSupId;

    /**
     * @var string
     *
     * @ORM\Column(name="emd_status", type="string", nullable=false)
     */
    private $emdStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="emd_updated_date", type="datetime", nullable=false)
     */
    private $emdUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="emd_subject", type="string", length=255, nullable=false)
     */
    private $emdSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="emd_body", type="text", nullable=false)
     */
    private $emdBody;

    /**
     * @var string
     *
     * @ORM\Column(name="emd_unknown_user", type="string", length=255, nullable=true)
     */
    private $emdUnknownUser;

    /**
     * Get emdId
     *
     * @return int
     */
    public function getEmdId()
    {
        return $this->emdId;
    }

    /**
     * Set emdUsrId
     *
     * @param int $emdUsrId
     * @return EmailDraft
     */
    public function setEmdUsrId($emdUsrId)
    {
        $this->emdUsrId = $emdUsrId;

        return $this;
    }

    /**
     * Get emdUsrId
     *
     * @return int
     */
    public function getEmdUsrId()
    {
        return $this->emdUsrId;
    }

    /**
     * Set emdIssId
     *
     * @param int $emdIssId
     * @return EmailDraft
     */
    public function setEmdIssId($emdIssId)
    {
        $this->emdIssId = $emdIssId;

        return $this;
    }

    /**
     * Get emdIssId
     *
     * @return int
     */
    public function getEmdIssId()
    {
        return $this->emdIssId;
    }

    /**
     * Set emdSupId
     *
     * @param int $emdSupId
     * @return EmailDraft
     */
    public function setEmdSupId($emdSupId)
    {
        $this->emdSupId = $emdSupId;

        return $this;
    }

    /**
     * Get emdSupId
     *
     * @return int
     */
    public function getEmdSupId()
    {
        return $this->emdSupId;
    }

    /**
     * Set emdStatus
     *
     * @param string $emdStatus
     * @return EmailDraft
     */
    public function setEmdStatus($emdStatus)
    {
        $this->emdStatus = $emdStatus;

        return $this;
    }

    /**
     * Get emdStatus
     *
     * @return string
     */
    public function getEmdStatus()
    {
        return $this->emdStatus;
    }

    /**
     * Set emdUpdatedDate
     *
     * @param \DateTime $emdUpdatedDate
     * @return EmailDraft
     */
    public function setEmdUpdatedDate($emdUpdatedDate)
    {
        $this->emdUpdatedDate = $emdUpdatedDate;

        return $this;
    }

    /**
     * Get emdUpdatedDate
     *
     * @return \DateTime
     */
    public function getEmdUpdatedDate()
    {
        return $this->emdUpdatedDate;
    }

    /**
     * Set emdSubject
     *
     * @param string $emdSubject
     * @return EmailDraft
     */
    public function setEmdSubject($emdSubject)
    {
        $this->emdSubject = $emdSubject;

        return $this;
    }

    /**
     * Get emdSubject
     *
     * @return string
     */
    public function getEmdSubject()
    {
        return $this->emdSubject;
    }

    /**
     * Set emdBody
     *
     * @param string $emdBody
     * @return EmailDraft
     */
    public function setEmdBody($emdBody)
    {
        $this->emdBody = $emdBody;

        return $this;
    }

    /**
     * Get emdBody
     *
     * @return string
     */
    public function getEmdBody()
    {
        return $this->emdBody;
    }

    /**
     * Set emdUnknownUser
     *
     * @param string $emdUnknownUser
     * @return EmailDraft
     */
    public function setEmdUnknownUser($emdUnknownUser)
    {
        $this->emdUnknownUser = $emdUnknownUser;

        return $this;
    }

    /**
     * Get emdUnknownUser
     *
     * @return string
     */
    public function getEmdUnknownUser()
    {
        return $this->emdUnknownUser;
    }
}
