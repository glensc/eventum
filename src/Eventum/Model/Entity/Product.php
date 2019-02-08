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
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="pro_rank", columns={"pro_rank"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="pro_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $proId;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_title", type="string", length=255, nullable=false)
     */
    private $proTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_version_howto", type="string", length=255, nullable=false)
     */
    private $proVersionHowto;

    /**
     * @var int
     *
     * @ORM\Column(name="pro_rank", type="integer", nullable=false)
     */
    private $proRank;

    /**
     * @var bool
     *
     * @ORM\Column(name="pro_removed", type="boolean", nullable=false)
     */
    private $proRemoved;

    /**
     * @var string
     *
     * @ORM\Column(name="pro_email", type="string", length=255, nullable=true)
     */
    private $proEmail;

    /**
     * Get proId
     *
     * @return int
     */
    public function getProId()
    {
        return $this->proId;
    }

    /**
     * Set proTitle
     *
     * @param string $proTitle
     * @return Product
     */
    public function setProTitle($proTitle)
    {
        $this->proTitle = $proTitle;

        return $this;
    }

    /**
     * Get proTitle
     *
     * @return string
     */
    public function getProTitle()
    {
        return $this->proTitle;
    }

    /**
     * Set proVersionHowto
     *
     * @param string $proVersionHowto
     * @return Product
     */
    public function setProVersionHowto($proVersionHowto)
    {
        $this->proVersionHowto = $proVersionHowto;

        return $this;
    }

    /**
     * Get proVersionHowto
     *
     * @return string
     */
    public function getProVersionHowto()
    {
        return $this->proVersionHowto;
    }

    /**
     * Set proRank
     *
     * @param int $proRank
     * @return Product
     */
    public function setProRank($proRank)
    {
        $this->proRank = $proRank;

        return $this;
    }

    /**
     * Get proRank
     *
     * @return int
     */
    public function getProRank()
    {
        return $this->proRank;
    }

    /**
     * Set proRemoved
     *
     * @param bool $proRemoved
     * @return Product
     */
    public function setProRemoved($proRemoved)
    {
        $this->proRemoved = $proRemoved;

        return $this;
    }

    /**
     * Get proRemoved
     *
     * @return bool
     */
    public function getProRemoved()
    {
        return $this->proRemoved;
    }

    /**
     * Set proEmail
     *
     * @param string $proEmail
     * @return Product
     */
    public function setProEmail($proEmail)
    {
        $this->proEmail = $proEmail;

        return $this;
    }

    /**
     * Get proEmail
     *
     * @return string
     */
    public function getProEmail()
    {
        return $this->proEmail;
    }
}
