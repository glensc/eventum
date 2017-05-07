<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommitRepo
 *
 * @ORM\Table(name="commit_repo")
 * @ORM\Entity
 */
class CommitRepo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cor_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $corId;

    /**
     * @var string
     *
     * @ORM\Column(name="cor_name", type="string", length=255, nullable=false)
     */
    private $corName;

    /**
     * @var string
     *
     * @ORM\Column(name="cor_checkout_url", type="string", length=255, nullable=false)
     */
    private $corCheckoutUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="cor_diff_url", type="string", length=255, nullable=false)
     */
    private $corDiffUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="cor_log_url", type="string", length=255, nullable=false)
     */
    private $corLogUrl;


    /**
     * Get corId
     *
     * @return integer 
     */
    public function getCorId()
    {
        return $this->corId;
    }

    /**
     * Set corName
     *
     * @param string $corName
     * @return CommitRepo
     */
    public function setCorName($corName)
    {
        $this->corName = $corName;

        return $this;
    }

    /**
     * Get corName
     *
     * @return string 
     */
    public function getCorName()
    {
        return $this->corName;
    }

    /**
     * Set corCheckoutUrl
     *
     * @param string $corCheckoutUrl
     * @return CommitRepo
     */
    public function setCorCheckoutUrl($corCheckoutUrl)
    {
        $this->corCheckoutUrl = $corCheckoutUrl;

        return $this;
    }

    /**
     * Get corCheckoutUrl
     *
     * @return string 
     */
    public function getCorCheckoutUrl()
    {
        return $this->corCheckoutUrl;
    }

    /**
     * Set corDiffUrl
     *
     * @param string $corDiffUrl
     * @return CommitRepo
     */
    public function setCorDiffUrl($corDiffUrl)
    {
        $this->corDiffUrl = $corDiffUrl;

        return $this;
    }

    /**
     * Get corDiffUrl
     *
     * @return string 
     */
    public function getCorDiffUrl()
    {
        return $this->corDiffUrl;
    }

    /**
     * Set corLogUrl
     *
     * @param string $corLogUrl
     * @return CommitRepo
     */
    public function setCorLogUrl($corLogUrl)
    {
        $this->corLogUrl = $corLogUrl;

        return $this;
    }

    /**
     * Get corLogUrl
     *
     * @return string 
     */
    public function getCorLogUrl()
    {
        return $this->corLogUrl;
    }
}
