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
 * CustomFilter
 *
 * @ORM\Table(name="custom_filter", indexes={@ORM\Index(name="cst_usr_id", columns={"cst_usr_id", "cst_prj_id"})})
 * @ORM\Entity
 */
class CustomFilter
{
    /**
     * @var int
     *
     * @ORM\Column(name="cst_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cstId;

    /**
     * @var int
     *
     * @ORM\Column(name="cst_usr_id", type="integer", nullable=false)
     */
    private $cstUsrId;

    /**
     * @var int
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
     * @var string
     *
     * @ORM\Column(name="cst_priorities", type="string", length=255, nullable=true)
     */
    private $cstPriorities;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_severities", type="string", length=255, nullable=true)
     */
    private $cstSeverities;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_keywords", type="string", length=64, nullable=true)
     */
    private $cstKeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_users", type="string", length=255, nullable=true)
     */
    private $cstUsers;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_reporters", type="string", length=255, nullable=true)
     */
    private $cstReporters;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_categories", type="string", length=255, nullable=true)
     */
    private $cstCategories;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_statuses", type="string", length=255, nullable=true)
     */
    private $cstStatuses;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_releases", type="string", length=255, nullable=true)
     */
    private $cstReleases;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_products", type="string", length=255, nullable=true)
     */
    private $cstProducts;

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
     * @var int
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
     * @var int
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
     * @var int
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
     * @var int
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
     * @var int
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
     * @var int
     *
     * @ORM\Column(name="cst_hide_closed", type="integer", nullable=true)
     */
    private $cstHideClosed;

    /**
     * @var int
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
     * @return int
     */
    public function getCstId()
    {
        return $this->cstId;
    }

    /**
     * Set cstUsrId
     *
     * @param int $cstUsrId
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
     * @return int
     */
    public function getCstUsrId()
    {
        return $this->cstUsrId;
    }

    /**
     * Set cstPrjId
     *
     * @param int $cstPrjId
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
     * @return int
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
     * Set cstPriorities
     *
     * @param string $cstPriorities
     * @return CustomFilter
     */
    public function setCstPriorities($cstPriorities)
    {
        $this->cstPriorities = $cstPriorities;

        return $this;
    }

    /**
     * Get cstPriorities
     *
     * @return string
     */
    public function getCstPriorities()
    {
        return $this->cstPriorities;
    }

    /**
     * Set cstSeverities
     *
     * @param string $cstSeverities
     * @return CustomFilter
     */
    public function setCstSeverities($cstSeverities)
    {
        $this->cstSeverities = $cstSeverities;

        return $this;
    }

    /**
     * Get cstSeverities
     *
     * @return string
     */
    public function getCstSeverities()
    {
        return $this->cstSeverities;
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
     * Set cstReporters
     *
     * @param string $cstReporters
     * @return CustomFilter
     */
    public function setCstReporters($cstReporters)
    {
        $this->cstReporters = $cstReporters;

        return $this;
    }

    /**
     * Get cstReporters
     *
     * @return string
     */
    public function getCstReporters()
    {
        return $this->cstReporters;
    }

    /**
     * Set cstCategories
     *
     * @param string $cstCategories
     * @return CustomFilter
     */
    public function setCstCategories($cstCategories)
    {
        $this->cstCategories = $cstCategories;

        return $this;
    }

    /**
     * Get cstCategories
     *
     * @return string
     */
    public function getCstCategories()
    {
        return $this->cstCategories;
    }

    /**
     * Set cstStatuses
     *
     * @param string $cstStatuses
     * @return CustomFilter
     */
    public function setCstStatuses($cstStatuses)
    {
        $this->cstStatuses = $cstStatuses;

        return $this;
    }

    /**
     * Get cstStatuses
     *
     * @return string
     */
    public function getCstStatuses()
    {
        return $this->cstStatuses;
    }

    /**
     * Set cstReleases
     *
     * @param string $cstReleases
     * @return CustomFilter
     */
    public function setCstReleases($cstReleases)
    {
        $this->cstReleases = $cstReleases;

        return $this;
    }

    /**
     * Get cstReleases
     *
     * @return string
     */
    public function getCstReleases()
    {
        return $this->cstReleases;
    }

    /**
     * Set cstProducts
     *
     * @param string $cstProducts
     * @return CustomFilter
     */
    public function setCstProducts($cstProducts)
    {
        $this->cstProducts = $cstProducts;

        return $this;
    }

    /**
     * Get cstProducts
     *
     * @return string
     */
    public function getCstProducts()
    {
        return $this->cstProducts;
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
     * @param int $cstCreatedDateTimePeriod
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
     * @return int
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
     * @param int $cstUpdatedDateTimePeriod
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
     * @return int
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
     * @param int $cstLastResponseDateTimePeriod
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
     * @return int
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
     * @param int $cstFirstResponseDateTimePeriod
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
     * @return int
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
     * @param int $cstClosedDateTimePeriod
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
     * @return int
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
     * @param int $cstHideClosed
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
     * @return int
     */
    public function getCstHideClosed()
    {
        return $this->cstHideClosed;
    }

    /**
     * Set cstIsGlobal
     *
     * @param int $cstIsGlobal
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
     * @return int
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
