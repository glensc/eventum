<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubscriptionType
 *
 * @ORM\Table(name="subscription_type", indexes={@ORM\Index(name="sbt_sub_id", columns={"sbt_sub_id"})})
 * @ORM\Entity
 */
class SubscriptionType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sbt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sbtId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sbt_sub_id", type="integer", nullable=false)
     */
    private $sbtSubId;

    /**
     * @var string
     *
     * @ORM\Column(name="sbt_type", type="string", length=10, nullable=false)
     */
    private $sbtType;


    /**
     * Get sbtId
     *
     * @return integer
     */
    public function getSbtId()
    {
        return $this->sbtId;
    }

    /**
     * Set sbtSubId
     *
     * @param integer $sbtSubId
     * @return SubscriptionType
     */
    public function setSbtSubId($sbtSubId)
    {
        $this->sbtSubId = $sbtSubId;

        return $this;
    }

    /**
     * Get sbtSubId
     *
     * @return integer
     */
    public function getSbtSubId()
    {
        return $this->sbtSubId;
    }

    /**
     * Set sbtType
     *
     * @param string $sbtType
     * @return SubscriptionType
     */
    public function setSbtType($sbtType)
    {
        $this->sbtType = $sbtType;

        return $this;
    }

    /**
     * Get sbtType
     *
     * @return string
     */
    public function getSbtType()
    {
        return $this->sbtType;
    }
}
