<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueCommit
 *
 * @ORM\Table(name="issue_commit")
 * @ORM\Entity
 */
class IssueCommit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="isc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iscId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isc_iss_id", type="integer", nullable=false)
     */
    private $iscIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isc_com_id", type="integer", nullable=false)
     */
    private $iscComId;


    /**
     * Get iscId
     *
     * @return integer
     */
    public function getIscId()
    {
        return $this->iscId;
    }

    /**
     * Set iscIssId
     *
     * @param integer $iscIssId
     * @return IssueCommit
     */
    public function setIscIssId($iscIssId)
    {
        $this->iscIssId = $iscIssId;

        return $this;
    }

    /**
     * Get iscIssId
     *
     * @return integer
     */
    public function getIscIssId()
    {
        return $this->iscIssId;
    }

    /**
     * Set iscComId
     *
     * @param integer $iscComId
     * @return IssueCommit
     */
    public function setIscComId($iscComId)
    {
        $this->iscComId = $iscComId;

        return $this;
    }

    /**
     * Get iscComId
     *
     * @return integer
     */
    public function getIscComId()
    {
        return $this->iscComId;
    }
}
