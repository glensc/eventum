<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SupportEmail
 *
 * @ORM\Table(name="support_email", indexes={@ORM\Index(name="sup_parent_id", columns={"sup_parent_id"}), @ORM\Index(name="sup_ema_id", columns={"sup_ema_id"}), @ORM\Index(name="sup_removed", columns={"sup_removed"}), @ORM\Index(name="sup_removed_2", columns={"sup_removed", "sup_ema_id", "sup_iss_id"}), @ORM\Index(name="sup_removed_3", columns={"sup_removed", "sup_ema_id", "sup_date"}), @ORM\Index(name="sup_usr_id", columns={"sup_usr_id"})})
 * @ORM\Entity
 */
class SupportEmail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sup_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $supId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sup_ema_id", type="integer", nullable=false)
     */
    private $supEmaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sup_parent_id", type="integer", nullable=false)
     */
    private $supParentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sup_iss_id", type="integer", nullable=true)
     */
    private $supIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sup_usr_id", type="integer", nullable=true)
     */
    private $supUsrId;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_customer_id", type="string", length=128, nullable=true)
     */
    private $supCustomerId;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_message_id", type="string", length=255, nullable=false)
     */
    private $supMessageId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sup_date", type="datetime", nullable=false)
     */
    private $supDate;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_from", type="string", length=4096, nullable=false)
     */
    private $supFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_to", type="string", length=4096, nullable=false)
     */
    private $supTo;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_cc", type="string", length=4096, nullable=false)
     */
    private $supCc;

    /**
     * @var string
     *
     * @ORM\Column(name="sup_subject", type="string", length=4096, nullable=false)
     */
    private $supSubject;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sup_has_attachment", type="boolean", nullable=false)
     */
    private $supHasAttachment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sup_removed", type="boolean", nullable=false)
     */
    private $supRemoved;


    /**
     * Get supId
     *
     * @return integer
     */
    public function getSupId()
    {
        return $this->supId;
    }

    /**
     * Set supEmaId
     *
     * @param integer $supEmaId
     * @return SupportEmail
     */
    public function setSupEmaId($supEmaId)
    {
        $this->supEmaId = $supEmaId;

        return $this;
    }

    /**
     * Get supEmaId
     *
     * @return integer
     */
    public function getSupEmaId()
    {
        return $this->supEmaId;
    }

    /**
     * Set supParentId
     *
     * @param integer $supParentId
     * @return SupportEmail
     */
    public function setSupParentId($supParentId)
    {
        $this->supParentId = $supParentId;

        return $this;
    }

    /**
     * Get supParentId
     *
     * @return integer
     */
    public function getSupParentId()
    {
        return $this->supParentId;
    }

    /**
     * Set supIssId
     *
     * @param integer $supIssId
     * @return SupportEmail
     */
    public function setSupIssId($supIssId)
    {
        $this->supIssId = $supIssId;

        return $this;
    }

    /**
     * Get supIssId
     *
     * @return integer
     */
    public function getSupIssId()
    {
        return $this->supIssId;
    }

    /**
     * Set supUsrId
     *
     * @param integer $supUsrId
     * @return SupportEmail
     */
    public function setSupUsrId($supUsrId)
    {
        $this->supUsrId = $supUsrId;

        return $this;
    }

    /**
     * Get supUsrId
     *
     * @return integer
     */
    public function getSupUsrId()
    {
        return $this->supUsrId;
    }

    /**
     * Set supCustomerId
     *
     * @param string $supCustomerId
     * @return SupportEmail
     */
    public function setSupCustomerId($supCustomerId)
    {
        $this->supCustomerId = $supCustomerId;

        return $this;
    }

    /**
     * Get supCustomerId
     *
     * @return string
     */
    public function getSupCustomerId()
    {
        return $this->supCustomerId;
    }

    /**
     * Set supMessageId
     *
     * @param string $supMessageId
     * @return SupportEmail
     */
    public function setSupMessageId($supMessageId)
    {
        $this->supMessageId = $supMessageId;

        return $this;
    }

    /**
     * Get supMessageId
     *
     * @return string
     */
    public function getSupMessageId()
    {
        return $this->supMessageId;
    }

    /**
     * Set supDate
     *
     * @param \DateTime $supDate
     * @return SupportEmail
     */
    public function setSupDate($supDate)
    {
        $this->supDate = $supDate;

        return $this;
    }

    /**
     * Get supDate
     *
     * @return \DateTime
     */
    public function getSupDate()
    {
        return $this->supDate;
    }

    /**
     * Set supFrom
     *
     * @param string $supFrom
     * @return SupportEmail
     */
    public function setSupFrom($supFrom)
    {
        $this->supFrom = $supFrom;

        return $this;
    }

    /**
     * Get supFrom
     *
     * @return string
     */
    public function getSupFrom()
    {
        return $this->supFrom;
    }

    /**
     * Set supTo
     *
     * @param string $supTo
     * @return SupportEmail
     */
    public function setSupTo($supTo)
    {
        $this->supTo = $supTo;

        return $this;
    }

    /**
     * Get supTo
     *
     * @return string
     */
    public function getSupTo()
    {
        return $this->supTo;
    }

    /**
     * Set supCc
     *
     * @param string $supCc
     * @return SupportEmail
     */
    public function setSupCc($supCc)
    {
        $this->supCc = $supCc;

        return $this;
    }

    /**
     * Get supCc
     *
     * @return string
     */
    public function getSupCc()
    {
        return $this->supCc;
    }

    /**
     * Set supSubject
     *
     * @param string $supSubject
     * @return SupportEmail
     */
    public function setSupSubject($supSubject)
    {
        $this->supSubject = $supSubject;

        return $this;
    }

    /**
     * Get supSubject
     *
     * @return string
     */
    public function getSupSubject()
    {
        return $this->supSubject;
    }

    /**
     * Set supHasAttachment
     *
     * @param boolean $supHasAttachment
     * @return SupportEmail
     */
    public function setSupHasAttachment($supHasAttachment)
    {
        $this->supHasAttachment = $supHasAttachment;

        return $this;
    }

    /**
     * Get supHasAttachment
     *
     * @return boolean
     */
    public function getSupHasAttachment()
    {
        return $this->supHasAttachment;
    }

    /**
     * Set supRemoved
     *
     * @param boolean $supRemoved
     * @return SupportEmail
     */
    public function setSupRemoved($supRemoved)
    {
        $this->supRemoved = $supRemoved;

        return $this;
    }

    /**
     * Get supRemoved
     *
     * @return boolean
     */
    public function getSupRemoved()
    {
        return $this->supRemoved;
    }
}
