<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MailQueue
 *
 * @ORM\Table(name="mail_queue", indexes={@ORM\Index(name="maq_status", columns={"maq_status"}), @ORM\Index(name="maq_iss_id", columns={"maq_iss_id"}), @ORM\Index(name="maq_type", columns={"maq_type", "maq_type_id"})})
 * @ORM\Entity
 */
class MailQueue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="maq_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $maqId;

    /**
     * @var integer
     *
     * @ORM\Column(name="maq_iss_id", type="integer", nullable=true)
     */
    private $maqIssId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="maq_queued_date", type="datetime", nullable=false)
     */
    private $maqQueuedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_status", type="string", length=8, nullable=false)
     */
    private $maqStatus;

    /**
     * @var boolean
     *
     * @ORM\Column(name="maq_save_copy", type="boolean", nullable=false)
     */
    private $maqSaveCopy;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_sender_ip_address", type="string", length=15, nullable=false)
     */
    private $maqSenderIpAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_recipient", type="string", length=255, nullable=false)
     */
    private $maqRecipient;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_subject", type="string", length=255, nullable=false)
     */
    private $maqSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_message_id", type="string", length=255, nullable=true)
     */
    private $maqMessageId;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_headers", type="text", length=65535, nullable=false)
     */
    private $maqHeaders;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_body", type="blob", nullable=false)
     */
    private $maqBody;

    /**
     * @var string
     *
     * @ORM\Column(name="maq_type", type="string", length=30, nullable=true)
     */
    private $maqType;

    /**
     * @var integer
     *
     * @ORM\Column(name="maq_usr_id", type="integer", nullable=true)
     */
    private $maqUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="maq_type_id", type="integer", nullable=true)
     */
    private $maqTypeId;


    /**
     * Get maqId
     *
     * @return integer
     */
    public function getMaqId()
    {
        return $this->maqId;
    }

    /**
     * Set maqIssId
     *
     * @param integer $maqIssId
     * @return MailQueue
     */
    public function setMaqIssId($maqIssId)
    {
        $this->maqIssId = $maqIssId;

        return $this;
    }

    /**
     * Get maqIssId
     *
     * @return integer
     */
    public function getMaqIssId()
    {
        return $this->maqIssId;
    }

    /**
     * Set maqQueuedDate
     *
     * @param \DateTime $maqQueuedDate
     * @return MailQueue
     */
    public function setMaqQueuedDate($maqQueuedDate)
    {
        $this->maqQueuedDate = $maqQueuedDate;

        return $this;
    }

    /**
     * Get maqQueuedDate
     *
     * @return \DateTime
     */
    public function getMaqQueuedDate()
    {
        return $this->maqQueuedDate;
    }

    /**
     * Set maqStatus
     *
     * @param string $maqStatus
     * @return MailQueue
     */
    public function setMaqStatus($maqStatus)
    {
        $this->maqStatus = $maqStatus;

        return $this;
    }

    /**
     * Get maqStatus
     *
     * @return string
     */
    public function getMaqStatus()
    {
        return $this->maqStatus;
    }

    /**
     * Set maqSaveCopy
     *
     * @param boolean $maqSaveCopy
     * @return MailQueue
     */
    public function setMaqSaveCopy($maqSaveCopy)
    {
        $this->maqSaveCopy = $maqSaveCopy;

        return $this;
    }

    /**
     * Get maqSaveCopy
     *
     * @return boolean
     */
    public function getMaqSaveCopy()
    {
        return $this->maqSaveCopy;
    }

    /**
     * Set maqSenderIpAddress
     *
     * @param string $maqSenderIpAddress
     * @return MailQueue
     */
    public function setMaqSenderIpAddress($maqSenderIpAddress)
    {
        $this->maqSenderIpAddress = $maqSenderIpAddress;

        return $this;
    }

    /**
     * Get maqSenderIpAddress
     *
     * @return string
     */
    public function getMaqSenderIpAddress()
    {
        return $this->maqSenderIpAddress;
    }

    /**
     * Set maqRecipient
     *
     * @param string $maqRecipient
     * @return MailQueue
     */
    public function setMaqRecipient($maqRecipient)
    {
        $this->maqRecipient = $maqRecipient;

        return $this;
    }

    /**
     * Get maqRecipient
     *
     * @return string
     */
    public function getMaqRecipient()
    {
        return $this->maqRecipient;
    }

    /**
     * Set maqSubject
     *
     * @param string $maqSubject
     * @return MailQueue
     */
    public function setMaqSubject($maqSubject)
    {
        $this->maqSubject = $maqSubject;

        return $this;
    }

    /**
     * Get maqSubject
     *
     * @return string
     */
    public function getMaqSubject()
    {
        return $this->maqSubject;
    }

    /**
     * Set maqMessageId
     *
     * @param string $maqMessageId
     * @return MailQueue
     */
    public function setMaqMessageId($maqMessageId)
    {
        $this->maqMessageId = $maqMessageId;

        return $this;
    }

    /**
     * Get maqMessageId
     *
     * @return string
     */
    public function getMaqMessageId()
    {
        return $this->maqMessageId;
    }

    /**
     * Set maqHeaders
     *
     * @param string $maqHeaders
     * @return MailQueue
     */
    public function setMaqHeaders($maqHeaders)
    {
        $this->maqHeaders = $maqHeaders;

        return $this;
    }

    /**
     * Get maqHeaders
     *
     * @return string
     */
    public function getMaqHeaders()
    {
        return $this->maqHeaders;
    }

    /**
     * Set maqBody
     *
     * @param string $maqBody
     * @return MailQueue
     */
    public function setMaqBody($maqBody)
    {
        $this->maqBody = $maqBody;

        return $this;
    }

    /**
     * Get maqBody
     *
     * @return string
     */
    public function getMaqBody()
    {
        return $this->maqBody;
    }

    /**
     * Set maqType
     *
     * @param string $maqType
     * @return MailQueue
     */
    public function setMaqType($maqType)
    {
        $this->maqType = $maqType;

        return $this;
    }

    /**
     * Get maqType
     *
     * @return string
     */
    public function getMaqType()
    {
        return $this->maqType;
    }

    /**
     * Set maqUsrId
     *
     * @param integer $maqUsrId
     * @return MailQueue
     */
    public function setMaqUsrId($maqUsrId)
    {
        $this->maqUsrId = $maqUsrId;

        return $this;
    }

    /**
     * Get maqUsrId
     *
     * @return integer
     */
    public function getMaqUsrId()
    {
        return $this->maqUsrId;
    }

    /**
     * Set maqTypeId
     *
     * @param integer $maqTypeId
     * @return MailQueue
     */
    public function setMaqTypeId($maqTypeId)
    {
        $this->maqTypeId = $maqTypeId;

        return $this;
    }

    /**
     * Get maqTypeId
     *
     * @return integer
     */
    public function getMaqTypeId()
    {
        return $this->maqTypeId;
    }
}
