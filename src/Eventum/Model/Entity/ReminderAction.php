<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderAction
 *
 * @ORM\Table(name="reminder_action")
 * @ORM\Entity
 */
class ReminderAction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rma_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rma_rem_id", type="integer", nullable=false)
     */
    private $rmaRemId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rma_rmt_id", type="boolean", nullable=false)
     */
    private $rmaRmtId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rma_created_date", type="datetime", nullable=false)
     */
    private $rmaCreatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rma_last_updated_date", type="datetime", nullable=true)
     */
    private $rmaLastUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="rma_title", type="string", length=64, nullable=false)
     */
    private $rmaTitle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rma_rank", type="boolean", nullable=false)
     */
    private $rmaRank;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rma_alert_irc", type="boolean", nullable=false)
     */
    private $rmaAlertIrc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rma_alert_group_leader", type="boolean", nullable=false)
     */
    private $rmaAlertGroupLeader;

    /**
     * @var string
     *
     * @ORM\Column(name="rma_boilerplate", type="string", length=255, nullable=true)
     */
    private $rmaBoilerplate;


    /**
     * Get rmaId
     *
     * @return integer
     */
    public function getRmaId()
    {
        return $this->rmaId;
    }

    /**
     * Set rmaRemId
     *
     * @param integer $rmaRemId
     * @return ReminderAction
     */
    public function setRmaRemId($rmaRemId)
    {
        $this->rmaRemId = $rmaRemId;

        return $this;
    }

    /**
     * Get rmaRemId
     *
     * @return integer
     */
    public function getRmaRemId()
    {
        return $this->rmaRemId;
    }

    /**
     * Set rmaRmtId
     *
     * @param boolean $rmaRmtId
     * @return ReminderAction
     */
    public function setRmaRmtId($rmaRmtId)
    {
        $this->rmaRmtId = $rmaRmtId;

        return $this;
    }

    /**
     * Get rmaRmtId
     *
     * @return boolean
     */
    public function getRmaRmtId()
    {
        return $this->rmaRmtId;
    }

    /**
     * Set rmaCreatedDate
     *
     * @param \DateTime $rmaCreatedDate
     * @return ReminderAction
     */
    public function setRmaCreatedDate($rmaCreatedDate)
    {
        $this->rmaCreatedDate = $rmaCreatedDate;

        return $this;
    }

    /**
     * Get rmaCreatedDate
     *
     * @return \DateTime
     */
    public function getRmaCreatedDate()
    {
        return $this->rmaCreatedDate;
    }

    /**
     * Set rmaLastUpdatedDate
     *
     * @param \DateTime $rmaLastUpdatedDate
     * @return ReminderAction
     */
    public function setRmaLastUpdatedDate($rmaLastUpdatedDate)
    {
        $this->rmaLastUpdatedDate = $rmaLastUpdatedDate;

        return $this;
    }

    /**
     * Get rmaLastUpdatedDate
     *
     * @return \DateTime
     */
    public function getRmaLastUpdatedDate()
    {
        return $this->rmaLastUpdatedDate;
    }

    /**
     * Set rmaTitle
     *
     * @param string $rmaTitle
     * @return ReminderAction
     */
    public function setRmaTitle($rmaTitle)
    {
        $this->rmaTitle = $rmaTitle;

        return $this;
    }

    /**
     * Get rmaTitle
     *
     * @return string
     */
    public function getRmaTitle()
    {
        return $this->rmaTitle;
    }

    /**
     * Set rmaRank
     *
     * @param boolean $rmaRank
     * @return ReminderAction
     */
    public function setRmaRank($rmaRank)
    {
        $this->rmaRank = $rmaRank;

        return $this;
    }

    /**
     * Get rmaRank
     *
     * @return boolean
     */
    public function getRmaRank()
    {
        return $this->rmaRank;
    }

    /**
     * Set rmaAlertIrc
     *
     * @param boolean $rmaAlertIrc
     * @return ReminderAction
     */
    public function setRmaAlertIrc($rmaAlertIrc)
    {
        $this->rmaAlertIrc = $rmaAlertIrc;

        return $this;
    }

    /**
     * Get rmaAlertIrc
     *
     * @return boolean
     */
    public function getRmaAlertIrc()
    {
        return $this->rmaAlertIrc;
    }

    /**
     * Set rmaAlertGroupLeader
     *
     * @param boolean $rmaAlertGroupLeader
     * @return ReminderAction
     */
    public function setRmaAlertGroupLeader($rmaAlertGroupLeader)
    {
        $this->rmaAlertGroupLeader = $rmaAlertGroupLeader;

        return $this;
    }

    /**
     * Get rmaAlertGroupLeader
     *
     * @return boolean
     */
    public function getRmaAlertGroupLeader()
    {
        return $this->rmaAlertGroupLeader;
    }

    /**
     * Set rmaBoilerplate
     *
     * @param string $rmaBoilerplate
     * @return ReminderAction
     */
    public function setRmaBoilerplate($rmaBoilerplate)
    {
        $this->rmaBoilerplate = $rmaBoilerplate;

        return $this;
    }

    /**
     * Get rmaBoilerplate
     *
     * @return string
     */
    public function getRmaBoilerplate()
    {
        return $this->rmaBoilerplate;
    }
}
