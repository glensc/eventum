<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RemoteLinks
 *
 * @ORM\Table(name="remote_links", indexes={@ORM\Index(name="rel_id", columns={"rel_id", "rel_gid"})})
 * @ORM\Entity
 */
class RemoteLinks
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rel_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $relId;

    /**
     * @var string
     *
     * @ORM\Column(name="rel_gid", type="string", length=255, nullable=true)
     */
    private $relGid;

    /**
     * @var string
     *
     * @ORM\Column(name="rel_relationship", type="string", length=255, nullable=false)
     */
    private $relRelationship;

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
     * @return integer
     */
    public function getRelId()
    {
        return $this->relId;
    }

    /**
     * Set relGid
     *
     * @param string $relGid
     * @return RemoteLinks
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
     * Set relRelationship
     *
     * @param string $relRelationship
     * @return RemoteLinks
     */
    public function setRelRelationship($relRelationship)
    {
        $this->relRelationship = $relRelationship;

        return $this;
    }

    /**
     * Get relRelationship
     *
     * @return string
     */
    public function getRelRelationship()
    {
        return $this->relRelationship;
    }

    /**
     * Set relUrl
     *
     * @param string $relUrl
     * @return RemoteLinks
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
     * @return RemoteLinks
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
