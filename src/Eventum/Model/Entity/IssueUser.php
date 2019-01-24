<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueUser
 *
 * @ORM\Table(name="issue_user", indexes={@ORM\Index(name="isu_order", columns={"isu_order"}), @ORM\Index(name="isu_usr_id", columns={"isu_usr_id"}), @ORM\Index(name="isu_iss_id", columns={"isu_iss_id"})})
 * @ORM\Entity
 */
class IssueUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="isu_iss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $isuIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isu_usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $isuUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="isu_assigned_date", type="datetime", nullable=true)
     */
    private $isuAssignedDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="isu_order", type="integer", nullable=false)
     */
    private $isuOrder;


    /**
     * Set isuIssId
     *
     * @param integer $isuIssId
     * @return IssueUser
     */
    public function setIsuIssId($isuIssId)
    {
        $this->isuIssId = $isuIssId;

        return $this;
    }

    /**
     * Get isuIssId
     *
     * @return integer
     */
    public function getIsuIssId()
    {
        return $this->isuIssId;
    }

    /**
     * Set isuUsrId
     *
     * @param integer $isuUsrId
     * @return IssueUser
     */
    public function setIsuUsrId($isuUsrId)
    {
        $this->isuUsrId = $isuUsrId;

        return $this;
    }

    /**
     * Get isuUsrId
     *
     * @return integer
     */
    public function getIsuUsrId()
    {
        return $this->isuUsrId;
    }

    /**
     * Set isuAssignedDate
     *
     * @param \DateTime $isuAssignedDate
     * @return IssueUser
     */
    public function setIsuAssignedDate($isuAssignedDate)
    {
        $this->isuAssignedDate = $isuAssignedDate;

        return $this;
    }

    /**
     * Get isuAssignedDate
     *
     * @return \DateTime
     */
    public function getIsuAssignedDate()
    {
        return $this->isuAssignedDate;
    }

    /**
     * Set isuOrder
     *
     * @param integer $isuOrder
     * @return IssueUser
     */
    public function setIsuOrder($isuOrder)
    {
        $this->isuOrder = $isuOrder;

        return $this;
    }

    /**
     * Get isuOrder
     *
     * @return integer
     */
    public function getIsuOrder()
    {
        return $this->isuOrder;
    }
}
