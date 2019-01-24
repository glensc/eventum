<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueUserReplier
 *
 * @ORM\Table(name="issue_user_replier", indexes={@ORM\Index(name="iur_usr_id", columns={"iur_usr_id"}), @ORM\Index(name="iur_iss_id", columns={"iur_iss_id"})})
 * @ORM\Entity
 */
class IssueUserReplier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iur_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iurId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iur_iss_id", type="integer", nullable=false)
     */
    private $iurIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="iur_usr_id", type="integer", nullable=false)
     */
    private $iurUsrId;

    /**
     * @var string
     *
     * @ORM\Column(name="iur_email", type="string", length=255, nullable=true)
     */
    private $iurEmail;


    /**
     * Get iurId
     *
     * @return integer
     */
    public function getIurId()
    {
        return $this->iurId;
    }

    /**
     * Set iurIssId
     *
     * @param integer $iurIssId
     * @return IssueUserReplier
     */
    public function setIurIssId($iurIssId)
    {
        $this->iurIssId = $iurIssId;

        return $this;
    }

    /**
     * Get iurIssId
     *
     * @return integer
     */
    public function getIurIssId()
    {
        return $this->iurIssId;
    }

    /**
     * Set iurUsrId
     *
     * @param integer $iurUsrId
     * @return IssueUserReplier
     */
    public function setIurUsrId($iurUsrId)
    {
        $this->iurUsrId = $iurUsrId;

        return $this;
    }

    /**
     * Get iurUsrId
     *
     * @return integer
     */
    public function getIurUsrId()
    {
        return $this->iurUsrId;
    }

    /**
     * Set iurEmail
     *
     * @param string $iurEmail
     * @return IssueUserReplier
     */
    public function setIurEmail($iurEmail)
    {
        $this->iurEmail = $iurEmail;

        return $this;
    }

    /**
     * Get iurEmail
     *
     * @return string
     */
    public function getIurEmail()
    {
        return $this->iurEmail;
    }
}
