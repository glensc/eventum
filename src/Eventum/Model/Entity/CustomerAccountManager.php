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
 * CustomerAccountManager
 *
 * @ORM\Table(name="customer_account_manager", uniqueConstraints={@ORM\UniqueConstraint(name="cam_manager", columns={"cam_prj_id", "cam_customer_id", "cam_usr_id"})}, indexes={@ORM\Index(name="cam_customer_id", columns={"cam_customer_id"})})
 * @ORM\Entity
 */
class CustomerAccountManager
{
    /**
     * @var int
     *
     * @ORM\Column(name="cam_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $camId;

    /**
     * @var int
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
     * @var int
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
     * @return int
     */
    public function getCamId()
    {
        return $this->camId;
    }

    /**
     * Set camPrjId
     *
     * @param int $camPrjId
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
     * @return int
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
     * @param int $camUsrId
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
     * @return int
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
