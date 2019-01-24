<?php

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
     * @var integer
     *
     * @ORM\Column(name="isa_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $isaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isa_issue_id", type="integer", nullable=false)
     */
    private $isaIssueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isa_associated_id", type="integer", nullable=false)
     */
    private $isaAssociatedId;


    /**
     * Get isaId
     *
     * @return integer
     */
    public function getIsaId()
    {
        return $this->isaId;
    }

    /**
     * Set isaIssueId
     *
     * @param integer $isaIssueId
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
     * @return integer
     */
    public function getIsaIssueId()
    {
        return $this->isaIssueId;
    }

    /**
     * Set isaAssociatedId
     *
     * @param integer $isaAssociatedId
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
     * @return integer
     */
    public function getIsaAssociatedId()
    {
        return $this->isaAssociatedId;
    }
}
