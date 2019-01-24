<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectUser
 *
 * @ORM\Table(name="project_user", uniqueConstraints={@ORM\UniqueConstraint(name="pru_prj_id", columns={"pru_prj_id", "pru_usr_id"})})
 * @ORM\Entity
 */
class ProjectUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pru_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pruId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pru_prj_id", type="integer", nullable=false)
     */
    private $pruPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pru_usr_id", type="integer", nullable=false)
     */
    private $pruUsrId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pru_role", type="boolean", nullable=false)
     */
    private $pruRole;


    /**
     * Get pruId
     *
     * @return integer
     */
    public function getPruId()
    {
        return $this->pruId;
    }

    /**
     * Set pruPrjId
     *
     * @param integer $pruPrjId
     * @return ProjectUser
     */
    public function setPruPrjId($pruPrjId)
    {
        $this->pruPrjId = $pruPrjId;

        return $this;
    }

    /**
     * Get pruPrjId
     *
     * @return integer
     */
    public function getPruPrjId()
    {
        return $this->pruPrjId;
    }

    /**
     * Set pruUsrId
     *
     * @param integer $pruUsrId
     * @return ProjectUser
     */
    public function setPruUsrId($pruUsrId)
    {
        $this->pruUsrId = $pruUsrId;

        return $this;
    }

    /**
     * Get pruUsrId
     *
     * @return integer
     */
    public function getPruUsrId()
    {
        return $this->pruUsrId;
    }

    /**
     * Set pruRole
     *
     * @param boolean $pruRole
     * @return ProjectUser
     */
    public function setPruRole($pruRole)
    {
        $this->pruRole = $pruRole;

        return $this;
    }

    /**
     * Get pruRole
     *
     * @return boolean
     */
    public function getPruRole()
    {
        return $this->pruRole;
    }
}
