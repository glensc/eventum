<?php

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
     * @var integer
     *
     * @ORM\Column(name="ipv_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ipvId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ipv_iss_id", type="integer", nullable=false)
     */
    private $ipvIssId;

    /**
     * @var integer
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
     * @return integer
     */
    public function getIpvId()
    {
        return $this->ipvId;
    }

    /**
     * Set ipvIssId
     *
     * @param integer $ipvIssId
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
     * @return integer
     */
    public function getIpvIssId()
    {
        return $this->ipvIssId;
    }

    /**
     * Set ipvProId
     *
     * @param integer $ipvProId
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
     * @return integer
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
