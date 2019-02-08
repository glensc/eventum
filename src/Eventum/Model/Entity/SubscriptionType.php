<?php

/*
 * This file is part of the Eventum (Issue Tracking System) package.
 *
 * @copyright (c) Eventum Team
 * @license GNU General Public License, version 2 or later (GPL-2+)
 *
 * For the full copyright and license information,
 * please see the COPYING and AUTHORS files
 * that were distributed with this source code.
 */

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
     * @var int
     *
     * @ORM\Column(name="sbt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sbtId;

    /**
     * @var int
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
     * @return int
     */
    public function getSbtId()
    {
        return $this->sbtId;
    }

    /**
     * Set sbtSubId
     *
     * @param int $sbtSubId
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
     * @return int
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
