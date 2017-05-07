<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomFilter
 *
 * @ORM\Table(name="custom_filter", indexes={@ORM\Index(name="cst_usr_id", columns={"cst_usr_id", "cst_prj_id"})})
 * @ORM\Entity
 */
class CustomFilter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cst_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cstId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_usr_id", type="integer", nullable=false)
     */
    private $cstUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_prj_id", type="integer", nullable=false)
     */
    private $cstPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_title", type="string", length=64, nullable=false)
     */
    private $cstTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_iss_pri_id", type="integer", nullable=true)
     */
    private $cstIssPriId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_iss_sev_id", type="integer", nullable=true)
     */
    private $cstIssSevId;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_keywords", type="string", length=64, nullable=true)
     */
    private $cstKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_users", type="string", length=64, nullable=true)
     */
    private $cstUsers;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_reporter", type="integer", nullable=true)
     */
    private $cstReporter;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_iss_prc_id", type="integer", nullable=true)
     */
    private $cstIssPrcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_iss_sta_id", type="integer", nullable=true)
     */
    private $cstIssStaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_iss_pre_id", type="integer", nullable=true)
     */
    private $cstIssPreId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_pro_id", type="integer", nullable=true)
     */
    private $cstProId;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_show_authorized", type="string", length=3, nullable=true)
     */
    private $cstShowAuthorized;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_show_notification_list", type="string", length=3, nullable=true)
     */
    private $cstShowNotificationList;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_created_date", type="date", nullable=true)
     */
    private $cstCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_created_date_filter_type", type="string", length=7, nullable=true)
     */
    private $cstCreatedDateFilterType;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_created_date_time_period", type="smallint", nullable=true)
     */
    private $cstCreatedDateTimePeriod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_created_date_end", type="date", nullable=true)
     */
    private $cstCreatedDateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_updated_date", type="date", nullable=true)
     */
    private $cstUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_updated_date_filter_type", type="string", length=7, nullable=true)
     */
    private $cstUpdatedDateFilterType;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_updated_date_time_period", type="smallint", nullable=true)
     */
    private $cstUpdatedDateTimePeriod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_updated_date_end", type="date", nullable=true)
     */
    private $cstUpdatedDateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_last_response_date", type="date", nullable=true)
     */
    private $cstLastResponseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_last_response_date_filter_type", type="string", length=7, nullable=true)
     */
    private $cstLastResponseDateFilterType;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_last_response_date_time_period", type="smallint", nullable=true)
     */
    private $cstLastResponseDateTimePeriod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_last_response_date_end", type="date", nullable=true)
     */
    private $cstLastResponseDateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_first_response_date", type="date", nullable=true)
     */
    private $cstFirstResponseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_first_response_date_filter_type", type="string", length=7, nullable=true)
     */
    private $cstFirstResponseDateFilterType;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_first_response_date_time_period", type="smallint", nullable=true)
     */
    private $cstFirstResponseDateTimePeriod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_first_response_date_end", type="date", nullable=true)
     */
    private $cstFirstResponseDateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_closed_date", type="date", nullable=true)
     */
    private $cstClosedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_closed_date_filter_type", type="string", length=7, nullable=true)
     */
    private $cstClosedDateFilterType;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_closed_date_time_period", type="smallint", nullable=true)
     */
    private $cstClosedDateTimePeriod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_closed_date_end", type="date", nullable=true)
     */
    private $cstClosedDateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_rows", type="string", length=3, nullable=true)
     */
    private $cstRows;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_sort_by", type="string", length=32, nullable=true)
     */
    private $cstSortBy;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_sort_order", type="string", length=4, nullable=true)
     */
    private $cstSortOrder;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_hide_closed", type="integer", nullable=true)
     */
    private $cstHideClosed;

    /**
     * @var integer
     *
     * @ORM\Column(name="cst_is_global", type="integer", nullable=true)
     */
    private $cstIsGlobal;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_search_type", type="string", length=15, nullable=false)
     */
    private $cstSearchType;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_custom_field", type="text", length=65535, nullable=true)
     */
    private $cstCustomField;


    /**
     * Get cstId
     *
     * @return integer 
     */
    public function getCstId()
    {
        return $this->cstId;
    }

    /**
     * Set cstUsrId
     *
     * @param integer $cstUsrId
     * @return CustomFilter
     */
    public function setCstUsrId($cstUsrId)
    {
        $this->cstUsrId = $cstUsrId;

        return $this;
    }

    /**
     * Get cstUsrId
     *
     * @return integer 
     */
    public function getCstUsrId()
    {
        return $this->cstUsrId;
    }

    /**
     * Set cstPrjId
     *
     * @param integer $cstPrjId
     * @return CustomFilter
     */
    public function setCstPrjId($cstPrjId)
    {
        $this->cstPrjId = $cstPrjId;

        return $this;
    }

    /**
     * Get cstPrjId
     *
     * @return integer 
     */
    public function getCstPrjId()
    {
        return $this->cstPrjId;
    }

    /**
     * Set cstTitle
     *
     * @param string $cstTitle
     * @return CustomFilter
     */
    public function setCstTitle($cstTitle)
    {
        $this->cstTitle = $cstTitle;

        return $this;
    }

    /**
     * Get cstTitle
     *
     * @return string 
     */
    public function getCstTitle()
    {
        return $this->cstTitle;
    }

    /**
     * Set cstIssPriId
     *
     * @param integer $cstIssPriId
     * @return CustomFilter
     */
    public function setCstIssPriId($cstIssPriId)
    {
        $this->cstIssPriId = $cstIssPriId;

        return $this;
    }

    /**
     * Get cstIssPriId
     *
     * @return integer 
     */
    public function getCstIssPriId()
    {
        return $this->cstIssPriId;
    }

    /**
     * Set cstIssSevId
     *
     * @param integer $cstIssSevId
     * @return CustomFilter
     */
    public function setCstIssSevId($cstIssSevId)
    {
        $this->cstIssSevId = $cstIssSevId;

        return $this;
    }

    /**
     * Get cstIssSevId
     *
     * @return integer 
     */
    public function getCstIssSevId()
    {
        return $this->cstIssSevId;
    }

    /**
     * Set cstKeywords
     *
     * @param string $cstKeywords
     * @return CustomFilter
     */
    public function setCstKeywords($cstKeywords)
    {
        $this->cstKeywords = $cstKeywords;

        return $this;
    }

    /**
     * Get cstKeywords
     *
     * @return string 
     */
    public function getCstKeywords()
    {
        return $this->cstKeywords;
    }

    /**
     * Set cstUsers
     *
     * @param string $cstUsers
     * @return CustomFilter
     */
    public function setCstUsers($cstUsers)
    {
        $this->cstUsers = $cstUsers;

        return $this;
    }

    /**
     * Get cstUsers
     *
     * @return string 
     */
    public function getCstUsers()
    {
        return $this->cstUsers;
    }

    /**
     * Set cstReporter
     *
     * @param integer $cstReporter
     * @return CustomFilter
     */
    public function setCstReporter($cstReporter)
    {
        $this->cstReporter = $cstReporter;

        return $this;
    }

    /**
     * Get cstReporter
     *
     * @return integer 
     */
    public function getCstReporter()
    {
        return $this->cstReporter;
    }

    /**
     * Set cstIssPrcId
     *
     * @param integer $cstIssPrcId
     * @return CustomFilter
     */
    public function setCstIssPrcId($cstIssPrcId)
    {
        $this->cstIssPrcId = $cstIssPrcId;

        return $this;
    }

    /**
     * Get cstIssPrcId
     *
     * @return integer 
     */
    public function getCstIssPrcId()
    {
        return $this->cstIssPrcId;
    }

    /**
     * Set cstIssStaId
     *
     * @param integer $cstIssStaId
     * @return CustomFilter
     */
    public function setCstIssStaId($cstIssStaId)
    {
        $this->cstIssStaId = $cstIssStaId;

        return $this;
    }

    /**
     * Get cstIssStaId
     *
     * @return integer 
     */
    public function getCstIssStaId()
    {
        return $this->cstIssStaId;
    }

    /**
     * Set cstIssPreId
     *
     * @param integer $cstIssPreId
     * @return CustomFilter
     */
    public function setCstIssPreId($cstIssPreId)
    {
        $this->cstIssPreId = $cstIssPreId;

        return $this;
    }

    /**
     * Get cstIssPreId
     *
     * @return integer 
     */
    public function getCstIssPreId()
    {
        return $this->cstIssPreId;
    }

    /**
     * Set cstProId
     *
     * @param integer $cstProId
     * @return CustomFilter
     */
    public function setCstProId($cstProId)
    {
        $this->cstProId = $cstProId;

        return $this;
    }

    /**
     * Get cstProId
     *
     * @return integer 
     */
    public function getCstProId()
    {
        return $this->cstProId;
    }

    /**
     * Set cstShowAuthorized
     *
     * @param string $cstShowAuthorized
     * @return CustomFilter
     */
    public function setCstShowAuthorized($cstShowAuthorized)
    {
        $this->cstShowAuthorized = $cstShowAuthorized;

        return $this;
    }

    /**
     * Get cstShowAuthorized
     *
     * @return string 
     */
    public function getCstShowAuthorized()
    {
        return $this->cstShowAuthorized;
    }

    /**
     * Set cstShowNotificationList
     *
     * @param string $cstShowNotificationList
     * @return CustomFilter
     */
    public function setCstShowNotificationList($cstShowNotificationList)
    {
        $this->cstShowNotificationList = $cstShowNotificationList;

        return $this;
    }

    /**
     * Get cstShowNotificationList
     *
     * @return string 
     */
    public function getCstShowNotificationList()
    {
        return $this->cstShowNotificationList;
    }

    /**
     * Set cstCreatedDate
     *
     * @param \DateTime $cstCreatedDate
     * @return CustomFilter
     */
    public function setCstCreatedDate($cstCreatedDate)
    {
        $this->cstCreatedDate = $cstCreatedDate;

        return $this;
    }

    /**
     * Get cstCreatedDate
     *
     * @return \DateTime 
     */
    public function getCstCreatedDate()
    {
        return $this->cstCreatedDate;
    }

    /**
     * Set cstCreatedDateFilterType
     *
     * @param string $cstCreatedDateFilterType
     * @return CustomFilter
     */
    public function setCstCreatedDateFilterType($cstCreatedDateFilterType)
    {
        $this->cstCreatedDateFilterType = $cstCreatedDateFilterType;

        return $this;
    }

    /**
     * Get cstCreatedDateFilterType
     *
     * @return string 
     */
    public function getCstCreatedDateFilterType()
    {
        return $this->cstCreatedDateFilterType;
    }

    /**
     * Set cstCreatedDateTimePeriod
     *
     * @param integer $cstCreatedDateTimePeriod
     * @return CustomFilter
     */
    public function setCstCreatedDateTimePeriod($cstCreatedDateTimePeriod)
    {
        $this->cstCreatedDateTimePeriod = $cstCreatedDateTimePeriod;

        return $this;
    }

    /**
     * Get cstCreatedDateTimePeriod
     *
     * @return integer 
     */
    public function getCstCreatedDateTimePeriod()
    {
        return $this->cstCreatedDateTimePeriod;
    }

    /**
     * Set cstCreatedDateEnd
     *
     * @param \DateTime $cstCreatedDateEnd
     * @return CustomFilter
     */
    public function setCstCreatedDateEnd($cstCreatedDateEnd)
    {
        $this->cstCreatedDateEnd = $cstCreatedDateEnd;

        return $this;
    }

    /**
     * Get cstCreatedDateEnd
     *
     * @return \DateTime 
     */
    public function getCstCreatedDateEnd()
    {
        return $this->cstCreatedDateEnd;
    }

    /**
     * Set cstUpdatedDate
     *
     * @param \DateTime $cstUpdatedDate
     * @return CustomFilter
     */
    public function setCstUpdatedDate($cstUpdatedDate)
    {
        $this->cstUpdatedDate = $cstUpdatedDate;

        return $this;
    }

    /**
     * Get cstUpdatedDate
     *
     * @return \DateTime 
     */
    public function getCstUpdatedDate()
    {
        return $this->cstUpdatedDate;
    }

    /**
     * Set cstUpdatedDateFilterType
     *
     * @param string $cstUpdatedDateFilterType
     * @return CustomFilter
     */
    public function setCstUpdatedDateFilterType($cstUpdatedDateFilterType)
    {
        $this->cstUpdatedDateFilterType = $cstUpdatedDateFilterType;

        return $this;
    }

    /**
     * Get cstUpdatedDateFilterType
     *
     * @return string 
     */
    public function getCstUpdatedDateFilterType()
    {
        return $this->cstUpdatedDateFilterType;
    }

    /**
     * Set cstUpdatedDateTimePeriod
     *
     * @param integer $cstUpdatedDateTimePeriod
     * @return CustomFilter
     */
    public function setCstUpdatedDateTimePeriod($cstUpdatedDateTimePeriod)
    {
        $this->cstUpdatedDateTimePeriod = $cstUpdatedDateTimePeriod;

        return $this;
    }

    /**
     * Get cstUpdatedDateTimePeriod
     *
     * @return integer 
     */
    public function getCstUpdatedDateTimePeriod()
    {
        return $this->cstUpdatedDateTimePeriod;
    }

    /**
     * Set cstUpdatedDateEnd
     *
     * @param \DateTime $cstUpdatedDateEnd
     * @return CustomFilter
     */
    public function setCstUpdatedDateEnd($cstUpdatedDateEnd)
    {
        $this->cstUpdatedDateEnd = $cstUpdatedDateEnd;

        return $this;
    }

    /**
     * Get cstUpdatedDateEnd
     *
     * @return \DateTime 
     */
    public function getCstUpdatedDateEnd()
    {
        return $this->cstUpdatedDateEnd;
    }

    /**
     * Set cstLastResponseDate
     *
     * @param \DateTime $cstLastResponseDate
     * @return CustomFilter
     */
    public function setCstLastResponseDate($cstLastResponseDate)
    {
        $this->cstLastResponseDate = $cstLastResponseDate;

        return $this;
    }

    /**
     * Get cstLastResponseDate
     *
     * @return \DateTime 
     */
    public function getCstLastResponseDate()
    {
        return $this->cstLastResponseDate;
    }

    /**
     * Set cstLastResponseDateFilterType
     *
     * @param string $cstLastResponseDateFilterType
     * @return CustomFilter
     */
    public function setCstLastResponseDateFilterType($cstLastResponseDateFilterType)
    {
        $this->cstLastResponseDateFilterType = $cstLastResponseDateFilterType;

        return $this;
    }

    /**
     * Get cstLastResponseDateFilterType
     *
     * @return string 
     */
    public function getCstLastResponseDateFilterType()
    {
        return $this->cstLastResponseDateFilterType;
    }

    /**
     * Set cstLastResponseDateTimePeriod
     *
     * @param integer $cstLastResponseDateTimePeriod
     * @return CustomFilter
     */
    public function setCstLastResponseDateTimePeriod($cstLastResponseDateTimePeriod)
    {
        $this->cstLastResponseDateTimePeriod = $cstLastResponseDateTimePeriod;

        return $this;
    }

    /**
     * Get cstLastResponseDateTimePeriod
     *
     * @return integer 
     */
    public function getCstLastResponseDateTimePeriod()
    {
        return $this->cstLastResponseDateTimePeriod;
    }

    /**
     * Set cstLastResponseDateEnd
     *
     * @param \DateTime $cstLastResponseDateEnd
     * @return CustomFilter
     */
    public function setCstLastResponseDateEnd($cstLastResponseDateEnd)
    {
        $this->cstLastResponseDateEnd = $cstLastResponseDateEnd;

        return $this;
    }

    /**
     * Get cstLastResponseDateEnd
     *
     * @return \DateTime 
     */
    public function getCstLastResponseDateEnd()
    {
        return $this->cstLastResponseDateEnd;
    }

    /**
     * Set cstFirstResponseDate
     *
     * @param \DateTime $cstFirstResponseDate
     * @return CustomFilter
     */
    public function setCstFirstResponseDate($cstFirstResponseDate)
    {
        $this->cstFirstResponseDate = $cstFirstResponseDate;

        return $this;
    }

    /**
     * Get cstFirstResponseDate
     *
     * @return \DateTime 
     */
    public function getCstFirstResponseDate()
    {
        return $this->cstFirstResponseDate;
    }

    /**
     * Set cstFirstResponseDateFilterType
     *
     * @param string $cstFirstResponseDateFilterType
     * @return CustomFilter
     */
    public function setCstFirstResponseDateFilterType($cstFirstResponseDateFilterType)
    {
        $this->cstFirstResponseDateFilterType = $cstFirstResponseDateFilterType;

        return $this;
    }

    /**
     * Get cstFirstResponseDateFilterType
     *
     * @return string 
     */
    public function getCstFirstResponseDateFilterType()
    {
        return $this->cstFirstResponseDateFilterType;
    }

    /**
     * Set cstFirstResponseDateTimePeriod
     *
     * @param integer $cstFirstResponseDateTimePeriod
     * @return CustomFilter
     */
    public function setCstFirstResponseDateTimePeriod($cstFirstResponseDateTimePeriod)
    {
        $this->cstFirstResponseDateTimePeriod = $cstFirstResponseDateTimePeriod;

        return $this;
    }

    /**
     * Get cstFirstResponseDateTimePeriod
     *
     * @return integer 
     */
    public function getCstFirstResponseDateTimePeriod()
    {
        return $this->cstFirstResponseDateTimePeriod;
    }

    /**
     * Set cstFirstResponseDateEnd
     *
     * @param \DateTime $cstFirstResponseDateEnd
     * @return CustomFilter
     */
    public function setCstFirstResponseDateEnd($cstFirstResponseDateEnd)
    {
        $this->cstFirstResponseDateEnd = $cstFirstResponseDateEnd;

        return $this;
    }

    /**
     * Get cstFirstResponseDateEnd
     *
     * @return \DateTime 
     */
    public function getCstFirstResponseDateEnd()
    {
        return $this->cstFirstResponseDateEnd;
    }

    /**
     * Set cstClosedDate
     *
     * @param \DateTime $cstClosedDate
     * @return CustomFilter
     */
    public function setCstClosedDate($cstClosedDate)
    {
        $this->cstClosedDate = $cstClosedDate;

        return $this;
    }

    /**
     * Get cstClosedDate
     *
     * @return \DateTime 
     */
    public function getCstClosedDate()
    {
        return $this->cstClosedDate;
    }

    /**
     * Set cstClosedDateFilterType
     *
     * @param string $cstClosedDateFilterType
     * @return CustomFilter
     */
    public function setCstClosedDateFilterType($cstClosedDateFilterType)
    {
        $this->cstClosedDateFilterType = $cstClosedDateFilterType;

        return $this;
    }

    /**
     * Get cstClosedDateFilterType
     *
     * @return string 
     */
    public function getCstClosedDateFilterType()
    {
        return $this->cstClosedDateFilterType;
    }

    /**
     * Set cstClosedDateTimePeriod
     *
     * @param integer $cstClosedDateTimePeriod
     * @return CustomFilter
     */
    public function setCstClosedDateTimePeriod($cstClosedDateTimePeriod)
    {
        $this->cstClosedDateTimePeriod = $cstClosedDateTimePeriod;

        return $this;
    }

    /**
     * Get cstClosedDateTimePeriod
     *
     * @return integer 
     */
    public function getCstClosedDateTimePeriod()
    {
        return $this->cstClosedDateTimePeriod;
    }

    /**
     * Set cstClosedDateEnd
     *
     * @param \DateTime $cstClosedDateEnd
     * @return CustomFilter
     */
    public function setCstClosedDateEnd($cstClosedDateEnd)
    {
        $this->cstClosedDateEnd = $cstClosedDateEnd;

        return $this;
    }

    /**
     * Get cstClosedDateEnd
     *
     * @return \DateTime 
     */
    public function getCstClosedDateEnd()
    {
        return $this->cstClosedDateEnd;
    }

    /**
     * Set cstRows
     *
     * @param string $cstRows
     * @return CustomFilter
     */
    public function setCstRows($cstRows)
    {
        $this->cstRows = $cstRows;

        return $this;
    }

    /**
     * Get cstRows
     *
     * @return string 
     */
    public function getCstRows()
    {
        return $this->cstRows;
    }

    /**
     * Set cstSortBy
     *
     * @param string $cstSortBy
     * @return CustomFilter
     */
    public function setCstSortBy($cstSortBy)
    {
        $this->cstSortBy = $cstSortBy;

        return $this;
    }

    /**
     * Get cstSortBy
     *
     * @return string 
     */
    public function getCstSortBy()
    {
        return $this->cstSortBy;
    }

    /**
     * Set cstSortOrder
     *
     * @param string $cstSortOrder
     * @return CustomFilter
     */
    public function setCstSortOrder($cstSortOrder)
    {
        $this->cstSortOrder = $cstSortOrder;

        return $this;
    }

    /**
     * Get cstSortOrder
     *
     * @return string 
     */
    public function getCstSortOrder()
    {
        return $this->cstSortOrder;
    }

    /**
     * Set cstHideClosed
     *
     * @param integer $cstHideClosed
     * @return CustomFilter
     */
    public function setCstHideClosed($cstHideClosed)
    {
        $this->cstHideClosed = $cstHideClosed;

        return $this;
    }

    /**
     * Get cstHideClosed
     *
     * @return integer 
     */
    public function getCstHideClosed()
    {
        return $this->cstHideClosed;
    }

    /**
     * Set cstIsGlobal
     *
     * @param integer $cstIsGlobal
     * @return CustomFilter
     */
    public function setCstIsGlobal($cstIsGlobal)
    {
        $this->cstIsGlobal = $cstIsGlobal;

        return $this;
    }

    /**
     * Get cstIsGlobal
     *
     * @return integer 
     */
    public function getCstIsGlobal()
    {
        return $this->cstIsGlobal;
    }

    /**
     * Set cstSearchType
     *
     * @param string $cstSearchType
     * @return CustomFilter
     */
    public function setCstSearchType($cstSearchType)
    {
        $this->cstSearchType = $cstSearchType;

        return $this;
    }

    /**
     * Get cstSearchType
     *
     * @return string 
     */
    public function getCstSearchType()
    {
        return $this->cstSearchType;
    }

    /**
     * Set cstCustomField
     *
     * @param string $cstCustomField
     * @return CustomFilter
     */
    public function setCstCustomField($cstCustomField)
    {
        $this->cstCustomField = $cstCustomField;

        return $this;
    }

    /**
     * Get cstCustomField
     *
     * @return string 
     */
    public function getCstCustomField()
    {
        return $this->cstCustomField;
    }
}
