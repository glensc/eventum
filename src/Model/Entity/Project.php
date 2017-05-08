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

/**
 * Project
 *
 * @Table(name="project", uniqueConstraints={@UniqueConstraint(name="prj_title", columns={"prj_title"})}, indexes={@Index(name="prj_lead_usr_id", columns={"prj_lead_usr_id"})})
 * @Entity
 */
class Project
{
    /**
     * @var int
     *
     * @Column(name="prj_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $prjId;

    /**
     * @var \DateTime
     *
     * @Column(name="prj_created_date", type="datetime", nullable=false)
     */
    private $prjCreatedDate;

    /**
     * @var string
     *
     * @Column(name="prj_title", type="string", length=64, nullable=false)
     */
    private $prjTitle;

    /**
     * @var string
     *
     * @Column(name="prj_status", type="string", nullable=false)
     */
    private $prjStatus;

    /**
     * @var int
     *
     * @Column(name="prj_lead_usr_id", type="integer", nullable=false)
     */
    private $prjLeadUsrId;

    /**
     * @var int
     *
     * @Column(name="prj_initial_sta_id", type="integer", nullable=false)
     */
    private $prjInitialStaId;

    /**
     * @var string
     *
     * @Column(name="prj_remote_invocation", type="string", length=8, nullable=false)
     */
    private $prjRemoteInvocation;

    /**
     * @var string
     *
     * @Column(name="prj_anonymous_post", type="string", length=8, nullable=false)
     */
    private $prjAnonymousPost;

    /**
     * @var string
     *
     * @Column(name="prj_anonymous_post_options", type="text", length=65535, nullable=true)
     */
    private $prjAnonymousPostOptions;

    /**
     * @var string
     *
     * @Column(name="prj_outgoing_sender_name", type="string", length=255, nullable=false)
     */
    private $prjOutgoingSenderName;

    /**
     * @var string
     *
     * @Column(name="prj_outgoing_sender_email", type="string", length=255, nullable=false)
     */
    private $prjOutgoingSenderEmail;

    /**
     * @var string
     *
     * @Column(name="prj_sender_flag", type="string", length=255, nullable=true)
     */
    private $prjSenderFlag;

    /**
     * @var string
     *
     * @Column(name="prj_sender_flag_location", type="string", length=6, nullable=true)
     */
    private $prjSenderFlagLocation;

    /**
     * @var string
     *
     * @Column(name="prj_mail_aliases", type="string", length=255, nullable=true)
     */
    private $prjMailAliases;

    /**
     * @var string
     *
     * @Column(name="prj_customer_backend", type="string", length=64, nullable=true)
     */
    private $prjCustomerBackend;

    /**
     * @var string
     *
     * @Column(name="prj_workflow_backend", type="string", length=64, nullable=true)
     */
    private $prjWorkflowBackend;

    /**
     * @var bool
     *
     * @Column(name="prj_segregate_reporter", type="boolean", nullable=true)
     */
    private $prjSegregateReporter;

    /**
     * Get prjId
     *
     * @return int
     */
    public function getId()
    {
        return $this->prjId;
    }

    /**
     * Set prjCreatedDate
     *
     * @param \DateTime $prjCreatedDate
     * @return Project
     */
    public function setCreatedDate($prjCreatedDate)
    {
        $this->prjCreatedDate = $prjCreatedDate;

        return $this;
    }

    /**
     * Get prjCreatedDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->prjCreatedDate;
    }

    /**
     * Set prjTitle
     *
     * @param string $prjTitle
     * @return Project
     */
    public function setTitle($prjTitle)
    {
        $this->prjTitle = $prjTitle;

        return $this;
    }

    /**
     * Get prjTitle
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->prjTitle;
    }

    /**
     * Set prjStatus
     *
     * @param string $prjStatus
     * @return Project
     */
    public function setStatus($prjStatus)
    {
        $this->prjStatus = $prjStatus;

        return $this;
    }

    /**
     * Get prjStatus
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->prjStatus;
    }

    /**
     * Set prjLeadUsrId
     *
     * @param int $prjLeadUsrId
     * @return Project
     */
    public function setLeadUserId($prjLeadUsrId)
    {
        $this->prjLeadUsrId = $prjLeadUsrId;

        return $this;
    }

    /**
     * Get prjLeadUsrId
     *
     * @return int
     */
    public function getLeadUserId()
    {
        return $this->prjLeadUsrId;
    }

    /**
     * Set prjInitialStaId
     *
     * @param int $prjInitialStaId
     * @return Project
     */
    public function setInitialStatusId($prjInitialStaId)
    {
        $this->prjInitialStaId = $prjInitialStaId;

        return $this;
    }

    /**
     * Get prjInitialStaId
     *
     * @return int
     */
    public function getInitialStatusId()
    {
        return $this->prjInitialStaId;
    }

