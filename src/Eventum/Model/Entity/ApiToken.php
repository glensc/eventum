<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApiToken
 *
 * @ORM\Table(name="api_token", indexes={@ORM\Index(name="apt_usr_id", columns={"apt_usr_id", "apt_status"}), @ORM\Index(name="apt_token", columns={"apt_token"})})
 * @ORM\Entity
 */
class ApiToken
{
    /**
     * @var integer
     *
     * @ORM\Column(name="apt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aptId;

    /**
     * @var integer
     *
     * @ORM\Column(name="apt_usr_id", type="integer", nullable=false)
     */
    private $aptUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="apt_created", type="datetime", nullable=false)
     */
    private $aptCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="apt_status", type="string", length=10, nullable=false)
     */
    private $aptStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="apt_token", type="string", length=32, nullable=false)
     */
    private $aptToken;


    /**
     * Get aptId
     *
     * @return integer
     */
    public function getAptId()
    {
        return $this->aptId;
    }

    /**
     * Set aptUsrId
     *
     * @param integer $aptUsrId
     * @return ApiToken
     */
    public function setAptUsrId($aptUsrId)
    {
        $this->aptUsrId = $aptUsrId;

        return $this;
    }

    /**
     * Get aptUsrId
     *
     * @return integer
     */
    public function getAptUsrId()
    {
        return $this->aptUsrId;
    }

    /**
     * Set aptCreated
     *
     * @param \DateTime $aptCreated
     * @return ApiToken
     */
    public function setAptCreated($aptCreated)
    {
        $this->aptCreated = $aptCreated;

        return $this;
    }

    /**
     * Get aptCreated
     *
     * @return \DateTime
     */
    public function getAptCreated()
    {
        return $this->aptCreated;
    }

    /**
     * Set aptStatus
     *
     * @param string $aptStatus
     * @return ApiToken
     */
    public function setAptStatus($aptStatus)
    {
        $this->aptStatus = $aptStatus;

        return $this;
    }

    /**
     * Get aptStatus
     *
     * @return string
     */
    public function getAptStatus()
    {
        return $this->aptStatus;
    }

    /**
     * Set aptToken
     *
     * @param string $aptToken
     * @return ApiToken
     */
    public function setAptToken($aptToken)
    {
        $this->aptToken = $aptToken;

        return $this;
    }

    /**
     * Get aptToken
     *
     * @return string
     */
    public function getAptToken()
    {
        return $this->aptToken;
    }
}
