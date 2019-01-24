<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription", indexes={@ORM\Index(name="sub_iss_id", columns={"sub_iss_id", "sub_usr_id"})})
 * @ORM\Entity
 */
class Subscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sub_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sub_iss_id", type="integer", nullable=false)
     */
    private $subIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sub_usr_id", type="integer", nullable=true)
     */
    private $subUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sub_created_date", type="datetime", nullable=false)
     */
    private $subCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_level", type="string", length=10, nullable=false)
     */
    private $subLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_email", type="string", length=255, nullable=true)
     */
    private $subEmail;


    /**
     * Get subId
     *
     * @return integer
     */
    public function getSubId()
    {
        return $this->subId;
    }

    /**
     * Set subIssId
     *
     * @param integer $subIssId
     * @return Subscription
     */
    public function setSubIssId($subIssId)
    {
        $this->subIssId = $subIssId;

        return $this;
    }

    /**
     * Get subIssId
     *
     * @return integer
     */
    public function getSubIssId()
    {
        return $this->subIssId;
    }

    /**
     * Set subUsrId
     *
     * @param integer $subUsrId
     * @return Subscription
     */
    public function setSubUsrId($subUsrId)
    {
        $this->subUsrId = $subUsrId;

        return $this;
    }

    /**
     * Get subUsrId
     *
     * @return integer
     */
    public function getSubUsrId()
    {
        return $this->subUsrId;
    }

    /**
     * Set subCreatedDate
     *
     * @param \DateTime $subCreatedDate
     * @return Subscription
     */
    public function setSubCreatedDate($subCreatedDate)
    {
        $this->subCreatedDate = $subCreatedDate;

        return $this;
    }

    /**
     * Get subCreatedDate
     *
     * @return \DateTime
     */
    public function getSubCreatedDate()
    {
        return $this->subCreatedDate;
    }

    /**
     * Set subLevel
     *
     * @param string $subLevel
     * @return Subscription
     */
    public function setSubLevel($subLevel)
    {
        $this->subLevel = $subLevel;

        return $this;
    }

    /**
     * Get subLevel
     *
     * @return string
     */
    public function getSubLevel()
    {
        return $this->subLevel;
    }

    /**
     * Set subEmail
     *
     * @param string $subEmail
     * @return Subscription
     */
    public function setSubEmail($subEmail)
    {
        $this->subEmail = $subEmail;

        return $this;
    }

    /**
     * Get subEmail
     *
     * @return string
     */
    public function getSubEmail()
    {
        return $this->subEmail;
    }
}