    /**
     * Set prjRemoteInvocation
     *
     * @param string $prjRemoteInvocation
     * @return Project
     */
    public function setRemoteInvocation($prjRemoteInvocation)
    {
        $this->prjRemoteInvocation = $prjRemoteInvocation;

        return $this;
    }

    /**
     * Get prjRemoteInvocation
     *
     * @return string
     */
    public function getRemoteInvocation()
    {
        return $this->prjRemoteInvocation;
    }

    /**
     * Set prjAnonymousPost
     *
     * @param string $prjAnonymousPost
     * @return Project
     */
    public function setAnonymousPost($prjAnonymousPost)
    {
        $this->prjAnonymousPost = $prjAnonymousPost;

        return $this;
    }

    /**
     * Get prjAnonymousPost
     *
     * @return string
     */
    public function getAnonymousPost()
    {
        return $this->prjAnonymousPost;
    }

    /**
     * Set prjAnonymousPostOptions
     *
     * @param string $prjAnonymousPostOptions
     * @return Project
     */
    public function setAnonymousPostOptions($prjAnonymousPostOptions)
    {
        $this->prjAnonymousPostOptions = $prjAnonymousPostOptions;

        return $this;
    }

    /**
     * Get prjAnonymousPostOptions
     *
     * @return string
     */
    public function getAnonymousPostOptions()
    {
        return $this->prjAnonymousPostOptions;
    }

    /**
     * Set prjOutgoingSenderName
     *
     * @param string $prjOutgoingSenderName
     * @return Project
     */
    public function setOutgoingSenderName($prjOutgoingSenderName)
    {
        $this->prjOutgoingSenderName = $prjOutgoingSenderName;

        return $this;
    }

    /**
     * Get prjOutgoingSenderName
     *
     * @return string
     */
    public function getOutgoingSenderName()
    {
        return $this->prjOutgoingSenderName;
    }

    /**
     * Set prjOutgoingSenderEmail
     *
     * @param string $prjOutgoingSenderEmail
     * @return Project
     */
    public function setOutgoingSenderEmail($prjOutgoingSenderEmail)
    {
        $this->prjOutgoingSenderEmail = $prjOutgoingSenderEmail;

        return $this;
    }

    /**
     * Get prjOutgoingSenderEmail
     *
     * @return string
     */
    public function getOutgoingSenderEmail()
    {
        return $this->prjOutgoingSenderEmail;
    }

    /**
     * Set prjSenderFlag
     *
     * @param string $prjSenderFlag
     * @return Project
     */
    public function setSenderFlag($prjSenderFlag)
    {
        $this->prjSenderFlag = $prjSenderFlag;

        return $this;
    }

    /**
     * Get prjSenderFlag
     *
     * @return string
     */
    public function getSenderFlag()
    {
        return $this->prjSenderFlag;
    }

    /**
     * Set prjSenderFlagLocation
     *
     * @param string $prjSenderFlagLocation
     * @return Project
     */
    public function setSenderFlagLocation($prjSenderFlagLocation)
    {
        $this->prjSenderFlagLocation = $prjSenderFlagLocation;

        return $this;
    }

    /**
     * Get prjSenderFlagLocation
     *
     * @return string
     */
    public function getSenderFlagLocation()
    {
        return $this->prjSenderFlagLocation;
    }

    /**
     * Set prjMailAliases
     *
     * @param string $prjMailAliases
     * @return Project
     */
    public function setMailAliases($prjMailAliases)
    {
        $this->prjMailAliases = $prjMailAliases;

        return $this;
    }

    /**
     * Get prjMailAliases
     *
     * @return string
     */
    public function getMailAliases()
    {
        return $this->prjMailAliases;
    }

    /**
     * Set prjCustomerBackend
     *
     * @param string $prjCustomerBackend
     * @return Project
     */
    public function setCustomerBackend($prjCustomerBackend)
    {
        $this->prjCustomerBackend = $prjCustomerBackend;

        return $this;
    }

    /**
     * Get prjCustomerBackend
     *
     * @return string
     */
    public function getCustomerBackend()
    {
        return $this->prjCustomerBackend;
    }

    /**
     * Set prjWorkflowBackend
     *
     * @param string $prjWorkflowBackend
     * @return Project
     */
    public function setWorkflowBackend($prjWorkflowBackend)
    {
        $this->prjWorkflowBackend = $prjWorkflowBackend;

        return $this;
    }

    /**
     * Get prjWorkflowBackend
     *
     * @return string
     */
    public function getWorkflowBackend()
    {
        return $this->prjWorkflowBackend;
    }

    /**
     * Set prjSegregateReporter
     *
     * @param bool $prjSegregateReporter
     * @return Project
     */
    public function setSegregateReporter($prjSegregateReporter)
    {
        $this->prjSegregateReporter = $prjSegregateReporter;

        return $this;
    }

    /**
     * Get prjSegregateReporter
     *
     * @return bool
     */
    public function getSegregateReporter()
    {
        return $this->prjSegregateReporter;
    }
}
