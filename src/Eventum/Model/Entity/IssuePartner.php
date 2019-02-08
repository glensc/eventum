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
 * IssuePartner
 *
 * @ORM\Table(name="issue_partner")
 * @ORM\Entity
 */
class IssuePartner
{
    /**
     * @var int
     *
     * @ORM\Column(name="ipa_iss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ipaIssId;

    /**
     * @var string
     *
     * @ORM\Column(name="ipa_par_code", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ipaParCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ipa_created_date", type="datetime", nullable=false)
     */
    private $ipaCreatedDate;

    /**
     * Set ipaIssId
     *
     * @param int $ipaIssId
     * @return IssuePartner
     */
    public function setIpaIssId($ipaIssId)
    {
        $this->ipaIssId = $ipaIssId;

        return $this;
    }

    /**
     * Get ipaIssId
     *
     * @return int
     */
    public function getIpaIssId()
    {
        return $this->ipaIssId;
    }

    /**
     * Set ipaParCode
     *
     * @param string $ipaParCode
     * @return IssuePartner
     */
    public function setIpaParCode($ipaParCode)
    {
        $this->ipaParCode = $ipaParCode;

        return $this;
    }

    /**
     * Get ipaParCode
     *
     * @return string
     */
    public function getIpaParCode()
    {
        return $this->ipaParCode;
    }

    /**
     * Set ipaCreatedDate
     *
     * @param \DateTime $ipaCreatedDate
     * @return IssuePartner
     */
    public function setIpaCreatedDate($ipaCreatedDate)
    {
        $this->ipaCreatedDate = $ipaCreatedDate;

        return $this;
    }

    /**
     * Get ipaCreatedDate
     *
     * @return \DateTime
     */
    public function getIpaCreatedDate()
    {
        return $this->ipaCreatedDate;
    }
}
