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
 * EmailAccount
 *
 * @ORM\Table(name="email_account", uniqueConstraints={@ORM\UniqueConstraint(name="ema_username", columns={"ema_username", "ema_hostname", "ema_folder"})}, indexes={@ORM\Index(name="ema_prj_id", columns={"ema_prj_id"})})
 * @ORM\Entity
 */
class EmailAccount
{
    /**
     * @var int
     *
     * @ORM\Column(name="ema_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emaId;

    /**
     * @var int
     *
     * @ORM\Column(name="ema_prj_id", type="integer", nullable=false)
     */
    private $emaPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_type", type="string", length=32, nullable=false)
     */
    private $emaType;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_folder", type="string", length=255, nullable=true)
     */
    private $emaFolder;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_hostname", type="string", length=255, nullable=false)
     */
    private $emaHostname;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_port", type="string", length=5, nullable=false)
     */
    private $emaPort;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_username", type="string", length=64, nullable=false)
     */
    private $emaUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_password", type="string", length=255, nullable=false)
     */
    private $emaPassword;

    /**
     * @var int
     *
     * @ORM\Column(name="ema_get_only_new", type="integer", nullable=false)
     */
    private $emaGetOnlyNew;

    /**
     * @var int
     *
     * @ORM\Column(name="ema_leave_copy", type="integer", nullable=false)
     */
    private $emaLeaveCopy;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_issue_auto_creation", type="string", length=8, nullable=false)
     */
    private $emaIssueAutoCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="ema_issue_auto_creation_options", type="text", length=65535, nullable=true)
     */
    private $emaIssueAutoCreationOptions;

    /**
     * @var bool
     *
     * @ORM\Column(name="ema_use_routing", type="boolean", nullable=true)
     */
    private $emaUseRouting;

    /**
     * Get emaId
     *
     * @return int
     */
    public function getEmaId()
    {
        return $this->emaId;
    }

    /**
     * Set emaPrjId
     *
     * @param int $emaPrjId
     * @return EmailAccount
     */
    public function setEmaPrjId($emaPrjId)
    {
        $this->emaPrjId = $emaPrjId;

        return $this;
    }

    /**
     * Get emaPrjId
     *
     * @return int
     */
    public function getEmaPrjId()
    {
        return $this->emaPrjId;
    }

    /**
     * Set emaType
     *
     * @param string $emaType
     * @return EmailAccount
     */
    public function setEmaType($emaType)
    {
        $this->emaType = $emaType;

        return $this;
    }

    /**
     * Get emaType
     *
     * @return string
     */
    public function getEmaType()
    {
        return $this->emaType;
    }

    /**
     * Set emaFolder
     *
     * @param string $emaFolder
     * @return EmailAccount
     */
    public function setEmaFolder($emaFolder)
    {
        $this->emaFolder = $emaFolder;

        return $this;
    }

    /**
     * Get emaFolder
     *
     * @return string
     */
    public function getEmaFolder()
    {
        return $this->emaFolder;
    }

    /**
     * Set emaHostname
     *
     * @param string $emaHostname
     * @return EmailAccount
     */
    public function setEmaHostname($emaHostname)
    {
        $this->emaHostname = $emaHostname;

        return $this;
    }

    /**
     * Get emaHostname
     *
     * @return string
     */
    public function getEmaHostname()
    {
        return $this->emaHostname;
    }

    /**
     * Set emaPort
     *
     * @param string $emaPort
     * @return EmailAccount
     */
    public function setEmaPort($emaPort)
    {
        $this->emaPort = $emaPort;

        return $this;
    }

    /**
     * Get emaPort
     *
     * @return string
     */
    public function getEmaPort()
    {
        return $this->emaPort;
    }

    /**
     * Set emaUsername
     *
     * @param string $emaUsername
     * @return EmailAccount
     */
    public function setEmaUsername($emaUsername)
    {
        $this->emaUsername = $emaUsername;

        return $this;
    }

    /**
     * Get emaUsername
     *
     * @return string
     */
    public function getEmaUsername()
    {
        return $this->emaUsername;
    }

    /**
     * Set emaPassword
     *
     * @param string $emaPassword
     * @return EmailAccount
     */
    public function setEmaPassword($emaPassword)
    {
        $this->emaPassword = $emaPassword;

        return $this;
    }

    /**
     * Get emaPassword
     *
     * @return string
     */
    public function getEmaPassword()
    {
        return $this->emaPassword;
    }

    /**
     * Set emaGetOnlyNew
     *
     * @param int $emaGetOnlyNew
     * @return EmailAccount
     */
    public function setEmaGetOnlyNew($emaGetOnlyNew)
    {
        $this->emaGetOnlyNew = $emaGetOnlyNew;

        return $this;
    }

    /**
     * Get emaGetOnlyNew
     *
     * @return int
     */
    public function getEmaGetOnlyNew()
    {
        return $this->emaGetOnlyNew;
    }

    /**
     * Set emaLeaveCopy
     *
     * @param int $emaLeaveCopy
     * @return EmailAccount
     */
    public function setEmaLeaveCopy($emaLeaveCopy)
    {
        $this->emaLeaveCopy = $emaLeaveCopy;

        return $this;
    }

    /**
     * Get emaLeaveCopy
     *
     * @return int
     */
    public function getEmaLeaveCopy()
    {
        return $this->emaLeaveCopy;
    }

    /**
     * Set emaIssueAutoCreation
     *
     * @param string $emaIssueAutoCreation
     * @return EmailAccount
     */
    public function setEmaIssueAutoCreation($emaIssueAutoCreation)
    {
        $this->emaIssueAutoCreation = $emaIssueAutoCreation;

        return $this;
    }

    /**
     * Get emaIssueAutoCreation
     *
     * @return string
     */
    public function getEmaIssueAutoCreation()
    {
        return $this->emaIssueAutoCreation;
    }

    /**
     * Set emaIssueAutoCreationOptions
     *
     * @param string $emaIssueAutoCreationOptions
     * @return EmailAccount
     */
    public function setEmaIssueAutoCreationOptions($emaIssueAutoCreationOptions)
    {
        $this->emaIssueAutoCreationOptions = $emaIssueAutoCreationOptions;

        return $this;
    }

    /**
     * Get emaIssueAutoCreationOptions
     *
     * @return string
     */
    public function getEmaIssueAutoCreationOptions()
    {
        return $this->emaIssueAutoCreationOptions;
    }

    /**
     * Set emaUseRouting
     *
     * @param bool $emaUseRouting
     * @return EmailAccount
     */
    public function setEmaUseRouting($emaUseRouting)
    {
        $this->emaUseRouting = $emaUseRouting;

        return $this;
    }

    /**
     * Get emaUseRouting
     *
     * @return bool
     */
    public function getEmaUseRouting()
    {
        return $this->emaUseRouting;
    }
}
