<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueRequirement
 *
 * @ORM\Table(name="issue_requirement", indexes={@ORM\Index(name="isr_iss_id", columns={"isr_iss_id"}), @ORM\Index(name="isr_usr_id", columns={"isr_usr_id"}), @ORM\Index(name="isr_updated_usr_id", columns={"isr_updated_usr_id"})})
 * @ORM\Entity
 */
class IssueRequirement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="isr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $isrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isr_iss_id", type="integer", nullable=false)
     */
    private $isrIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isr_usr_id", type="integer", nullable=false)
     */
    private $isrUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isr_updated_usr_id", type="integer", nullable=true)
     */
    private $isrUpdatedUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="isr_created_date", type="datetime", nullable=false)
     */
    private $isrCreatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="isr_updated_date", type="datetime", nullable=true)
     */
    private $isrUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="isr_requirement", type="text", length=65535, nullable=false)
     */
    private $isrRequirement;

    /**
     * @var float
     *
     * @ORM\Column(name="isr_dev_time", type="float", precision=10, scale=0, nullable=true)
     */
    private $isrDevTime;

    /**
     * @var string
     *
     * @ORM\Column(name="isr_impact_analysis", type="text", length=65535, nullable=true)
     */
    private $isrImpactAnalysis;


    /**
     * Get isrId
     *
     * @return integer 
     */
    public function getIsrId()
    {
        return $this->isrId;
    }

    /**
     * Set isrIssId
     *
     * @param integer $isrIssId
     * @return IssueRequirement
     */
    public function setIsrIssId($isrIssId)
    {
        $this->isrIssId = $isrIssId;

        return $this;
    }

    /**
     * Get isrIssId
     *
     * @return integer 
     */
    public function getIsrIssId()
    {
        return $this->isrIssId;
    }

    /**
     * Set isrUsrId
     *
     * @param integer $isrUsrId
     * @return IssueRequirement
     */
    public function setIsrUsrId($isrUsrId)
    {
        $this->isrUsrId = $isrUsrId;

        return $this;
    }

    /**
     * Get isrUsrId
     *
     * @return integer 
     */
    public function getIsrUsrId()
    {
        return $this->isrUsrId;
    }

    /**
     * Set isrUpdatedUsrId
     *
     * @param integer $isrUpdatedUsrId
     * @return IssueRequirement
     */
    public function setIsrUpdatedUsrId($isrUpdatedUsrId)
    {
        $this->isrUpdatedUsrId = $isrUpdatedUsrId;

        return $this;
    }

    /**
     * Get isrUpdatedUsrId
     *
     * @return integer 
     */
    public function getIsrUpdatedUsrId()
    {
        return $this->isrUpdatedUsrId;
    }

    /**
     * Set isrCreatedDate
     *
     * @param \DateTime $isrCreatedDate
     * @return IssueRequirement
     */
    public function setIsrCreatedDate($isrCreatedDate)
    {
        $this->isrCreatedDate = $isrCreatedDate;

        return $this;
    }

    /**
     * Get isrCreatedDate
     *
     * @return \DateTime 
     */
    public function getIsrCreatedDate()
    {
        return $this->isrCreatedDate;
    }

    /**
     * Set isrUpdatedDate
     *
     * @param \DateTime $isrUpdatedDate
     * @return IssueRequirement
     */
    public function setIsrUpdatedDate($isrUpdatedDate)
    {
        $this->isrUpdatedDate = $isrUpdatedDate;

        return $this;
    }

    /**
     * Get isrUpdatedDate
     *
     * @return \DateTime 
     */
    public function getIsrUpdatedDate()
    {
        return $this->isrUpdatedDate;
    }

    /**
     * Set isrRequirement
     *
     * @param string $isrRequirement
     * @return IssueRequirement
     */
    public function setIsrRequirement($isrRequirement)
    {
        $this->isrRequirement = $isrRequirement;

        return $this;
    }

    /**
     * Get isrRequirement
     *
     * @return string 
     */
    public function getIsrRequirement()
    {
        return $this->isrRequirement;
    }

    /**
     * Set isrDevTime
     *
     * @param float $isrDevTime
     * @return IssueRequirement
     */
    public function setIsrDevTime($isrDevTime)
    {
        $this->isrDevTime = $isrDevTime;

        return $this;
    }

    /**
     * Get isrDevTime
     *
     * @return float 
     */
    public function getIsrDevTime()
    {
        return $this->isrDevTime;
    }

    /**
     * Set isrImpactAnalysis
     *
     * @param string $isrImpactAnalysis
     * @return IssueRequirement
     */
    public function setIsrImpactAnalysis($isrImpactAnalysis)
    {
        $this->isrImpactAnalysis = $isrImpactAnalysis;

        return $this;
    }

    /**
     * Get isrImpactAnalysis
     *
     * @return string 
     */
    public function getIsrImpactAnalysis()
    {
        return $this->isrImpactAnalysis;
    }
}
