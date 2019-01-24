<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueAccessLog
 *
 * @ORM\Table(name="issue_access_log", indexes={@ORM\Index(name="alg_iss_id", columns={"alg_iss_id"})})
 * @ORM\Entity
 */
class IssueAccessLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="alg_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $algId;

    /**
     * @var integer
     *
     * @ORM\Column(name="alg_iss_id", type="integer", nullable=false)
     */
    private $algIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="alg_usr_id", type="integer", nullable=false)
     */
    private $algUsrId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alg_failed", type="boolean", nullable=false)
     */
    private $algFailed;

    /**
     * @var integer
     *
     * @ORM\Column(name="alg_item_id", type="integer", nullable=true)
     */
    private $algItemId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alg_created", type="datetime", nullable=false)
     */
    private $algCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="alg_ip_address", type="string", length=15, nullable=true)
     */
    private $algIpAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="alg_item", type="string", length=10, nullable=true)
     */
    private $algItem;

    /**
     * @var string
     *
     * @ORM\Column(name="alg_url", type="string", length=255, nullable=true)
     */
    private $algUrl;


    /**
     * Get algId
     *
     * @return integer
     */
    public function getAlgId()
    {
        return $this->algId;
    }

    /**
     * Set algIssId
     *
     * @param integer $algIssId
     * @return IssueAccessLog
     */
    public function setAlgIssId($algIssId)
    {
        $this->algIssId = $algIssId;

        return $this;
    }

    /**
     * Get algIssId
     *
     * @return integer
     */
    public function getAlgIssId()
    {
        return $this->algIssId;
    }

    /**
     * Set algUsrId
     *
     * @param integer $algUsrId
     * @return IssueAccessLog
     */
    public function setAlgUsrId($algUsrId)
    {
        $this->algUsrId = $algUsrId;

        return $this;
    }

    /**
     * Get algUsrId
     *
     * @return integer
     */
    public function getAlgUsrId()
    {
        return $this->algUsrId;
    }

    /**
     * Set algFailed
     *
     * @param boolean $algFailed
     * @return IssueAccessLog
     */
    public function setAlgFailed($algFailed)
    {
        $this->algFailed = $algFailed;

        return $this;
    }

    /**
     * Get algFailed
     *
     * @return boolean
     */
    public function getAlgFailed()
    {
        return $this->algFailed;
    }

    /**
     * Set algItemId
     *
     * @param integer $algItemId
     * @return IssueAccessLog
     */
    public function setAlgItemId($algItemId)
    {
        $this->algItemId = $algItemId;

        return $this;
    }

    /**
     * Get algItemId
     *
     * @return integer
     */
    public function getAlgItemId()
    {
        return $this->algItemId;
    }

    /**
     * Set algCreated
     *
     * @param \DateTime $algCreated
     * @return IssueAccessLog
     */
    public function setAlgCreated($algCreated)
    {
        $this->algCreated = $algCreated;

        return $this;
    }

    /**
     * Get algCreated
     *
     * @return \DateTime
     */
    public function getAlgCreated()
    {
        return $this->algCreated;
    }

    /**
     * Set algIpAddress
     *
     * @param string $algIpAddress
     * @return IssueAccessLog
     */
    public function setAlgIpAddress($algIpAddress)
    {
        $this->algIpAddress = $algIpAddress;

        return $this;
    }

    /**
     * Get algIpAddress
     *
     * @return string
     */
    public function getAlgIpAddress()
    {
        return $this->algIpAddress;
    }

    /**
     * Set algItem
     *
     * @param string $algItem
     * @return IssueAccessLog
     */
    public function setAlgItem($algItem)
    {
        $this->algItem = $algItem;

        return $this;
    }

    /**
     * Get algItem
     *
     * @return string
     */
    public function getAlgItem()
    {
        return $this->algItem;
    }

    /**
     * Set algUrl
     *
     * @param string $algUrl
     * @return IssueAccessLog
     */
    public function setAlgUrl($algUrl)
    {
        $this->algUrl = $algUrl;

        return $this;
    }

    /**
     * Get algUrl
     *
     * @return string
     */
    public function getAlgUrl()
    {
        return $this->algUrl;
    }
}
