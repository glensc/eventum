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
 * IssueAttachment
 *
 * @ORM\Table(name="issue_attachment", indexes={@ORM\Index(name="iat_iss_id", columns={"iat_iss_id", "iat_usr_id"})})
 * @ORM\Entity
 */
class IssueAttachment
{
    /**
     * @var int
     *
     * @ORM\Column(name="iat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iatId;

    /**
     * @var int
     *
     * @ORM\Column(name="iat_iss_id", type="integer", nullable=false)
     */
    private $iatIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="iat_usr_id", type="integer", nullable=false)
     */
    private $iatUsrId;

    /**
     * @var int
     *
     * @ORM\Column(name="iat_min_role", type="integer", nullable=false)
     */
    private $iatMinRole;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iat_created_date", type="datetime", nullable=false)
     */
    private $iatCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="iat_description", type="text", length=65535, nullable=true)
     */
    private $iatDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="iat_unknown_user", type="string", length=255, nullable=true)
     */
    private $iatUnknownUser;

    /**
     * @var int
     *
     * @ORM\Column(name="iat_not_id", type="integer", nullable=true)
     */
    private $iatNotId;

    /**
     * Get iatId
     *
     * @return int
     */
    public function getIatId()
    {
        return $this->iatId;
    }

    /**
     * Set iatIssId
     *
     * @param int $iatIssId
     * @return IssueAttachment
     */
    public function setIatIssId($iatIssId)
    {
        $this->iatIssId = $iatIssId;

        return $this;
    }

    /**
     * Get iatIssId
     *
     * @return int
     */
    public function getIatIssId()
    {
        return $this->iatIssId;
    }

    /**
     * Set iatUsrId
     *
     * @param int $iatUsrId
     * @return IssueAttachment
     */
    public function setIatUsrId($iatUsrId)
    {
        $this->iatUsrId = $iatUsrId;

        return $this;
    }

    /**
     * Get iatUsrId
     *
     * @return int
     */
    public function getIatUsrId()
    {
        return $this->iatUsrId;
    }

    /**
     * Set iatMinRole
     *
     * @param int $iatMinRole
     * @return IssueAttachment
     */
    public function setIatMinRole($iatMinRole)
    {
        $this->iatMinRole = $iatMinRole;

        return $this;
    }

    /**
     * Get iatMinRole
     *
     * @return int
     */
    public function getIatMinRole()
    {
        return $this->iatMinRole;
    }

    /**
     * Set iatCreatedDate
     *
     * @param \DateTime $iatCreatedDate
     * @return IssueAttachment
     */
    public function setIatCreatedDate($iatCreatedDate)
    {
        $this->iatCreatedDate = $iatCreatedDate;

        return $this;
    }

    /**
     * Get iatCreatedDate
     *
     * @return \DateTime
     */
    public function getIatCreatedDate()
    {
        return $this->iatCreatedDate;
    }

    /**
     * Set iatDescription
     *
     * @param string $iatDescription
     * @return IssueAttachment
     */
    public function setIatDescription($iatDescription)
    {
        $this->iatDescription = $iatDescription;

        return $this;
    }

    /**
     * Get iatDescription
     *
     * @return string
     */
    public function getIatDescription()
    {
        return $this->iatDescription;
    }

    /**
     * Set iatUnknownUser
     *
     * @param string $iatUnknownUser
     * @return IssueAttachment
     */
    public function setIatUnknownUser($iatUnknownUser)
    {
        $this->iatUnknownUser = $iatUnknownUser;

        return $this;
    }

    /**
     * Get iatUnknownUser
     *
     * @return string
     */
    public function getIatUnknownUser()
    {
        return $this->iatUnknownUser;
    }

    /**
     * Set iatNotId
     *
     * @param int $iatNotId
     * @return IssueAttachment
     */
    public function setIatNotId($iatNotId)
    {
        $this->iatNotId = $iatNotId;

        return $this;
    }

    /**
     * Get iatNotId
     *
     * @return int
     */
    public function getIatNotId()
    {
        return $this->iatNotId;
    }
}
