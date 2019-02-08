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
 * IssueUserReplier
 *
 * @ORM\Table(name="issue_user_replier", indexes={@ORM\Index(name="iur_usr_id", columns={"iur_usr_id"}), @ORM\Index(name="iur_iss_id", columns={"iur_iss_id"})})
 * @ORM\Entity
 */
class IssueUserReplier
{
    /**
     * @var int
     *
     * @ORM\Column(name="iur_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iurId;

    /**
     * @var int
     *
     * @ORM\Column(name="iur_iss_id", type="integer", nullable=false)
     */
    private $iurIssId;

    /**
     * @var int
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
     * @return int
     */
    public function getIurId()
    {
        return $this->iurId;
    }

    /**
     * Set iurIssId
     *
     * @param int $iurIssId
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
     * @return int
     */
    public function getIurIssId()
    {
        return $this->iurIssId;
    }

    /**
     * Set iurUsrId
     *
     * @param int $iurUsrId
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
     * @return int
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
