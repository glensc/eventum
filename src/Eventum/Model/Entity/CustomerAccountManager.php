<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerAccountManager
 *
 * @ORM\Table(name="customer_account_manager", uniqueConstraints={@ORM\UniqueConstraint(name="cam_manager", columns={"cam_prj_id", "cam_customer_id", "cam_usr_id"})}, indexes={@ORM\Index(name="cam_customer_id", columns={"cam_customer_id"})})
 * @ORM\Entity
 */
class CustomerAccountManager
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cam_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $camId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cam_prj_id", type="integer", nullable=false)
     */
    private $camPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="cam_customer_id", type="string", length=128, nullable=false)
     */
    private $camCustomerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cam_usr_id", type="integer", nullable=false)
     */
    private $camUsrId;

    /**
     * @var string
     *
     * @ORM\Column(name="cam_type", type="string", length=7, nullable=false)
     */
    private $camType;


    /**
     * Get camId
     *
     * @return integer
     */
    public function getCamId()
    {
        return $this->camId;
    }

    /**
     * Set camPrjId
     *
     * @param integer $camPrjId
     * @return CustomerAccountManager
     */
    public function setCamPrjId($camPrjId)
    {
        $this->camPrjId = $camPrjId;

        return $this;
    }

    /**
     * Get camPrjId
     *
     * @return integer
     */
    public function getCamPrjId()
    {
        return $this->camPrjId;
    }

    /**
     * Set camCustomerId
     *
     * @param string $camCustomerId
     * @return CustomerAccountManager
     */
    public function setCamCustomerId($camCustomerId)
    {
        $this->camCustomerId = $camCustomerId;

        return $this;
    }

    /**
     * Get camCustomerId
     *
     * @return string
     */
    public function getCamCustomerId()
    {
        return $this->camCustomerId;
    }

    /**
     * Set camUsrId
     *
     * @param integer $camUsrId
     * @return CustomerAccountManager
     */
    public function setCamUsrId($camUsrId)
    {
        $this->camUsrId = $camUsrId;

        return $this;
    }

    /**
     * Get camUsrId
     *
     * @return integer
     */
    public function getCamUsrId()
    {
        return $this->camUsrId;
    }

    /**
     * Set camType
     *
     * @param string $camType
     * @return CustomerAccountManager
     */
    public function setCamType($camType)
    {
        $this->camType = $camType;

        return $this;
    }

    /**
     * Get camType
     *
     * @return string
     */
    public function getCamType()
    {
        return $this->camType;
    }
}
