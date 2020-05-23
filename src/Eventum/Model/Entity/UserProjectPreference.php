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
 * UserProjectPreference
 *
 * @ORM\Table(name="user_project_preference")
 * @ORM\Entity
 */
class UserProjectPreference
{
    /**
     * @var int
     *
     * @ORM\Column(name="upp_usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $uppUsrId;

    /**
     * @var int
     *
     * @ORM\Column(name="upp_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $uppPrjId;

    /**
     * @var bool
     *
     * @ORM\Column(name="upp_receive_assigned_email", type="boolean", nullable=false)
     */
    private $uppReceiveAssignedEmail;

    /**
     * @var bool
     *
     * @ORM\Column(name="upp_receive_new_issue_email", type="boolean", nullable=false)
     */
    private $uppReceiveNewIssueEmail;

    /**
     * @var bool
     *
     * @ORM\Column(name="upp_receive_copy_of_own_action", type="boolean", nullable=false)
     */
    private $uppReceiveCopyOfOwnAction;

    /**
     * Set uppUsrId
     *
     * @param int $uppUsrId
     * @return UserProjectPreference
     */
    public function setUppUsrId($uppUsrId)
    {
        $this->uppUsrId = $uppUsrId;

        return $this;
    }

    /**
     * Get uppUsrId
     *
     * @return int
     */
    public function getUppUsrId()
    {
        return $this->uppUsrId;
    }

    /**
     * Set uppPrjId
     *
     * @param int $uppPrjId
     * @return UserProjectPreference
     */
    public function setUppPrjId($uppPrjId)
    {
        $this->uppPrjId = $uppPrjId;

        return $this;
    }

    /**
     * Get uppPrjId
     *
     * @return int
     */
    public function getUppPrjId()
    {
        return $this->uppPrjId;
    }

    /**
     * Set uppReceiveAssignedEmail
     *
     * @param bool $uppReceiveAssignedEmail
     * @return UserProjectPreference
     */
    public function setUppReceiveAssignedEmail($uppReceiveAssignedEmail)
    {
        $this->uppReceiveAssignedEmail = $uppReceiveAssignedEmail;

        return $this;
    }

    /**
     * Get uppReceiveAssignedEmail
     *
     * @return bool
     */
    public function getUppReceiveAssignedEmail()
    {
        return $this->uppReceiveAssignedEmail;
    }

    /**
     * Set uppReceiveNewIssueEmail
     *
     * @param bool $uppReceiveNewIssueEmail
     * @return UserProjectPreference
     */
    public function setUppReceiveNewIssueEmail($uppReceiveNewIssueEmail)
    {
        $this->uppReceiveNewIssueEmail = $uppReceiveNewIssueEmail;

        return $this;
    }

    /**
     * Get uppReceiveNewIssueEmail
     *
     * @return bool
     */
    public function getUppReceiveNewIssueEmail()
    {
        return $this->uppReceiveNewIssueEmail;
    }

    /**
     * Set uppReceiveCopyOfOwnAction
     *
     * @param bool $uppReceiveCopyOfOwnAction
     * @return UserProjectPreference
     */
    public function setUppReceiveCopyOfOwnAction($uppReceiveCopyOfOwnAction)
    {
        $this->uppReceiveCopyOfOwnAction = $uppReceiveCopyOfOwnAction;

        return $this;
    }

    /**
     * Get uppReceiveCopyOfOwnAction
     *
     * @return bool
     */
    public function getUppReceiveCopyOfOwnAction()
    {
        return $this->uppReceiveCopyOfOwnAction;
    }
}
