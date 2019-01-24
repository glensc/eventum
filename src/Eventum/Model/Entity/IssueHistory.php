<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueHistory
 *
 * @ORM\Table(name="issue_history", indexes={@ORM\Index(name="his_id", columns={"his_id"}), @ORM\Index(name="his_iss_id", columns={"his_iss_id"}), @ORM\Index(name="his_created_date", columns={"his_created_date"})})
 * @ORM\Entity
 */
class IssueHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="his_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hisId;

    /**
     * @var integer
     *
     * @ORM\Column(name="his_iss_id", type="integer", nullable=false)
     */
    private $hisIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="his_usr_id", type="integer", nullable=false)
     */
    private $hisUsrId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="his_htt_id", type="boolean", nullable=false)
     */
    private $hisHttId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="his_is_hidden", type="boolean", nullable=false)
     */
    private $hisIsHidden;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="his_created_date", type="datetime", nullable=false)
     */
    private $hisCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="his_summary", type="text", length=16777215, nullable=false)
     */
    private $hisSummary;

    /**
     * @var string
     *
     * @ORM\Column(name="his_context", type="text", length=16777215, nullable=false)
     */
    private $hisContext;

    /**
     * @var boolean
     *
     * @ORM\Column(name="his_min_role", type="boolean", nullable=false)
     */
    private $hisMinRole;


    /**
     * Get hisId
     *
     * @return integer
     */
    public function getHisId()
    {
        return $this->hisId;
    }

    /**
     * Set hisIssId
     *
     * @param integer $hisIssId
     * @return IssueHistory
     */
    public function setHisIssId($hisIssId)
    {
        $this->hisIssId = $hisIssId;

        return $this;
    }

    /**
     * Get hisIssId
     *
     * @return integer
     */
    public function getHisIssId()
    {
        return $this->hisIssId;
    }

    /**
     * Set hisUsrId
     *
     * @param integer $hisUsrId
     * @return IssueHistory
     */
    public function setHisUsrId($hisUsrId)
    {
        $this->hisUsrId = $hisUsrId;

        return $this;
    }

    /**
     * Get hisUsrId
     *
     * @return integer
     */
    public function getHisUsrId()
    {
        return $this->hisUsrId;
    }

    /**
     * Set hisHttId
     *
     * @param boolean $hisHttId
     * @return IssueHistory
     */
    public function setHisHttId($hisHttId)
    {
        $this->hisHttId = $hisHttId;

        return $this;
    }

    /**
     * Get hisHttId
     *
     * @return boolean
     */
    public function getHisHttId()
    {
        return $this->hisHttId;
    }

    /**
     * Set hisIsHidden
     *
     * @param boolean $hisIsHidden
     * @return IssueHistory
     */
    public function setHisIsHidden($hisIsHidden)
    {
        $this->hisIsHidden = $hisIsHidden;

        return $this;
    }

    /**
     * Get hisIsHidden
     *
     * @return boolean
     */
    public function getHisIsHidden()
    {
        return $this->hisIsHidden;
    }

    /**
     * Set hisCreatedDate
     *
     * @param \DateTime $hisCreatedDate
     * @return IssueHistory
     */
    public function setHisCreatedDate($hisCreatedDate)
    {
        $this->hisCreatedDate = $hisCreatedDate;

        return $this;
    }

    /**
     * Get hisCreatedDate
     *
     * @return \DateTime
     */
    public function getHisCreatedDate()
    {
        return $this->hisCreatedDate;
    }

    /**
     * Set hisSummary
     *
     * @param string $hisSummary
     * @return IssueHistory
     */
    public function setHisSummary($hisSummary)
    {
        $this->hisSummary = $hisSummary;

        return $this;
    }

    /**
     * Get hisSummary
     *
     * @return string
     */
    public function getHisSummary()
    {
        return $this->hisSummary;
    }

    /**
     * Set hisContext
     *
     * @param string $hisContext
     * @return IssueHistory
     */
    public function setHisContext($hisContext)
    {
        $this->hisContext = $hisContext;

        return $this;
    }

    /**
     * Get hisContext
     *
     * @return string
     */
    public function getHisContext()
    {
        return $this->hisContext;
    }

    /**
     * Set hisMinRole
     *
     * @param boolean $hisMinRole
     * @return IssueHistory
     */
    public function setHisMinRole($hisMinRole)
    {
        $this->hisMinRole = $hisMinRole;

        return $this;
    }

    /**
     * Get hisMinRole
     *
     * @return boolean
     */
    public function getHisMinRole()
    {
        return $this->hisMinRole;
    }
}
