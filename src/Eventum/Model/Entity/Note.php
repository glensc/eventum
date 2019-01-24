<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="not_bug_id", columns={"not_iss_id", "not_usr_id"}), @ORM\Index(name="not_message_id", columns={"not_message_id"}), @ORM\Index(name="not_parent_id", columns={"not_parent_id"}), @ORM\Index(name="ft_note", columns={"not_title", "not_note"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="not_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $notId;

    /**
     * @var integer
     *
     * @ORM\Column(name="not_iss_id", type="integer", nullable=false)
     */
    private $notIssId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="not_created_date", type="datetime", nullable=false)
     */
    private $notCreatedDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="not_usr_id", type="integer", nullable=false)
     */
    private $notUsrId;

    /**
     * @var string
     *
     * @ORM\Column(name="not_title", type="string", length=255, nullable=false)
     */
    private $notTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="not_note", type="text", nullable=false)
     */
    private $notNote;

    /**
     * @var string
     *
     * @ORM\Column(name="not_full_message", type="text", nullable=true)
     */
    private $notFullMessage;

    /**
     * @var integer
     *
     * @ORM\Column(name="not_parent_id", type="integer", nullable=true)
     */
    private $notParentId;

    /**
     * @var string
     *
     * @ORM\Column(name="not_unknown_user", type="string", length=255, nullable=true)
     */
    private $notUnknownUser;

    /**
     * @var boolean
     *
     * @ORM\Column(name="not_has_attachment", type="boolean", nullable=false)
     */
    private $notHasAttachment;

    /**
     * @var string
     *
     * @ORM\Column(name="not_message_id", type="string", length=255, nullable=true)
     */
    private $notMessageId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="not_removed", type="boolean", nullable=false)
     */
    private $notRemoved;

    /**
     * @var boolean
     *
     * @ORM\Column(name="not_is_blocked", type="boolean", nullable=false)
     */
    private $notIsBlocked;


    /**
     * Get notId
     *
     * @return integer
     */
    public function getNotId()
    {
        return $this->notId;
    }

    /**
     * Set notIssId
     *
     * @param integer $notIssId
     * @return Note
     */
    public function setNotIssId($notIssId)
    {
        $this->notIssId = $notIssId;

        return $this;
    }

    /**
     * Get notIssId
     *
     * @return integer
     */
    public function getNotIssId()
    {
        return $this->notIssId;
    }

    /**
     * Set notCreatedDate
     *
     * @param \DateTime $notCreatedDate
     * @return Note
     */
    public function setNotCreatedDate($notCreatedDate)
    {
        $this->notCreatedDate = $notCreatedDate;

        return $this;
    }

    /**
     * Get notCreatedDate
     *
     * @return \DateTime
     */
    public function getNotCreatedDate()
    {
        return $this->notCreatedDate;
    }

    /**
     * Set notUsrId
     *
     * @param integer $notUsrId
     * @return Note
     */
    public function setNotUsrId($notUsrId)
    {
        $this->notUsrId = $notUsrId;

        return $this;
    }

    /**
     * Get notUsrId
     *
     * @return integer
     */
    public function getNotUsrId()
    {
        return $this->notUsrId;
    }

    /**
     * Set notTitle
     *
     * @param string $notTitle
     * @return Note
     */
    public function setNotTitle($notTitle)
    {
        $this->notTitle = $notTitle;

        return $this;
    }

    /**
     * Get notTitle
     *
     * @return string
     */
    public function getNotTitle()
    {
        return $this->notTitle;
    }

    /**
     * Set notNote
     *
     * @param string $notNote
     * @return Note
     */
    public function setNotNote($notNote)
    {
        $this->notNote = $notNote;

        return $this;
    }

    /**
     * Get notNote
     *
     * @return string
     */
    public function getNotNote()
    {
        return $this->notNote;
    }

    /**
     * Set notFullMessage
     *
     * @param string $notFullMessage
     * @return Note
     */
    public function setNotFullMessage($notFullMessage)
    {
        $this->notFullMessage = $notFullMessage;

        return $this;
    }

    /**
     * Get notFullMessage
     *
     * @return string
     */
    public function getNotFullMessage()
    {
        return $this->notFullMessage;
    }

    /**
     * Set notParentId
     *
     * @param integer $notParentId
     * @return Note
     */
    public function setNotParentId($notParentId)
    {
        $this->notParentId = $notParentId;

        return $this;
    }

    /**
     * Get notParentId
     *
     * @return integer
     */
    public function getNotParentId()
    {
        return $this->notParentId;
    }

    /**
     * Set notUnknownUser
     *
     * @param string $notUnknownUser
     * @return Note
     */
    public function setNotUnknownUser($notUnknownUser)
    {
        $this->notUnknownUser = $notUnknownUser;

        return $this;
    }

    /**
     * Get notUnknownUser
     *
     * @return string
     */
    public function getNotUnknownUser()
    {
        return $this->notUnknownUser;
    }

    /**
     * Set notHasAttachment
     *
     * @param boolean $notHasAttachment
     * @return Note
     */
    public function setNotHasAttachment($notHasAttachment)
    {
        $this->notHasAttachment = $notHasAttachment;

        return $this;
    }

    /**
     * Get notHasAttachment
     *
     * @return boolean
     */
    public function getNotHasAttachment()
    {
        return $this->notHasAttachment;
    }

    /**
     * Set notMessageId
     *
     * @param string $notMessageId
     * @return Note
     */
    public function setNotMessageId($notMessageId)
    {
        $this->notMessageId = $notMessageId;

        return $this;
    }

    /**
     * Get notMessageId
     *
     * @return string
     */
    public function getNotMessageId()
    {
        return $this->notMessageId;
    }

    /**
     * Set notRemoved
     *
     * @param boolean $notRemoved
     * @return Note
     */
    public function setNotRemoved($notRemoved)
    {
        $this->notRemoved = $notRemoved;

        return $this;
    }

    /**
     * Get notRemoved
     *
     * @return boolean
     */
    public function getNotRemoved()
    {
        return $this->notRemoved;
    }

    /**
     * Set notIsBlocked
     *
     * @param boolean $notIsBlocked
     * @return Note
     */
    public function setNotIsBlocked($notIsBlocked)
    {
        $this->notIsBlocked = $notIsBlocked;

        return $this;
    }

    /**
     * Get notIsBlocked
     *
     * @return boolean
     */
    public function getNotIsBlocked()
    {
        return $this->notIsBlocked;
    }
}
