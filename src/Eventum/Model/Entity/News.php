<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news", uniqueConstraints={@ORM\UniqueConstraint(name="nws_title", columns={"nws_title"})})
 * @ORM\Entity
 */
class News
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nws_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nwsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nws_usr_id", type="integer", nullable=false)
     */
    private $nwsUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="nws_created_date", type="datetime", nullable=false)
     */
    private $nwsCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="nws_title", type="string", length=255, nullable=false)
     */
    private $nwsTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="nws_message", type="text", length=65535, nullable=false)
     */
    private $nwsMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="nws_status", type="string", length=8, nullable=false)
     */
    private $nwsStatus;


    /**
     * Get nwsId
     *
     * @return integer
     */
    public function getNwsId()
    {
        return $this->nwsId;
    }

    /**
     * Set nwsUsrId
     *
     * @param integer $nwsUsrId
     * @return News
     */
    public function setNwsUsrId($nwsUsrId)
    {
        $this->nwsUsrId = $nwsUsrId;

        return $this;
    }

    /**
     * Get nwsUsrId
     *
     * @return integer
     */
    public function getNwsUsrId()
    {
        return $this->nwsUsrId;
    }

    /**
     * Set nwsCreatedDate
     *
     * @param \DateTime $nwsCreatedDate
     * @return News
     */
    public function setNwsCreatedDate($nwsCreatedDate)
    {
        $this->nwsCreatedDate = $nwsCreatedDate;

        return $this;
    }

    /**
     * Get nwsCreatedDate
     *
     * @return \DateTime
     */
    public function getNwsCreatedDate()
    {
        return $this->nwsCreatedDate;
    }

    /**
     * Set nwsTitle
     *
     * @param string $nwsTitle
     * @return News
     */
    public function setNwsTitle($nwsTitle)
    {
        $this->nwsTitle = $nwsTitle;

        return $this;
    }

    /**
     * Get nwsTitle
     *
     * @return string
     */
    public function getNwsTitle()
    {
        return $this->nwsTitle;
    }

    /**
     * Set nwsMessage
     *
     * @param string $nwsMessage
     * @return News
     */
    public function setNwsMessage($nwsMessage)
    {
        $this->nwsMessage = $nwsMessage;

        return $this;
    }

    /**
     * Get nwsMessage
     *
     * @return string
     */
    public function getNwsMessage()
    {
        return $this->nwsMessage;
    }

    /**
     * Set nwsStatus
     *
     * @param string $nwsStatus
     * @return News
     */
    public function setNwsStatus($nwsStatus)
    {
        $this->nwsStatus = $nwsStatus;

        return $this;
    }

    /**
     * Get nwsStatus
     *
     * @return string
     */
    public function getNwsStatus()
    {
        return $this->nwsStatus;
    }
}
