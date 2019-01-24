<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MailQueueLog
 *
 * @ORM\Table(name="mail_queue_log", indexes={@ORM\Index(name="mql_maq_id", columns={"mql_maq_id"})})
 * @ORM\Entity
 */
class MailQueueLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="mql_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mqlId;

    /**
     * @var integer
     *
     * @ORM\Column(name="mql_maq_id", type="integer", nullable=false)
     */
    private $mqlMaqId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mql_created_date", type="datetime", nullable=false)
     */
    private $mqlCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="mql_status", type="string", length=8, nullable=false)
     */
    private $mqlStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="mql_server_message", type="text", length=65535, nullable=true)
     */
    private $mqlServerMessage;


    /**
     * Get mqlId
     *
     * @return integer
     */
    public function getMqlId()
    {
        return $this->mqlId;
    }

    /**
     * Set mqlMaqId
     *
     * @param integer $mqlMaqId
     * @return MailQueueLog
     */
    public function setMqlMaqId($mqlMaqId)
    {
        $this->mqlMaqId = $mqlMaqId;

        return $this;
    }

    /**
     * Get mqlMaqId
     *
     * @return integer
     */
    public function getMqlMaqId()
    {
        return $this->mqlMaqId;
    }

    /**
     * Set mqlCreatedDate
     *
     * @param \DateTime $mqlCreatedDate
     * @return MailQueueLog
     */
    public function setMqlCreatedDate($mqlCreatedDate)
    {
        $this->mqlCreatedDate = $mqlCreatedDate;

        return $this;
    }

    /**
     * Get mqlCreatedDate
     *
     * @return \DateTime
     */
    public function getMqlCreatedDate()
    {
        return $this->mqlCreatedDate;
    }

    /**
     * Set mqlStatus
     *
     * @param string $mqlStatus
     * @return MailQueueLog
     */
    public function setMqlStatus($mqlStatus)
    {
        $this->mqlStatus = $mqlStatus;

        return $this;
    }

    /**
     * Get mqlStatus
     *
     * @return string
     */
    public function getMqlStatus()
    {
        return $this->mqlStatus;
    }

    /**
     * Set mqlServerMessage
     *
     * @param string $mqlServerMessage
     * @return MailQueueLog
     */
    public function setMqlServerMessage($mqlServerMessage)
    {
        $this->mqlServerMessage = $mqlServerMessage;

        return $this;
    }

    /**
     * Get mqlServerMessage
     *
     * @return string
     */
    public function getMqlServerMessage()
    {
        return $this->mqlServerMessage;
    }
}
