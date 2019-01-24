<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPreference
 *
 * @ORM\Table(name="user_preference")
 * @ORM\Entity
 */
class UserPreference
{
    /**
     * @var integer
     *
     * @ORM\Column(name="upr_usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uprUsrId;

    /**
     * @var string
     *
     * @ORM\Column(name="upr_timezone", type="string", length=100, nullable=false)
     */
    private $uprTimezone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upr_week_firstday", type="boolean", nullable=false)
     */
    private $uprWeekFirstday;

    /**
     * @var integer
     *
     * @ORM\Column(name="upr_list_refresh_rate", type="integer", nullable=true)
     */
    private $uprListRefreshRate;

    /**
     * @var integer
     *
     * @ORM\Column(name="upr_email_refresh_rate", type="integer", nullable=true)
     */
    private $uprEmailRefreshRate;

    /**
     * @var string
     *
     * @ORM\Column(name="upr_email_signature", type="text", nullable=true)
     */
    private $uprEmailSignature;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upr_auto_append_email_sig", type="boolean", nullable=true)
     */
    private $uprAutoAppendEmailSig;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upr_auto_append_note_sig", type="boolean", nullable=true)
     */
    private $uprAutoAppendNoteSig;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upr_auto_close_popup_window", type="boolean", nullable=true)
     */
    private $uprAutoClosePopupWindow;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upr_relative_date", type="boolean", nullable=true)
     */
    private $uprRelativeDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upr_collapsed_emails", type="boolean", nullable=true)
     */
    private $uprCollapsedEmails;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upr_markdown", type="boolean", nullable=true)
     */
    private $uprMarkdown;


    /**
     * Get uprUsrId
     *
     * @return integer
     */
    public function getUprUsrId()
    {
        return $this->uprUsrId;
    }

    /**
     * Set uprTimezone
     *
     * @param string $uprTimezone
     * @return UserPreference
     */
    public function setUprTimezone($uprTimezone)
    {
        $this->uprTimezone = $uprTimezone;

        return $this;
    }

    /**
     * Get uprTimezone
     *
     * @return string
     */
    public function getUprTimezone()
    {
        return $this->uprTimezone;
    }

    /**
     * Set uprWeekFirstday
     *
     * @param boolean $uprWeekFirstday
     * @return UserPreference
     */
    public function setUprWeekFirstday($uprWeekFirstday)
    {
        $this->uprWeekFirstday = $uprWeekFirstday;

        return $this;
    }

    /**
     * Get uprWeekFirstday
     *
     * @return boolean
     */
    public function getUprWeekFirstday()
    {
        return $this->uprWeekFirstday;
    }

    /**
     * Set uprListRefreshRate
     *
     * @param integer $uprListRefreshRate
     * @return UserPreference
     */
    public function setUprListRefreshRate($uprListRefreshRate)
    {
        $this->uprListRefreshRate = $uprListRefreshRate;

        return $this;
    }

    /**
     * Get uprListRefreshRate
     *
     * @return integer
     */
    public function getUprListRefreshRate()
    {
        return $this->uprListRefreshRate;
    }

    /**
     * Set uprEmailRefreshRate
     *
     * @param integer $uprEmailRefreshRate
     * @return UserPreference
     */
    public function setUprEmailRefreshRate($uprEmailRefreshRate)
    {
        $this->uprEmailRefreshRate = $uprEmailRefreshRate;

        return $this;
    }

    /**
     * Get uprEmailRefreshRate
     *
     * @return integer
     */
    public function getUprEmailRefreshRate()
    {
        return $this->uprEmailRefreshRate;
    }

    /**
     * Set uprEmailSignature
     *
     * @param string $uprEmailSignature
     * @return UserPreference
     */
    public function setUprEmailSignature($uprEmailSignature)
    {
        $this->uprEmailSignature = $uprEmailSignature;

        return $this;
    }

    /**
     * Get uprEmailSignature
     *
     * @return string
     */
    public function getUprEmailSignature()
    {
        return $this->uprEmailSignature;
    }

    /**
     * Set uprAutoAppendEmailSig
     *
     * @param boolean $uprAutoAppendEmailSig
     * @return UserPreference
     */
    public function setUprAutoAppendEmailSig($uprAutoAppendEmailSig)
    {
        $this->uprAutoAppendEmailSig = $uprAutoAppendEmailSig;

        return $this;
    }

    /**
     * Get uprAutoAppendEmailSig
     *
     * @return boolean
     */
    public function getUprAutoAppendEmailSig()
    {
        return $this->uprAutoAppendEmailSig;
    }

    /**
     * Set uprAutoAppendNoteSig
     *
     * @param boolean $uprAutoAppendNoteSig
     * @return UserPreference
     */
    public function setUprAutoAppendNoteSig($uprAutoAppendNoteSig)
    {
        $this->uprAutoAppendNoteSig = $uprAutoAppendNoteSig;

        return $this;
    }

    /**
     * Get uprAutoAppendNoteSig
     *
     * @return boolean
     */
    public function getUprAutoAppendNoteSig()
    {
        return $this->uprAutoAppendNoteSig;
    }

    /**
     * Set uprAutoClosePopupWindow
     *
     * @param boolean $uprAutoClosePopupWindow
     * @return UserPreference
     */
    public function setUprAutoClosePopupWindow($uprAutoClosePopupWindow)
    {
        $this->uprAutoClosePopupWindow = $uprAutoClosePopupWindow;

        return $this;
    }

    /**
     * Get uprAutoClosePopupWindow
     *
     * @return boolean
     */
    public function getUprAutoClosePopupWindow()
    {
        return $this->uprAutoClosePopupWindow;
    }

    /**
     * Set uprRelativeDate
     *
     * @param boolean $uprRelativeDate
     * @return UserPreference
     */
    public function setUprRelativeDate($uprRelativeDate)
    {
        $this->uprRelativeDate = $uprRelativeDate;

        return $this;
    }

    /**
     * Get uprRelativeDate
     *
     * @return boolean
     */
    public function getUprRelativeDate()
    {
        return $this->uprRelativeDate;
    }

    /**
     * Set uprCollapsedEmails
     *
     * @param boolean $uprCollapsedEmails
     * @return UserPreference
     */
    public function setUprCollapsedEmails($uprCollapsedEmails)
    {
        $this->uprCollapsedEmails = $uprCollapsedEmails;

        return $this;
    }

    /**
     * Get uprCollapsedEmails
     *
     * @return boolean
     */
    public function getUprCollapsedEmails()
    {
        return $this->uprCollapsedEmails;
    }

    /**
     * Set uprMarkdown
     *
     * @param boolean $uprMarkdown
     * @return UserPreference
     */
    public function setUprMarkdown($uprMarkdown)
    {
        $this->uprMarkdown = $uprMarkdown;

        return $this;
    }

    /**
     * Get uprMarkdown
     *
     * @return boolean
     */
    public function getUprMarkdown()
    {
        return $this->uprMarkdown;
    }
}
