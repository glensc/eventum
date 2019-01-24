<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderLevelCondition
 *
 * @ORM\Table(name="reminder_level_condition")
 * @ORM\Entity
 */
class ReminderLevelCondition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rlc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rlcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rlc_rma_id", type="integer", nullable=false)
     */
    private $rlcRmaId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rlc_rmf_id", type="boolean", nullable=false)
     */
    private $rlcRmfId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rlc_rmo_id", type="boolean", nullable=false)
     */
    private $rlcRmoId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rlc_created_date", type="datetime", nullable=false)
     */
    private $rlcCreatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rlc_last_updated_date", type="datetime", nullable=true)
     */
    private $rlcLastUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="rlc_value", type="string", length=64, nullable=false)
     */
    private $rlcValue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rlc_comparison_rmf_id", type="boolean", nullable=true)
     */
    private $rlcComparisonRmfId;


    /**
     * Get rlcId
     *
     * @return integer
     */
    public function getRlcId()
    {
        return $this->rlcId;
    }

    /**
     * Set rlcRmaId
     *
     * @param integer $rlcRmaId
     * @return ReminderLevelCondition
     */
    public function setRlcRmaId($rlcRmaId)
    {
        $this->rlcRmaId = $rlcRmaId;

        return $this;
    }

    /**
     * Get rlcRmaId
     *
     * @return integer
     */
    public function getRlcRmaId()
    {
        return $this->rlcRmaId;
    }

    /**
     * Set rlcRmfId
     *
     * @param boolean $rlcRmfId
     * @return ReminderLevelCondition
     */
    public function setRlcRmfId($rlcRmfId)
    {
        $this->rlcRmfId = $rlcRmfId;

        return $this;
    }

    /**
     * Get rlcRmfId
     *
     * @return boolean
     */
    public function getRlcRmfId()
    {
        return $this->rlcRmfId;
    }

    /**
     * Set rlcRmoId
     *
     * @param boolean $rlcRmoId
     * @return ReminderLevelCondition
     */
    public function setRlcRmoId($rlcRmoId)
    {
        $this->rlcRmoId = $rlcRmoId;

        return $this;
    }

    /**
     * Get rlcRmoId
     *
     * @return boolean
     */
    public function getRlcRmoId()
    {
        return $this->rlcRmoId;
    }

    /**
     * Set rlcCreatedDate
     *
     * @param \DateTime $rlcCreatedDate
     * @return ReminderLevelCondition
     */
    public function setRlcCreatedDate($rlcCreatedDate)
    {
        $this->rlcCreatedDate = $rlcCreatedDate;

        return $this;
    }

    /**
     * Get rlcCreatedDate
     *
     * @return \DateTime
     */
    public function getRlcCreatedDate()
    {
        return $this->rlcCreatedDate;
    }

    /**
     * Set rlcLastUpdatedDate
     *
     * @param \DateTime $rlcLastUpdatedDate
     * @return ReminderLevelCondition
     */
    public function setRlcLastUpdatedDate($rlcLastUpdatedDate)
    {
        $this->rlcLastUpdatedDate = $rlcLastUpdatedDate;

        return $this;
    }

    /**
     * Get rlcLastUpdatedDate
     *
     * @return \DateTime
     */
    public function getRlcLastUpdatedDate()
    {
        return $this->rlcLastUpdatedDate;
    }

    /**
     * Set rlcValue
     *
     * @param string $rlcValue
     * @return ReminderLevelCondition
     */
    public function setRlcValue($rlcValue)
    {
        $this->rlcValue = $rlcValue;

        return $this;
    }

    /**
     * Get rlcValue
     *
     * @return string
     */
    public function getRlcValue()
    {
        return $this->rlcValue;
    }

    /**
     * Set rlcComparisonRmfId
     *
     * @param boolean $rlcComparisonRmfId
     * @return ReminderLevelCondition
     */
    public function setRlcComparisonRmfId($rlcComparisonRmfId)
    {
        $this->rlcComparisonRmfId = $rlcComparisonRmfId;

        return $this;
    }

    /**
     * Get rlcComparisonRmfId
     *
     * @return boolean
     */
    public function getRlcComparisonRmfId()
    {
        return $this->rlcComparisonRmfId;
    }
}
