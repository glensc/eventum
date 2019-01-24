<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeTrackingCategory
 *
 * @ORM\Table(name="time_tracking_category", indexes={@ORM\Index(name="ttc_title", columns={"ttc_prj_id", "ttc_title"})})
 * @ORM\Entity
 */
class TimeTrackingCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ttc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ttcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ttc_prj_id", type="integer", nullable=false)
     */
    private $ttcPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="ttc_title", type="string", length=128, nullable=false)
     */
    private $ttcTitle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ttc_created_date", type="datetime", nullable=false)
     */
    private $ttcCreatedDate;


    /**
     * Get ttcId
     *
     * @return integer
     */
    public function getTtcId()
    {
        return $this->ttcId;
    }

    /**
     * Set ttcPrjId
     *
     * @param integer $ttcPrjId
     * @return TimeTrackingCategory
     */
    public function setTtcPrjId($ttcPrjId)
    {
        $this->ttcPrjId = $ttcPrjId;

        return $this;
    }

    /**
     * Get ttcPrjId
     *
     * @return integer
     */
    public function getTtcPrjId()
    {
        return $this->ttcPrjId;
    }

    /**
     * Set ttcTitle
     *
     * @param string $ttcTitle
     * @return TimeTrackingCategory
     */
    public function setTtcTitle($ttcTitle)
    {
        $this->ttcTitle = $ttcTitle;

        return $this;
    }

    /**
     * Get ttcTitle
     *
     * @return string
     */
    public function getTtcTitle()
    {
        return $this->ttcTitle;
    }

    /**
     * Set ttcCreatedDate
     *
     * @param \DateTime $ttcCreatedDate
     * @return TimeTrackingCategory
     */
    public function setTtcCreatedDate($ttcCreatedDate)
    {
        $this->ttcCreatedDate = $ttcCreatedDate;

        return $this;
    }

    /**
     * Get ttcCreatedDate
     *
     * @return \DateTime
     */
    public function getTtcCreatedDate()
    {
        return $this->ttcCreatedDate;
    }
}
