<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueAccessList
 *
 * @ORM\Table(name="issue_access_list", indexes={@ORM\Index(name="ial_iss_id", columns={"ial_iss_id", "ial_usr_id"})})
 * @ORM\Entity
 */
class IssueAccessList
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ial_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ialId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ial_iss_id", type="integer", nullable=false)
     */
    private $ialIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ial_usr_id", type="integer", nullable=false)
     */
    private $ialUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ial_created", type="datetime", nullable=false)
     */
    private $ialCreated;


    /**
     * Get ialId
     *
     * @return integer
     */
    public function getIalId()
    {
        return $this->ialId;
    }

    /**
     * Set ialIssId
     *
     * @param integer $ialIssId
     * @return IssueAccessList
     */
    public function setIalIssId($ialIssId)
    {
        $this->ialIssId = $ialIssId;

        return $this;
    }

    /**
     * Get ialIssId
     *
     * @return integer
     */
    public function getIalIssId()
    {
        return $this->ialIssId;
    }

    /**
     * Set ialUsrId
     *
     * @param integer $ialUsrId
     * @return IssueAccessList
     */
    public function setIalUsrId($ialUsrId)
    {
        $this->ialUsrId = $ialUsrId;

        return $this;
    }

    /**
     * Get ialUsrId
     *
     * @return integer
     */
    public function getIalUsrId()
    {
        return $this->ialUsrId;
    }

    /**
     * Set ialCreated
     *
     * @param \DateTime $ialCreated
     * @return IssueAccessList
     */
    public function setIalCreated($ialCreated)
    {
        $this->ialCreated = $ialCreated;

        return $this;
    }

    /**
     * Get ialCreated
     *
     * @return \DateTime
     */
    public function getIalCreated()
    {
        return $this->ialCreated;
    }
}
