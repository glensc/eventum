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
 * RemoteLink
 *
 * @ORM\Table(name="remote_link", indexes={@ORM\Index(name="rel_id", columns={"rel_id", "rel_gid"})})
 * @ORM\Entity
 */
class RemoteLink
{
    /**
     * @var int
     *
     * @ORM\Column(name="rel_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $relId;

    /**
     * @var int
     *
     * @ORM\Column(name="rel_iss_id", type="integer", nullable=false)
     */
    private $relIssId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rel_created_date", type="datetime", nullable=false)
     */
    private $relCreatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rel_updated_date", type="datetime", nullable=false)
     */
    private $relUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="rel_gid", type="string", length=255, nullable=true)
     */
    private $relGid;

    /**
     * @var string
     *
     * @ORM\Column(name="rel_relation", type="string", length=255, nullable=false)
     */
    private $relRelation;

    /**
     * @var string
     *
     * @ORM\Column(name="rel_url", type="text", length=65535, nullable=false)
     */
    private $relUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="rel_title", type="string", length=255, nullable=false)
     */
    private $relTitle;

    /**
     * Get relId
     *
     * @return int
     */
    public function getRelId()
    {
        return $this->relId;
    }

    /**
     * Set relIssId
     *
     * @param int $relIssId
     * @return RemoteLink
     */
    public function setRelIssId($relIssId)
    {
        $this->relIssId = $relIssId;

        return $this;
    }

    /**
     * Get relIssId
     *
     * @return int
     */
    public function getRelIssId()
    {
        return $this->relIssId;
    }

    /**
     * Set relCreatedDate
     *
     * @param \DateTime $relCreatedDate
     * @return RemoteLink
     */
    public function setRelCreatedDate($relCreatedDate)
    {
        $this->relCreatedDate = $relCreatedDate;

        return $this;
    }

    /**
     * Get relCreatedDate
     *
     * @return \DateTime
     */
    public function getRelCreatedDate()
    {
        return $this->relCreatedDate;
    }

    /**
     * Set relUpdatedDate
     *
     * @param \DateTime $relUpdatedDate
     * @return RemoteLink
     */
    public function setRelUpdatedDate($relUpdatedDate)
    {
        $this->relUpdatedDate = $relUpdatedDate;

        return $this;
    }

    /**
     * Get relUpdatedDate
     *
     * @return \DateTime
     */
    public function getRelUpdatedDate()
    {
        return $this->relUpdatedDate;
    }

    /**
     * Set relGid
     *
     * @param string $relGid
     * @return RemoteLink
     */
    public function setRelGid($relGid)
    {
        $this->relGid = $relGid;

        return $this;
    }

    /**
     * Get relGid
     *
     * @return string
     */
    public function getRelGid()
    {
        return $this->relGid;
    }

    /**
     * Set relRelation
     *
     * @param string $relRelation
     * @return RemoteLink
     */
    public function setRelRelation($relRelation)
    {
        $this->relRelation = $relRelation;

        return $this;
    }

    /**
     * Get relRelation
     *
     * @return string
     */
    public function getRelRelation()
    {
        return $this->relRelation;
    }

    /**
     * Set relUrl
     *
     * @param string $relUrl
     * @return RemoteLink
     */
    public function setRelUrl($relUrl)
    {
        $this->relUrl = $relUrl;

        return $this;
    }

    /**
     * Get relUrl
     *
     * @return string
     */
    public function getRelUrl()
    {
        return $this->relUrl;
    }

    /**
     * Set relTitle
     *
     * @param string $relTitle
     * @return RemoteLink
     */
    public function setRelTitle($relTitle)
    {
        $this->relTitle = $relTitle;

        return $this;
    }

    /**
     * Get relTitle
     *
     * @return string
     */
    public function getRelTitle()
    {
        return $this->relTitle;
    }
}
