<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Issue
 *
 * @ORM\Table(name="issue", indexes={@ORM\Index(name="iss_prj_id", columns={"iss_prj_id"}), @ORM\Index(name="iss_prc_id", columns={"iss_prc_id"}), @ORM\Index(name="iss_res_id", columns={"iss_res_id"}), @ORM\Index(name="iss_grp_id", columns={"iss_grp_id"}), @ORM\Index(name="iss_duplicated_iss_id", columns={"iss_duplicated_iss_id"}), @ORM\Index(name="ft_issue", columns={"iss_summary", "iss_description"})})
 * @ORM\Entity
 */
class Issue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $issId;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_customer_id", type="string", length=128, nullable=true)
     */
    private $issCustomerId;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_customer_contact_id", type="string", length=128, nullable=true)
     */
    private $issCustomerContactId;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_customer_contract_id", type="string", length=50, nullable=true)
     */
    private $issCustomerContractId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_usr_id", type="integer", nullable=false)
     */
    private $issUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_grp_id", type="integer", nullable=true)
     */
    private $issGrpId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_prj_id", type="integer", nullable=false)
     */
    private $issPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_prc_id", type="integer", nullable=false)
     */
    private $issPrcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_pre_id", type="integer", nullable=false)
     */
    private $issPreId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_pri_id", type="smallint", nullable=false)
     */
    private $issPriId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_sev_id", type="integer", nullable=false)
     */
    private $issSevId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="iss_sta_id", type="boolean", nullable=false)
     */
    private $issStaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_res_id", type="integer", nullable=true)
     */
    private $issResId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iss_duplicated_iss_id", type="integer", nullable=true)
     */
    private $issDuplicatedIssId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_created_date", type="datetime", nullable=false)
     */
    private $issCreatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_updated_date", type="datetime", nullable=true)
     */
    private $issUpdatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_last_response_date", type="datetime", nullable=true)
     */
    private $issLastResponseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_first_response_date", type="datetime", nullable=true)
     */
    private $issFirstResponseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_closed_date", type="datetime", nullable=true)
     */
    private $issClosedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_last_customer_action_date", type="datetime", nullable=true)
     */
    private $issLastCustomerActionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_expected_resolution_date", type="date", nullable=true)
     */
    private $issExpectedResolutionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_summary", type="string", length=128, nullable=false)
     */
    private $issSummary;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_description", type="text", length=65535, nullable=false)
     */
    private $issDescription;

    /**
     * @var float
     *
     * @ORM\Column(name="iss_dev_time", type="float", precision=10, scale=0, nullable=true)
     */
    private $issDevTime;

    /**
     * @var float
     *
     * @ORM\Column(name="iss_developer_est_time", type="float", precision=10, scale=0, nullable=true)
     */
    private $issDeveloperEstTime;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_contact_person_lname", type="string", length=64, nullable=true)
     */
    private $issContactPersonLname;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_contact_person_fname", type="string", length=64, nullable=true)
     */
    private $issContactPersonFname;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_contact_email", type="string", length=255, nullable=true)
     */
    private $issContactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_contact_phone", type="string", length=32, nullable=true)
     */
    private $issContactPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_contact_timezone", type="string", length=64, nullable=true)
     */
    private $issContactTimezone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="iss_trigger_reminders", type="boolean", nullable=true)
     */
    private $issTriggerReminders;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_last_public_action_date", type="datetime", nullable=true)
     */
    private $issLastPublicActionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_last_public_action_type", type="string", length=20, nullable=true)
     */
    private $issLastPublicActionType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_last_internal_action_date", type="datetime", nullable=true)
     */
    private $issLastInternalActionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_last_internal_action_type", type="string", length=20, nullable=true)
     */
    private $issLastInternalActionType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iss_status_change_date", type="datetime", nullable=true)
     */
    private $issStatusChangeDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="iss_percent_complete", type="boolean", nullable=true)
     */
    private $issPercentComplete;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_root_message_id", type="string", length=255, nullable=true)
     */
    private $issRootMessageId;

    /**
     * @var string
     *
     * @ORM\Column(name="iss_access_level", type="string", length=150, nullable=false)
     */
    private $issAccessLevel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="iss_private", type="boolean", nullable=false)
     */
    private $issPrivate;


    /**
     * Get issId
     *
     * @return integer
     */
    public function getIssId()
    {
        return $this->issId;
    }

    /**
     * Set issCustomerId
     *
     * @param string $issCustomerId
     * @return Issue
     */
    public function setIssCustomerId($issCustomerId)
    {
        $this->issCustomerId = $issCustomerId;

        return $this;
    }

    /**
     * Get issCustomerId
     *
     * @return string
     */
    public function getIssCustomerId()
    {
        return $this->issCustomerId;
    }

    /**
     * Set issCustomerContactId
     *
     * @param string $issCustomerContactId
     * @return Issue
     */
    public function setIssCustomerContactId($issCustomerContactId)
    {
        $this->issCustomerContactId = $issCustomerContactId;

        return $this;
    }

    /**
     * Get issCustomerContactId
     *
     * @return string
     */
    public function getIssCustomerContactId()
    {
        return $this->issCustomerContactId;
    }

    /**
     * Set issCustomerContractId
     *
     * @param string $issCustomerContractId
     * @return Issue
     */
    public function setIssCustomerContractId($issCustomerContractId)
    {
        $this->issCustomerContractId = $issCustomerContractId;

        return $this;
    }

    /**
     * Get issCustomerContractId
     *
     * @return string
     */
    public function getIssCustomerContractId()
    {
        return $this->issCustomerContractId;
    }

    /**
     * Set issUsrId
     *
     * @param integer $issUsrId
     * @return Issue
     */
    public function setIssUsrId($issUsrId)
    {
        $this->issUsrId = $issUsrId;

        return $this;
    }

    /**
     * Get issUsrId
     *
     * @return integer
     */
    public function getIssUsrId()
    {
        return $this->issUsrId;
    }

    /**
     * Set issGrpId
     *
     * @param integer $issGrpId
     * @return Issue
     */
    public function setIssGrpId($issGrpId)
    {
        $this->issGrpId = $issGrpId;

        return $this;
    }

    /**
     * Get issGrpId
     *
     * @return integer
     */
    public function getIssGrpId()
    {
        return $this->issGrpId;
    }

    /**
     * Set issPrjId
     *
     * @param integer $issPrjId
     * @return Issue
     */
    public function setIssPrjId($issPrjId)
    {
        $this->issPrjId = $issPrjId;

        return $this;
    }

    /**
     * Get issPrjId
     *
     * @return integer
     */
    public function getIssPrjId()
    {
        return $this->issPrjId;
    }

    /**
     * Set issPrcId
     *
     * @param integer $issPrcId
     * @return Issue
     */
    public function setIssPrcId($issPrcId)
    {
        $this->issPrcId = $issPrcId;

        return $this;
    }

    /**
     * Get issPrcId
     *
     * @return integer
     */
    public function getIssPrcId()
    {
        return $this->issPrcId;
    }

    /**
     * Set issPreId
     *
     * @param integer $issPreId
     * @return Issue
     */
    public function setIssPreId($issPreId)
    {
        $this->issPreId = $issPreId;

        return $this;
    }

    /**
     * Get issPreId
     *
     * @return integer
     */
    public function getIssPreId()
    {
        return $this->issPreId;
    }

    /**
     * Set issPriId
     *
     * @param integer $issPriId
     * @return Issue
     */
    public function setIssPriId($issPriId)
    {
        $this->issPriId = $issPriId;

        return $this;
    }

    /**
     * Get issPriId
     *
     * @return integer
     */
    public function getIssPriId()
    {
        return $this->issPriId;
    }

    /**
     * Set issSevId
     *
     * @param integer $issSevId
     * @return Issue
     */
    public function setIssSevId($issSevId)
    {
        $this->issSevId = $issSevId;

        return $this;
    }

    /**
     * Get issSevId
     *
     * @return integer
     */
    public function getIssSevId()
    {
        return $this->issSevId;
    }

    /**
     * Set issStaId
     *
     * @param boolean $issStaId
     * @return Issue
     */
    public function setIssStaId($issStaId)
    {
        $this->issStaId = $issStaId;

        return $this;
    }

    /**
     * Get issStaId
     *
     * @return boolean
     */
    public function getIssStaId()
    {
        return $this->issStaId;
    }

    /**
     * Set issResId
     *
     * @param integer $issResId
     * @return Issue
     */
    public function setIssResId($issResId)
    {
        $this->issResId = $issResId;

        return $this;
    }

    /**
     * Get issResId
     *
     * @return integer
     */
    public function getIssResId()
    {
        return $this->issResId;
    }

    /**
     * Set issDuplicatedIssId
     *
     * @param integer $issDuplicatedIssId
     * @return Issue
     */
    public function setIssDuplicatedIssId($issDuplicatedIssId)
    {
        $this->issDuplicatedIssId = $issDuplicatedIssId;

        return $this;
    }

    /**
     * Get issDuplicatedIssId
     *
     * @return integer
     */
    public function getIssDuplicatedIssId()
    {
        return $this->issDuplicatedIssId;
    }

    /**
     * Set issCreatedDate
     *
     * @param \DateTime $issCreatedDate
     * @return Issue
     */
    public function setIssCreatedDate($issCreatedDate)
    {
        $this->issCreatedDate = $issCreatedDate;

        return $this;
    }

    /**
     * Get issCreatedDate
     *
     * @return \DateTime
     */
    public function getIssCreatedDate()
    {
        return $this->issCreatedDate;
    }

    /**
     * Set issUpdatedDate
     *
     * @param \DateTime $issUpdatedDate
     * @return Issue
     */
    public function setIssUpdatedDate($issUpdatedDate)
    {
        $this->issUpdatedDate = $issUpdatedDate;

        return $this;
    }

    /**
     * Get issUpdatedDate
     *
     * @return \DateTime
     */
    public function getIssUpdatedDate()
    {
        return $this->issUpdatedDate;
    }

    /**
     * Set issLastResponseDate
     *
     * @param \DateTime $issLastResponseDate
     * @return Issue
     */
    public function setIssLastResponseDate($issLastResponseDate)
    {
        $this->issLastResponseDate = $issLastResponseDate;

        return $this;
    }

    /**
     * Get issLastResponseDate
     *
     * @return \DateTime
     */
    public function getIssLastResponseDate()
    {
        return $this->issLastResponseDate;
    }

    /**
     * Set issFirstResponseDate
     *
     * @param \DateTime $issFirstResponseDate
     * @return Issue
     */
    public function setIssFirstResponseDate($issFirstResponseDate)
    {
        $this->issFirstResponseDate = $issFirstResponseDate;

        return $this;
    }

    /**
     * Get issFirstResponseDate
     *
     * @return \DateTime
     */
    public function getIssFirstResponseDate()
    {
        return $this->issFirstResponseDate;
    }

    /**
     * Set issClosedDate
     *
     * @param \DateTime $issClosedDate
     * @return Issue
     */
    public function setIssClosedDate($issClosedDate)
    {
        $this->issClosedDate = $issClosedDate;

        return $this;
    }

    /**
     * Get issClosedDate
     *
     * @return \DateTime
     */
    public function getIssClosedDate()
    {
        return $this->issClosedDate;
    }

    /**
     * Set issLastCustomerActionDate
     *
     * @param \DateTime $issLastCustomerActionDate
     * @return Issue
     */
    public function setIssLastCustomerActionDate($issLastCustomerActionDate)
    {
        $this->issLastCustomerActionDate = $issLastCustomerActionDate;

        return $this;
    }

    /**
     * Get issLastCustomerActionDate
     *
     * @return \DateTime
     */
    public function getIssLastCustomerActionDate()
    {
        return $this->issLastCustomerActionDate;
    }

    /**
     * Set issExpectedResolutionDate
     *
     * @param \DateTime $issExpectedResolutionDate
     * @return Issue
     */
    public function setIssExpectedResolutionDate($issExpectedResolutionDate)
    {
        $this->issExpectedResolutionDate = $issExpectedResolutionDate;

        return $this;
    }

    /**
     * Get issExpectedResolutionDate
     *
     * @return \DateTime
     */
    public function getIssExpectedResolutionDate()
    {
        return $this->issExpectedResolutionDate;
    }

    /**
     * Set issSummary
     *
     * @param string $issSummary
     * @return Issue
     */
    public function setIssSummary($issSummary)
    {
        $this->issSummary = $issSummary;

        return $this;
    }

    /**
     * Get issSummary
     *
     * @return string
     */
    public function getIssSummary()
    {
        return $this->issSummary;
    }

    /**
     * Set issDescription
     *
     * @param string $issDescription
     * @return Issue
     */
    public function setIssDescription($issDescription)
    {
        $this->issDescription = $issDescription;

        return $this;
    }

    /**
     * Get issDescription
     *
     * @return string
     */
    public function getIssDescription()
    {
        return $this->issDescription;
    }

    /**
     * Set issDevTime
     *
     * @param float $issDevTime
     * @return Issue
     */
    public function setIssDevTime($issDevTime)
    {
        $this->issDevTime = $issDevTime;

        return $this;
    }

    /**
     * Get issDevTime
     *
     * @return float
     */
    public function getIssDevTime()
    {
        return $this->issDevTime;
    }

    /**
     * Set issDeveloperEstTime
     *
     * @param float $issDeveloperEstTime
     * @return Issue
     */
    public function setIssDeveloperEstTime($issDeveloperEstTime)
    {
        $this->issDeveloperEstTime = $issDeveloperEstTime;

        return $this;
    }

    /**
     * Get issDeveloperEstTime
     *
     * @return float
     */
    public function getIssDeveloperEstTime()
    {
        return $this->issDeveloperEstTime;
    }

    /**
     * Set issContactPersonLname
     *
     * @param string $issContactPersonLname
     * @return Issue
     */
    public function setIssContactPersonLname($issContactPersonLname)
    {
        $this->issContactPersonLname = $issContactPersonLname;

        return $this;
    }

    /**
     * Get issContactPersonLname
     *
     * @return string
     */
    public function getIssContactPersonLname()
    {
        return $this->issContactPersonLname;
    }

    /**
     * Set issContactPersonFname
     *
     * @param string $issContactPersonFname
     * @return Issue
     */
    public function setIssContactPersonFname($issContactPersonFname)
    {
        $this->issContactPersonFname = $issContactPersonFname;

        return $this;
    }

    /**
     * Get issContactPersonFname
     *
     * @return string
     */
    public function getIssContactPersonFname()
    {
        return $this->issContactPersonFname;
    }

    /**
     * Set issContactEmail
     *
     * @param string $issContactEmail
     * @return Issue
     */
    public function setIssContactEmail($issContactEmail)
    {
        $this->issContactEmail = $issContactEmail;

        return $this;
    }

    /**
     * Get issContactEmail
     *
     * @return string
     */
    public function getIssContactEmail()
    {
        return $this->issContactEmail;
    }

    /**
     * Set issContactPhone
     *
     * @param string $issContactPhone
     * @return Issue
     */
    public function setIssContactPhone($issContactPhone)
    {
        $this->issContactPhone = $issContactPhone;

        return $this;
    }

    /**
     * Get issContactPhone
     *
     * @return string
     */
    public function getIssContactPhone()
    {
        return $this->issContactPhone;
    }

    /**
     * Set issContactTimezone
     *
     * @param string $issContactTimezone
     * @return Issue
     */
    public function setIssContactTimezone($issContactTimezone)
    {
        $this->issContactTimezone = $issContactTimezone;

        return $this;
    }

    /**
     * Get issContactTimezone
     *
     * @return string
     */
    public function getIssContactTimezone()
    {
        return $this->issContactTimezone;
    }

    /**
     * Set issTriggerReminders
     *
     * @param boolean $issTriggerReminders
     * @return Issue
     */
    public function setIssTriggerReminders($issTriggerReminders)
    {
        $this->issTriggerReminders = $issTriggerReminders;

        return $this;
    }

    /**
     * Get issTriggerReminders
     *
     * @return boolean
     */
    public function getIssTriggerReminders()
    {
        return $this->issTriggerReminders;
    }

    /**
     * Set issLastPublicActionDate
     *
     * @param \DateTime $issLastPublicActionDate
     * @return Issue
     */
    public function setIssLastPublicActionDate($issLastPublicActionDate)
    {
        $this->issLastPublicActionDate = $issLastPublicActionDate;

        return $this;
    }

    /**
     * Get issLastPublicActionDate
     *
     * @return \DateTime
     */
    public function getIssLastPublicActionDate()
    {
        return $this->issLastPublicActionDate;
    }

    /**
     * Set issLastPublicActionType
     *
     * @param string $issLastPublicActionType
     * @return Issue
     */
    public function setIssLastPublicActionType($issLastPublicActionType)
    {
        $this->issLastPublicActionType = $issLastPublicActionType;

        return $this;
    }

    /**
     * Get issLastPublicActionType
     *
     * @return string
     */
    public function getIssLastPublicActionType()
    {
        return $this->issLastPublicActionType;
    }

    /**
     * Set issLastInternalActionDate
     *
     * @param \DateTime $issLastInternalActionDate
     * @return Issue
     */
    public function setIssLastInternalActionDate($issLastInternalActionDate)
    {
        $this->issLastInternalActionDate = $issLastInternalActionDate;

        return $this;
    }

    /**
     * Get issLastInternalActionDate
     *
     * @return \DateTime
     */
    public function getIssLastInternalActionDate()
    {
        return $this->issLastInternalActionDate;
    }

    /**
     * Set issLastInternalActionType
     *
     * @param string $issLastInternalActionType
     * @return Issue
     */
    public function setIssLastInternalActionType($issLastInternalActionType)
    {
        $this->issLastInternalActionType = $issLastInternalActionType;

        return $this;
    }

    /**
     * Get issLastInternalActionType
     *
     * @return string
     */
    public function getIssLastInternalActionType()
    {
        return $this->issLastInternalActionType;
    }

    /**
     * Set issStatusChangeDate
     *
     * @param \DateTime $issStatusChangeDate
     * @return Issue
     */
    public function setIssStatusChangeDate($issStatusChangeDate)
    {
        $this->issStatusChangeDate = $issStatusChangeDate;

        return $this;
    }

    /**
     * Get issStatusChangeDate
     *
     * @return \DateTime
     */
    public function getIssStatusChangeDate()
    {
        return $this->issStatusChangeDate;
    }

    /**
     * Set issPercentComplete
     *
     * @param boolean $issPercentComplete
     * @return Issue
     */
    public function setIssPercentComplete($issPercentComplete)
    {
        $this->issPercentComplete = $issPercentComplete;

        return $this;
    }

    /**
     * Get issPercentComplete
     *
     * @return boolean
     */
    public function getIssPercentComplete()
    {
        return $this->issPercentComplete;
    }

    /**
     * Set issRootMessageId
     *
     * @param string $issRootMessageId
     * @return Issue
     */
    public function setIssRootMessageId($issRootMessageId)
    {
        $this->issRootMessageId = $issRootMessageId;

        return $this;
    }

    /**
     * Get issRootMessageId
     *
     * @return string
     */
    public function getIssRootMessageId()
    {
        return $this->issRootMessageId;
    }

    /**
     * Set issAccessLevel
     *
     * @param string $issAccessLevel
     * @return Issue
     */
    public function setIssAccessLevel($issAccessLevel)
    {
        $this->issAccessLevel = $issAccessLevel;

        return $this;
    }

    /**
     * Get issAccessLevel
     *
     * @return string
     */
    public function getIssAccessLevel()
    {
        return $this->issAccessLevel;
    }

    /**
     * Set issPrivate
     *
     * @param boolean $issPrivate
     * @return Issue
     */
    public function setIssPrivate($issPrivate)
    {
        $this->issPrivate = $issPrivate;

        return $this;
    }

    /**
     * Get issPrivate
     *
     * @return boolean
     */
    public function getIssPrivate()
    {
        return $this->issPrivate;
    }
}
