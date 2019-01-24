<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Table(name="group", uniqueConstraints={@ORM\UniqueConstraint(name="grp_name", columns={"grp_name"})})
 * @ORM\Entity
 */
class Group
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grpId;

    /**
     * @var string
     *
     * @ORM\Column(name="grp_name", type="string", length=100, nullable=false)
     */
    private $grpName;

    /**
     * @var string
     *
     * @ORM\Column(name="grp_description", type="string", length=255, nullable=true)
     */
    private $grpDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="grp_manager_usr_id", type="integer", nullable=false)
     */
    private $grpManagerUsrId;


    /**
     * Get grpId
     *
     * @return integer
     */
    public function getGrpId()
    {
        return $this->grpId;
    }

    /**
     * Set grpName
     *
     * @param string $grpName
     * @return Group
     */
    public function setGrpName($grpName)
    {
        $this->grpName = $grpName;

        return $this;
    }

    /**
     * Get grpName
     *
     * @return string
     */
    public function getGrpName()
    {
        return $this->grpName;
    }

    /**
     * Set grpDescription
     *
     * @param string $grpDescription
     * @return Group
     */
    public function setGrpDescription($grpDescription)
    {
        $this->grpDescription = $grpDescription;

        return $this;
    }

    /**
     * Get grpDescription
     *
     * @return string
     */
    public function getGrpDescription()
    {
        return $this->grpDescription;
    }

    /**
     * Set grpManagerUsrId
     *
     * @param integer $grpManagerUsrId
     * @return Group
     */
    public function setGrpManagerUsrId($grpManagerUsrId)
    {
        $this->grpManagerUsrId = $grpManagerUsrId;

        return $this;
    }

    /**
     * Get grpManagerUsrId
     *
     * @return integer
     */
    public function getGrpManagerUsrId()
    {
        return $this->grpManagerUsrId;
    }
}
