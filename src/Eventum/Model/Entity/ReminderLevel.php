<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderLevel
 *
 * @ORM\Table(name="reminder_level")
 * @ORM\Entity
 */
class ReminderLevel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rem_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $remId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rem_created_date", type="datetime", nullable=false)
     */
    private $remCreatedDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rem_rank", type="boolean", nullable=false)
     */
    private $remRank;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rem_last_updated_date", type="datetime", nullable=true)
     */
    private $remLastUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="rem_title", type="string", length=64, nullable=false)
     */
    private $remTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="rem_prj_id", type="integer", nullable=false)
     */
    private $remPrjId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rem_skip_weekend", type="boolean", nullable=false)
     */
    private $remSkipWeekend;


    /**
     * Get remId
     *
     * @return integer 
     */
    public function getRemId()
    {
        return $this->remId;
    }

    /**
     * Set remCreatedDate
     *
     * @param \DateTime $remCreatedDate
     * @return ReminderLevel
     */
    public function setRemCreatedDate($remCreatedDate)
    {
        $this->remCreatedDate = $remCreatedDate;

        return $this;
    }

    /**
     * Get remCreatedDate
     *
     * @return \DateTime 
     */
    public function getRemCreatedDate()
    {
        return $this->remCreatedDate;
    }

    /**
     * Set remRank
     *
     * @param boolean $remRank
     * @return ReminderLevel
     */
    public function setRemRank($remRank)
    {
        $this->remRank = $remRank;

        return $this;
    }

    /**
     * Get remRank
     *
     * @return boolean 
     */
    public function getRemRank()
    {
        return $this->remRank;
    }

    /**
     * Set remLastUpdatedDate
     *
     * @param \DateTime $remLastUpdatedDate
     * @return ReminderLevel
     */
    public function setRemLastUpdatedDate($remLastUpdatedDate)
    {
        $this->remLastUpdatedDate = $remLastUpdatedDate;

        return $this;
    }

    /**
     * Get remLastUpdatedDate
     *
     * @return \DateTime 
     */
    public function getRemLastUpdatedDate()
    {
        return $this->remLastUpdatedDate;
    }

    /**
     * Set remTitle
     *
     * @param string $remTitle
     * @return ReminderLevel
     */
    public function setRemTitle($remTitle)
    {
        $this->remTitle = $remTitle;

        return $this;
    }

    /**
     * Get remTitle
     *
     * @return string 
     */
    public function getRemTitle()
    {
        return $this->remTitle;
    }

    /**
     * Set remPrjId
     *
     * @param integer $remPrjId
     * @return ReminderLevel
     */
    public function setRemPrjId($remPrjId)
    {
        $this->remPrjId = $remPrjId;

        return $this;
    }

    /**
     * Get remPrjId
     *
     * @return integer 
     */
    public function getRemPrjId()
    {
        return $this->remPrjId;
    }

    /**
     * Set remSkipWeekend
     *
     * @param boolean $remSkipWeekend
     * @return ReminderLevel
     */
    public function setRemSkipWeekend($remSkipWeekend)
    {
        $this->remSkipWeekend = $remSkipWeekend;

        return $this;
    }

    /**
     * Get remSkipWeekend
     *
     * @return boolean 
     */
    public function getRemSkipWeekend()
    {
        return $this->remSkipWeekend;
    }
}
