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
 * PhoneSupport
 *
 * @ORM\Table(name="phone_support", indexes={@ORM\Index(name="phs_iss_id", columns={"phs_iss_id"}), @ORM\Index(name="phs_usr_id", columns={"phs_usr_id"}), @ORM\Index(name="ft_phone_support", columns={"phs_description"})})
 * @ORM\Entity
 */
class PhoneSupport
{
    /**
     * @var int
     *
     * @ORM\Column(name="phs_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phsId;

    /**
     * @var int
     *
     * @ORM\Column(name="phs_usr_id", type="integer", nullable=false)
     */
    private $phsUsrId;

    /**
     * @var int
     *
     * @ORM\Column(name="phs_iss_id", type="integer", nullable=false)
     */
    private $phsIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="phs_ttr_id", type="integer", nullable=true)
     */
    private $phsTtrId;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_call_from_lname", type="string", length=64, nullable=true)
     */
    private $phsCallFromLname;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_call_from_fname", type="string", length=64, nullable=true)
     */
    private $phsCallFromFname;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_call_to_lname", type="string", length=64, nullable=true)
     */
    private $phsCallToLname;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_call_to_fname", type="string", length=64, nullable=true)
     */
    private $phsCallToFname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="phs_created_date", type="datetime", nullable=false)
     */
    private $phsCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_type", type="string", nullable=false)
     */
    private $phsType;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_phone_number", type="string", length=32, nullable=false)
     */
    private $phsPhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_phone_type", type="string", length=6, nullable=false)
     */
    private $phsPhoneType;

    /**
     * @var int
     *
     * @ORM\Column(name="phs_phc_id", type="integer", nullable=false)
     */
    private $phsPhcId;

    /**
     * @var string
     *
     * @ORM\Column(name="phs_description", type="text", length=65535, nullable=false)
     */
    private $phsDescription;

    /**
     * Get phsId
     *
     * @return int
     */
    public function getPhsId()
    {
        return $this->phsId;
    }

    /**
     * Set phsUsrId
     *
     * @param int $phsUsrId
     * @return PhoneSupport
     */
    public function setPhsUsrId($phsUsrId)
    {
        $this->phsUsrId = $phsUsrId;

        return $this;
    }

    /**
     * Get phsUsrId
     *
     * @return int
     */
    public function getPhsUsrId()
    {
        return $this->phsUsrId;
    }

    /**
     * Set phsIssId
     *
     * @param int $phsIssId
     * @return PhoneSupport
     */
    public function setPhsIssId($phsIssId)
    {
        $this->phsIssId = $phsIssId;

        return $this;
    }

    /**
     * Get phsIssId
     *
     * @return int
     */
    public function getPhsIssId()
    {
        return $this->phsIssId;
    }

    /**
     * Set phsTtrId
     *
     * @param int $phsTtrId
     * @return PhoneSupport
     */
    public function setPhsTtrId($phsTtrId)
    {
        $this->phsTtrId = $phsTtrId;

        return $this;
    }

    /**
     * Get phsTtrId
     *
     * @return int
     */
    public function getPhsTtrId()
    {
        return $this->phsTtrId;
    }

    /**
     * Set phsCallFromLname
     *
     * @param string $phsCallFromLname
     * @return PhoneSupport
     */
    public function setPhsCallFromLname($phsCallFromLname)
    {
        $this->phsCallFromLname = $phsCallFromLname;

        return $this;
    }

    /**
     * Get phsCallFromLname
     *
     * @return string
     */
    public function getPhsCallFromLname()
    {
        return $this->phsCallFromLname;
    }

    /**
     * Set phsCallFromFname
     *
     * @param string $phsCallFromFname
     * @return PhoneSupport
     */
    public function setPhsCallFromFname($phsCallFromFname)
    {
        $this->phsCallFromFname = $phsCallFromFname;

        return $this;
    }

    /**
     * Get phsCallFromFname
     *
     * @return string
     */
    public function getPhsCallFromFname()
    {
        return $this->phsCallFromFname;
    }

    /**
     * Set phsCallToLname
     *
     * @param string $phsCallToLname
     * @return PhoneSupport
     */
    public function setPhsCallToLname($phsCallToLname)
    {
        $this->phsCallToLname = $phsCallToLname;

        return $this;
    }

    /**
     * Get phsCallToLname
     *
     * @return string
     */
    public function getPhsCallToLname()
    {
        return $this->phsCallToLname;
    }

    /**
     * Set phsCallToFname
     *
     * @param string $phsCallToFname
     * @return PhoneSupport
     */
    public function setPhsCallToFname($phsCallToFname)
    {
        $this->phsCallToFname = $phsCallToFname;

        return $this;
    }

    /**
     * Get phsCallToFname
     *
     * @return string
     */
    public function getPhsCallToFname()
    {
        return $this->phsCallToFname;
    }

    /**
     * Set phsCreatedDate
     *
     * @param \DateTime $phsCreatedDate
     * @return PhoneSupport
     */
    public function setPhsCreatedDate($phsCreatedDate)
    {
        $this->phsCreatedDate = $phsCreatedDate;

        return $this;
    }

    /**
     * Get phsCreatedDate
     *
     * @return \DateTime
     */
    public function getPhsCreatedDate()
    {
        return $this->phsCreatedDate;
    }

    /**
     * Set phsType
     *
     * @param string $phsType
     * @return PhoneSupport
     */
    public function setPhsType($phsType)
    {
        $this->phsType = $phsType;

        return $this;
    }

    /**
     * Get phsType
     *
     * @return string
     */
    public function getPhsType()
    {
        return $this->phsType;
    }

    /**
     * Set phsPhoneNumber
     *
     * @param string $phsPhoneNumber
     * @return PhoneSupport
     */
    public function setPhsPhoneNumber($phsPhoneNumber)
    {
        $this->phsPhoneNumber = $phsPhoneNumber;

        return $this;
    }

    /**
     * Get phsPhoneNumber
     *
     * @return string
     */
    public function getPhsPhoneNumber()
    {
        return $this->phsPhoneNumber;
    }

    /**
     * Set phsPhoneType
     *
     * @param string $phsPhoneType
     * @return PhoneSupport
     */
    public function setPhsPhoneType($phsPhoneType)
    {
        $this->phsPhoneType = $phsPhoneType;

        return $this;
    }

    /**
     * Get phsPhoneType
     *
     * @return string
     */
    public function getPhsPhoneType()
    {
        return $this->phsPhoneType;
    }

    /**
     * Set phsPhcId
     *
     * @param int $phsPhcId
     * @return PhoneSupport
     */
    public function setPhsPhcId($phsPhcId)
    {
        $this->phsPhcId = $phsPhcId;

        return $this;
    }

    /**
     * Get phsPhcId
     *
     * @return int
     */
    public function getPhsPhcId()
    {
        return $this->phsPhcId;
    }

    /**
     * Set phsDescription
     *
     * @param string $phsDescription
     * @return PhoneSupport
     */
    public function setPhsDescription($phsDescription)
    {
        $this->phsDescription = $phsDescription;

        return $this;
    }

    /**
     * Get phsDescription
     *
     * @return string
     */
    public function getPhsDescription()
    {
        return $this->phsDescription;
    }
}
