<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroup
 *
 * @ORM\Table(name="user_group")
 * @ORM\Entity
 */
class UserGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ugr_usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ugrUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ugr_grp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ugrGrpId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ugr_created", type="datetime", nullable=false)
     */
    private $ugrCreated;


    /**
     * Set ugrUsrId
     *
     * @param integer $ugrUsrId
     * @return UserGroup
     */
    public function setUgrUsrId($ugrUsrId)
    {
        $this->ugrUsrId = $ugrUsrId;

        return $this;
    }

    /**
     * Get ugrUsrId
     *
     * @return integer
     */
    public function getUgrUsrId()
    {
        return $this->ugrUsrId;
    }

    /**
     * Set ugrGrpId
     *
     * @param integer $ugrGrpId
     * @return UserGroup
     */
    public function setUgrGrpId($ugrGrpId)
    {
        $this->ugrGrpId = $ugrGrpId;

        return $this;
    }

    /**
     * Get ugrGrpId
     *
     * @return integer
     */
    public function getUgrGrpId()
    {
        return $this->ugrGrpId;
    }

    /**
     * Set ugrCreated
     *
     * @param \DateTime $ugrCreated
     * @return UserGroup
     */
    public function setUgrCreated($ugrCreated)
    {
        $this->ugrCreated = $ugrCreated;

        return $this;
    }

    /**
     * Get ugrCreated
     *
     * @return \DateTime
     */
    public function getUgrCreated()
    {
        return $this->ugrCreated;
    }
}
