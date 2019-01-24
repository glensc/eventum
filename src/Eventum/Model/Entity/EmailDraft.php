<?php

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
     * @var integer
     *
     * @ORM\Column(name="emd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emdId;

    /**
     * @var integer
     *
     * @ORM\Column(name="emd_usr_id", type="integer", nullable=false)
     */
    private $emdUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="emd_iss_id", type="integer", nullable=false)
     */
    private $emdIssId;

    /**
     * @var integer
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
     * @return integer
     */
    public function getEmdId()
    {
        return $this->emdId;
    }

    /**
     * Set emdUsrId
     *
     * @param integer $emdUsrId
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
     * @return integer
     */
    public function getEmdUsrId()
    {
        return $this->emdUsrId;
    }

    /**
     * Set emdIssId
     *
     * @param integer $emdIssId
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
     * @return integer
     */
    public function getEmdIssId()
    {
        return $this->emdIssId;
    }

    /**
     * Set emdSupId
     *
     * @param integer $emdSupId
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
     * @return integer
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
