<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueAttachment
 *
 * @ORM\Table(name="issue_attachment", indexes={@ORM\Index(name="iat_iss_id", columns={"iat_iss_id", "iat_usr_id"})})
 * @ORM\Entity
 */
class IssueAttachment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iatId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iat_iss_id", type="integer", nullable=false)
     */
    private $iatIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iat_usr_id", type="integer", nullable=false)
     */
    private $iatUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iat_min_role", type="integer", nullable=false)
     */
    private $iatMinRole;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="iat_created_date", type="datetime", nullable=false)
     */
    private $iatCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="iat_description", type="text", length=65535, nullable=true)
     */
    private $iatDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="iat_unknown_user", type="string", length=255, nullable=true)
     */
    private $iatUnknownUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="iat_not_id", type="integer", nullable=true)
     */
    private $iatNotId;


    /**
     * Get iatId
     *
     * @return integer
     */
    public function getIatId()
    {
        return $this->iatId;
    }

    /**
     * Set iatIssId
     *
     * @param integer $iatIssId
     * @return IssueAttachment
     */
    public function setIatIssId($iatIssId)
    {
        $this->iatIssId = $iatIssId;

        return $this;
    }

    /**
     * Get iatIssId
     *
     * @return integer
     */
    public function getIatIssId()
    {
        return $this->iatIssId;
    }

    /**
     * Set iatUsrId
     *
     * @param integer $iatUsrId
     * @return IssueAttachment
     */
    public function setIatUsrId($iatUsrId)
    {
        $this->iatUsrId = $iatUsrId;

        return $this;
    }

    /**
     * Get iatUsrId
     *
     * @return integer
     */
    public function getIatUsrId()
    {
        return $this->iatUsrId;
    }

    /**
     * Set iatMinRole
     *
     * @param integer $iatMinRole
     * @return IssueAttachment
     */
    public function setIatMinRole($iatMinRole)
    {
        $this->iatMinRole = $iatMinRole;

        return $this;
    }

    /**
     * Get iatMinRole
     *
     * @return integer
     */
    public function getIatMinRole()
    {
        return $this->iatMinRole;
    }

    /**
     * Set iatCreatedDate
     *
     * @param \DateTime $iatCreatedDate
     * @return IssueAttachment
     */
    public function setIatCreatedDate($iatCreatedDate)
    {
        $this->iatCreatedDate = $iatCreatedDate;

        return $this;
    }

    /**
     * Get iatCreatedDate
     *
     * @return \DateTime
     */
    public function getIatCreatedDate()
    {
        return $this->iatCreatedDate;
    }

    /**
     * Set iatDescription
     *
     * @param string $iatDescription
     * @return IssueAttachment
     */
    public function setIatDescription($iatDescription)
    {
        $this->iatDescription = $iatDescription;

        return $this;
    }

    /**
     * Get iatDescription
     *
     * @return string
     */
    public function getIatDescription()
    {
        return $this->iatDescription;
    }

    /**
     * Set iatUnknownUser
     *
     * @param string $iatUnknownUser
     * @return IssueAttachment
     */
    public function setIatUnknownUser($iatUnknownUser)
    {
        $this->iatUnknownUser = $iatUnknownUser;

        return $this;
    }

    /**
     * Get iatUnknownUser
     *
     * @return string
     */
    public function getIatUnknownUser()
    {
        return $this->iatUnknownUser;
    }

    /**
     * Set iatNotId
     *
     * @param integer $iatNotId
     * @return IssueAttachment
     */
    public function setIatNotId($iatNotId)
    {
        $this->iatNotId = $iatNotId;

        return $this;
    }

    /**
     * Get iatNotId
     *
     * @return integer
     */
    public function getIatNotId()
    {
        return $this->iatNotId;
    }
}
