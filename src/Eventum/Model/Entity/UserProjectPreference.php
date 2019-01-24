<?php

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
     * @var integer
     *
     * @ORM\Column(name="upp_usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $uppUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="upp_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $uppPrjId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upp_receive_assigned_email", type="boolean", nullable=true)
     */
    private $uppReceiveAssignedEmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upp_receive_new_issue_email", type="boolean", nullable=true)
     */
    private $uppReceiveNewIssueEmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="upp_receive_copy_of_own_action", type="boolean", nullable=true)
     */
    private $uppReceiveCopyOfOwnAction;


    /**
     * Set uppUsrId
     *
     * @param integer $uppUsrId
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
     * @return integer
     */
    public function getUppUsrId()
    {
        return $this->uppUsrId;
    }

    /**
     * Set uppPrjId
     *
     * @param integer $uppPrjId
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
     * @return integer
     */
    public function getUppPrjId()
    {
        return $this->uppPrjId;
    }

    /**
     * Set uppReceiveAssignedEmail
     *
     * @param boolean $uppReceiveAssignedEmail
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
     * @return boolean
     */
    public function getUppReceiveAssignedEmail()
    {
        return $this->uppReceiveAssignedEmail;
    }

    /**
     * Set uppReceiveNewIssueEmail
     *
     * @param boolean $uppReceiveNewIssueEmail
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
     * @return boolean
     */
    public function getUppReceiveNewIssueEmail()
    {
        return $this->uppReceiveNewIssueEmail;
    }

    /**
     * Set uppReceiveCopyOfOwnAction
     *
     * @param boolean $uppReceiveCopyOfOwnAction
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
     * @return boolean
     */
    public function getUppReceiveCopyOfOwnAction()
    {
        return $this->uppReceiveCopyOfOwnAction;
    }
}
