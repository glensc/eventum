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
 * UserPreference
 *
 * @ORM\Table(name="user_preference")
 * @ORM\Entity
 */
class UserPreference
{
    /**
     * @var int
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
     * @var bool
     *
     * @ORM\Column(name="upr_week_firstday", type="boolean", nullable=false)
     */
    private $uprWeekFirstday;

    /**
     * @var int
     *
     * @ORM\Column(name="upr_list_refresh_rate", type="integer", nullable=true)
     */
    private $uprListRefreshRate;

    /**
     * @var int
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
     * @var bool
     *
     * @ORM\Column(name="upr_auto_append_email_sig", type="boolean", nullable=true)
     */
    private $uprAutoAppendEmailSig;

    /**
     * @var bool
     *
     * @ORM\Column(name="upr_auto_append_note_sig", type="boolean", nullable=true)
     */
    private $uprAutoAppendNoteSig;

    /**
     * @var bool
     *
     * @ORM\Column(name="upr_auto_close_popup_window", type="boolean", nullable=true)
     */
    private $uprAutoClosePopupWindow;

    /**
     * @var bool
     *
     * @ORM\Column(name="upr_relative_date", type="boolean", nullable=true)
     */
    private $uprRelativeDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="upr_collapsed_emails", type="boolean", nullable=true)
     */
    private $uprCollapsedEmails;

    /**
     * @var bool
     *
     * @ORM\Column(name="upr_markdown", type="boolean", nullable=true)
     */
    private $uprMarkdown;

    /**
     * @var bool
     *
     * @ORM\Column(name="upr_issue_navigation", type="boolean", nullable=false)
     */
    private $uprIssueNavigation;

    /**
     * Get uprUsrId
     *
     * @return int
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
     * @param bool $uprWeekFirstday
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
     * @return bool
     */
    public function getUprWeekFirstday()
    {
        return $this->uprWeekFirstday;
    }

    /**
     * Set uprListRefreshRate
     *
     * @param int $uprListRefreshRate
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
     * @return int
     */
    public function getUprListRefreshRate()
    {
        return $this->uprListRefreshRate;
    }

    /**
     * Set uprEmailRefreshRate
     *
     * @param int $uprEmailRefreshRate
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
     * @return int
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
     * @param bool $uprAutoAppendEmailSig
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
     * @return bool
     */
    public function getUprAutoAppendEmailSig()
    {
        return $this->uprAutoAppendEmailSig;
    }

    /**
     * Set uprAutoAppendNoteSig
     *
     * @param bool $uprAutoAppendNoteSig
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
     * @return bool
     */
    public function getUprAutoAppendNoteSig()
    {
        return $this->uprAutoAppendNoteSig;
    }

    /**
     * Set uprAutoClosePopupWindow
     *
     * @param bool $uprAutoClosePopupWindow
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
     * @return bool
     */
    public function getUprAutoClosePopupWindow()
    {
        return $this->uprAutoClosePopupWindow;
    }

    /**
     * Set uprRelativeDate
     *
     * @param bool $uprRelativeDate
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
     * @return bool
     */
    public function getUprRelativeDate()
    {
        return $this->uprRelativeDate;
    }

    /**
     * Set uprCollapsedEmails
     *
     * @param bool $uprCollapsedEmails
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
     * @return bool
     */
    public function getUprCollapsedEmails()
    {
        return $this->uprCollapsedEmails;
    }

    /**
     * Set uprMarkdown
     *
     * @param bool $uprMarkdown
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
     * @return bool
     */
    public function getUprMarkdown()
    {
        return $this->uprMarkdown;
    }

    /**
     * Set uprIssueNavigation
     *
     * @param bool $uprIssueNavigation
     * @return UserPreference
     */
    public function setUprIssueNavigation($uprIssueNavigation)
    {
        $this->uprIssueNavigation = $uprIssueNavigation;

        return $this;
    }

    /**
     * Get uprIssueNavigation
     *
     * @return bool
     */
    public function getUprIssueNavigation()
    {
        return $this->uprIssueNavigation;
    }
}
