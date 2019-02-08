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
 * IssueAssociation
 *
 * @ORM\Table(name="issue_association", uniqueConstraints={@ORM\UniqueConstraint(name="isa_issue_id", columns={"isa_issue_id", "isa_associated_id"})})
 * @ORM\Entity
 */
class IssueAssociation
{
    /**
     * @var int
     *
     * @ORM\Column(name="isa_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $isaId;

    /**
     * @var int
     *
     * @ORM\Column(name="isa_issue_id", type="integer", nullable=false)
     */
    private $isaIssueId;

    /**
     * @var int
     *
     * @ORM\Column(name="isa_associated_id", type="integer", nullable=false)
     */
    private $isaAssociatedId;

    /**
     * Get isaId
     *
     * @return int
     */
    public function getIsaId()
    {
        return $this->isaId;
    }

    /**
     * Set isaIssueId
     *
     * @param int $isaIssueId
     * @return IssueAssociation
     */
    public function setIsaIssueId($isaIssueId)
    {
        $this->isaIssueId = $isaIssueId;

        return $this;
    }

    /**
     * Get isaIssueId
     *
     * @return int
     */
    public function getIsaIssueId()
    {
        return $this->isaIssueId;
    }

    /**
     * Set isaAssociatedId
     *
     * @param int $isaAssociatedId
     * @return IssueAssociation
     */
    public function setIsaAssociatedId($isaAssociatedId)
    {
        $this->isaAssociatedId = $isaAssociatedId;

        return $this;
    }

    /**
     * Get isaAssociatedId
     *
     * @return int
     */
    public function getIsaAssociatedId()
    {
        return $this->isaAssociatedId;
    }
}
