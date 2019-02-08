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
 * IssueProductVersion
 *
 * @ORM\Table(name="issue_product_version", indexes={@ORM\Index(name="ipv_iss_id", columns={"ipv_iss_id"})})
 * @ORM\Entity
 */
class IssueProductVersion
{
    /**
     * @var int
     *
     * @ORM\Column(name="ipv_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ipvId;

    /**
     * @var int
     *
     * @ORM\Column(name="ipv_iss_id", type="integer", nullable=false)
     */
    private $ipvIssId;

    /**
     * @var int
     *
     * @ORM\Column(name="ipv_pro_id", type="integer", nullable=false)
     */
    private $ipvProId;

    /**
     * @var string
     *
     * @ORM\Column(name="ipv_version", type="string", length=255, nullable=false)
     */
    private $ipvVersion;

    /**
     * Get ipvId
     *
     * @return int
     */
    public function getIpvId()
    {
        return $this->ipvId;
    }

    /**
     * Set ipvIssId
     *
     * @param int $ipvIssId
     * @return IssueProductVersion
     */
    public function setIpvIssId($ipvIssId)
    {
        $this->ipvIssId = $ipvIssId;

        return $this;
    }

    /**
     * Get ipvIssId
     *
     * @return int
     */
    public function getIpvIssId()
    {
        return $this->ipvIssId;
    }

    /**
     * Set ipvProId
     *
     * @param int $ipvProId
     * @return IssueProductVersion
     */
    public function setIpvProId($ipvProId)
    {
        $this->ipvProId = $ipvProId;

        return $this;
    }

    /**
     * Get ipvProId
     *
     * @return int
     */
    public function getIpvProId()
    {
        return $this->ipvProId;
    }

    /**
     * Set ipvVersion
     *
     * @param string $ipvVersion
     * @return IssueProductVersion
     */
    public function setIpvVersion($ipvVersion)
    {
        $this->ipvVersion = $ipvVersion;

        return $this;
    }

    /**
     * Get ipvVersion
     *
     * @return string
     */
    public function getIpvVersion()
    {
        return $this->ipvVersion;
    }
}
