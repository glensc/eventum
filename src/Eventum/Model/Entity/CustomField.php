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
 * CustomField
 *
 * @ORM\Table(name="custom_field")
 * @ORM\Entity
 */
class CustomField
{
    /**
     * @var int
     *
     * @ORM\Column(name="fld_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fldId;

    /**
     * @var string
     *
     * @ORM\Column(name="fld_title", type="string", length=255, nullable=false)
     */
    private $fldTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="fld_description", type="string", length=255, nullable=true)
     */
    private $fldDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="fld_type", type="string", length=8, nullable=false)
     */
    private $fldType;

    /**
     * @var int
     *
     * @ORM\Column(name="fld_report_form", type="integer", nullable=false)
     */
    private $fldReportForm;

    /**
     * @var int
     *
     * @ORM\Column(name="fld_report_form_required", type="integer", nullable=false)
     */
    private $fldReportFormRequired;

    /**
     * @var int
     *
     * @ORM\Column(name="fld_anonymous_form", type="integer", nullable=false)
     */
    private $fldAnonymousForm;

    /**
     * @var int
     *
     * @ORM\Column(name="fld_anonymous_form_required", type="integer", nullable=false)
     */
    private $fldAnonymousFormRequired;

    /**
     * @var bool
     *
     * @ORM\Column(name="fld_close_form", type="boolean", nullable=false)
     */
    private $fldCloseForm;

    /**
     * @var bool
     *
     * @ORM\Column(name="fld_close_form_required", type="boolean", nullable=false)
     */
    private $fldCloseFormRequired;

    /**
     * @var bool
     *
     * @ORM\Column(name="fld_edit_form_required", type="boolean", nullable=false)
     */
    private $fldEditFormRequired;

    /**
     * @var bool
     *
     * @ORM\Column(name="fld_list_display", type="boolean", nullable=false)
     */
    private $fldListDisplay;

    /**
     * @var bool
     *
     * @ORM\Column(name="fld_min_role", type="boolean", nullable=false)
     */
    private $fldMinRole;

    /**
     * @var bool
     *
     * @ORM\Column(name="fld_min_role_edit", type="boolean", nullable=false)
     */
    private $fldMinRoleEdit;

    /**
     * @var int
     *
     * @ORM\Column(name="fld_rank", type="smallint", nullable=false)
     */
    private $fldRank;

    /**
     * @var string
     *
     * @ORM\Column(name="fld_backend", type="string", length=255, nullable=true)
     */
    private $fldBackend;

    /**
     * @var string
     *
     * @ORM\Column(name="fld_order_by", type="string", length=20, nullable=false)
     */
    private $fldOrderBy;

    /**
     * Get fldId
     *
     * @return int
     */
    public function getFldId()
    {
        return $this->fldId;
    }

    /**
     * Set fldTitle
     *
     * @param string $fldTitle
     * @return CustomField
     */
    public function setFldTitle($fldTitle)
    {
        $this->fldTitle = $fldTitle;

        return $this;
    }

    /**
     * Get fldTitle
     *
     * @return string
     */
    public function getFldTitle()
    {
        return $this->fldTitle;
    }

    /**
     * Set fldDescription
     *
     * @param string $fldDescription
     * @return CustomField
     */
    public function setFldDescription($fldDescription)
    {
        $this->fldDescription = $fldDescription;

        return $this;
    }

    /**
     * Get fldDescription
     *
     * @return string
     */
    public function getFldDescription()
    {
        return $this->fldDescription;
    }

    /**
     * Set fldType
     *
     * @param string $fldType
     * @return CustomField
     */
    public function setFldType($fldType)
    {
        $this->fldType = $fldType;

        return $this;
    }

    /**
     * Get fldType
     *
     * @return string
     */
    public function getFldType()
    {
        return $this->fldType;
    }

    /**
     * Set fldReportForm
     *
     * @param int $fldReportForm
     * @return CustomField
     */
    public function setFldReportForm($fldReportForm)
    {
        $this->fldReportForm = $fldReportForm;

        return $this;
    }

    /**
     * Get fldReportForm
     *
     * @return int
     */
    public function getFldReportForm()
    {
        return $this->fldReportForm;
    }

    /**
     * Set fldReportFormRequired
     *
     * @param int $fldReportFormRequired
     * @return CustomField
     */
    public function setFldReportFormRequired($fldReportFormRequired)
    {
        $this->fldReportFormRequired = $fldReportFormRequired;

        return $this;
    }

    /**
     * Get fldReportFormRequired
     *
     * @return int
     */
    public function getFldReportFormRequired()
    {
        return $this->fldReportFormRequired;
    }

    /**
     * Set fldAnonymousForm
     *
     * @param int $fldAnonymousForm
     * @return CustomField
     */
    public function setFldAnonymousForm($fldAnonymousForm)
    {
        $this->fldAnonymousForm = $fldAnonymousForm;

        return $this;
    }

    /**
     * Get fldAnonymousForm
     *
     * @return int
     */
    public function getFldAnonymousForm()
    {
        return $this->fldAnonymousForm;
    }

    /**
     * Set fldAnonymousFormRequired
     *
     * @param int $fldAnonymousFormRequired
     * @return CustomField
     */
    public function setFldAnonymousFormRequired($fldAnonymousFormRequired)
    {
        $this->fldAnonymousFormRequired = $fldAnonymousFormRequired;

        return $this;
    }

    /**
     * Get fldAnonymousFormRequired
     *
     * @return int
     */
    public function getFldAnonymousFormRequired()
    {
        return $this->fldAnonymousFormRequired;
    }

    /**
     * Set fldCloseForm
     *
     * @param bool $fldCloseForm
     * @return CustomField
     */
    public function setFldCloseForm($fldCloseForm)
    {
        $this->fldCloseForm = $fldCloseForm;

        return $this;
    }

    /**
     * Get fldCloseForm
     *
     * @return bool
     */
    public function getFldCloseForm()
    {
        return $this->fldCloseForm;
    }

    /**
     * Set fldCloseFormRequired
     *
     * @param bool $fldCloseFormRequired
     * @return CustomField
     */
    public function setFldCloseFormRequired($fldCloseFormRequired)
    {
        $this->fldCloseFormRequired = $fldCloseFormRequired;

        return $this;
    }

    /**
     * Get fldCloseFormRequired
     *
     * @return bool
     */
    public function getFldCloseFormRequired()
    {
        return $this->fldCloseFormRequired;
    }

    /**
     * Set fldEditFormRequired
     *
     * @param bool $fldEditFormRequired
     * @return CustomField
     */
    public function setFldEditFormRequired($fldEditFormRequired)
    {
        $this->fldEditFormRequired = $fldEditFormRequired;

        return $this;
    }

    /**
     * Get fldEditFormRequired
     *
     * @return bool
     */
    public function getFldEditFormRequired()
    {
        return $this->fldEditFormRequired;
    }

    /**
     * Set fldListDisplay
     *
     * @param bool $fldListDisplay
     * @return CustomField
     */
    public function setFldListDisplay($fldListDisplay)
    {
        $this->fldListDisplay = $fldListDisplay;

        return $this;
    }

    /**
     * Get fldListDisplay
     *
     * @return bool
     */
    public function getFldListDisplay()
    {
        return $this->fldListDisplay;
    }

    /**
     * Set fldMinRole
     *
     * @param bool $fldMinRole
     * @return CustomField
     */
    public function setFldMinRole($fldMinRole)
    {
        $this->fldMinRole = $fldMinRole;

        return $this;
    }

    /**
     * Get fldMinRole
     *
     * @return bool
     */
    public function getFldMinRole()
    {
        return $this->fldMinRole;
    }

    /**
     * Set fldMinRoleEdit
     *
     * @param bool $fldMinRoleEdit
     * @return CustomField
     */
    public function setFldMinRoleEdit($fldMinRoleEdit)
    {
        $this->fldMinRoleEdit = $fldMinRoleEdit;

        return $this;
    }

    /**
     * Get fldMinRoleEdit
     *
     * @return bool
     */
    public function getFldMinRoleEdit()
    {
        return $this->fldMinRoleEdit;
    }

    /**
     * Set fldRank
     *
     * @param int $fldRank
     * @return CustomField
     */
    public function setFldRank($fldRank)
    {
        $this->fldRank = $fldRank;

        return $this;
    }

    /**
     * Get fldRank
     *
     * @return int
     */
    public function getFldRank()
    {
        return $this->fldRank;
    }

    /**
     * Set fldBackend
     *
     * @param string $fldBackend
     * @return CustomField
     */
    public function setFldBackend($fldBackend)
    {
        $this->fldBackend = $fldBackend;

        return $this;
    }

    /**
     * Get fldBackend
     *
     * @return string
     */
    public function getFldBackend()
    {
        return $this->fldBackend;
    }

    /**
     * Set fldOrderBy
     *
     * @param string $fldOrderBy
     * @return CustomField
     */
    public function setFldOrderBy($fldOrderBy)
    {
        $this->fldOrderBy = $fldOrderBy;

        return $this;
    }

    /**
     * Get fldOrderBy
     *
     * @return string
     */
    public function getFldOrderBy()
    {
        return $this->fldOrderBy;
    }
}
