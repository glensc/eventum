<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderRequirement
 *
 * @ORM\Table(name="reminder_requirement")
 * @ORM\Entity
 */
class ReminderRequirement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rer_rem_id", type="integer", nullable=false)
     */
    private $rerRemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rer_iss_id", type="integer", nullable=true)
     */
    private $rerIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rer_support_level_id", type="integer", nullable=true)
     */
    private $rerSupportLevelId;

    /**
     * @var string
     *
     * @ORM\Column(name="rer_customer_id", type="string", length=128, nullable=true)
     */
    private $rerCustomerId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rer_trigger_all_issues", type="boolean", nullable=false)
     */
    private $rerTriggerAllIssues;


    /**
     * Get rerId
     *
     * @return integer
     */
    public function getRerId()
    {
        return $this->rerId;
    }

    /**
     * Set rerRemId
     *
     * @param integer $rerRemId
     * @return ReminderRequirement
     */
    public function setRerRemId($rerRemId)
    {
        $this->rerRemId = $rerRemId;

        return $this;
    }

    /**
     * Get rerRemId
     *
     * @return integer
     */
    public function getRerRemId()
    {
        return $this->rerRemId;
    }

    /**
     * Set rerIssId
     *
     * @param integer $rerIssId
     * @return ReminderRequirement
     */
    public function setRerIssId($rerIssId)
    {
        $this->rerIssId = $rerIssId;

        return $this;
    }

    /**
     * Get rerIssId
     *
     * @return integer
     */
    public function getRerIssId()
    {
        return $this->rerIssId;
    }

    /**
     * Set rerSupportLevelId
     *
     * @param integer $rerSupportLevelId
     * @return ReminderRequirement
     */
    public function setRerSupportLevelId($rerSupportLevelId)
    {
        $this->rerSupportLevelId = $rerSupportLevelId;

        return $this;
    }

    /**
     * Get rerSupportLevelId
     *
     * @return integer
     */
    public function getRerSupportLevelId()
    {
        return $this->rerSupportLevelId;
    }

    /**
     * Set rerCustomerId
     *
     * @param string $rerCustomerId
     * @return ReminderRequirement
     */
    public function setRerCustomerId($rerCustomerId)
    {
        $this->rerCustomerId = $rerCustomerId;

        return $this;
    }

    /**
     * Get rerCustomerId
     *
     * @return string
     */
    public function getRerCustomerId()
    {
        return $this->rerCustomerId;
    }

    /**
     * Set rerTriggerAllIssues
     *
     * @param boolean $rerTriggerAllIssues
     * @return ReminderRequirement
     */
    public function setRerTriggerAllIssues($rerTriggerAllIssues)
    {
        $this->rerTriggerAllIssues = $rerTriggerAllIssues;

        return $this;
    }

    /**
     * Get rerTriggerAllIssues
     *
     * @return boolean
     */
    public function getRerTriggerAllIssues()
    {
        return $this->rerTriggerAllIssues;
    }
}
