<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailDraftRecipient
 *
 * @ORM\Table(name="email_draft_recipient")
 * @ORM\Entity
 */
class EmailDraftRecipient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="edr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $edrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="edr_emd_id", type="integer", nullable=false)
     */
    private $edrEmdId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="edr_is_cc", type="boolean", nullable=false)
     */
    private $edrIsCc;

    /**
     * @var string
     *
     * @ORM\Column(name="edr_email", type="string", length=255, nullable=false)
     */
    private $edrEmail;


    /**
     * Get edrId
     *
     * @return integer
     */
    public function getEdrId()
    {
        return $this->edrId;
    }

    /**
     * Set edrEmdId
     *
     * @param integer $edrEmdId
     * @return EmailDraftRecipient
     */
    public function setEdrEmdId($edrEmdId)
    {
        $this->edrEmdId = $edrEmdId;

        return $this;
    }

    /**
     * Get edrEmdId
     *
     * @return integer
     */
    public function getEdrEmdId()
    {
        return $this->edrEmdId;
    }

    /**
     * Set edrIsCc
     *
     * @param boolean $edrIsCc
     * @return EmailDraftRecipient
     */
    public function setEdrIsCc($edrIsCc)
    {
        $this->edrIsCc = $edrIsCc;

        return $this;
    }

    /**
     * Get edrIsCc
     *
     * @return boolean
     */
    public function getEdrIsCc()
    {
        return $this->edrIsCc;
    }

    /**
     * Set edrEmail
     *
     * @param string $edrEmail
     * @return EmailDraftRecipient
     */
    public function setEdrEmail($edrEmail)
    {
        $this->edrEmail = $edrEmail;

        return $this;
    }

    /**
     * Get edrEmail
     *
     * @return string
     */
    public function getEdrEmail()
    {
        return $this->edrEmail;
    }
}
