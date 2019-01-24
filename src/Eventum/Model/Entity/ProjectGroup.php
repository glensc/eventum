<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectGroup
 *
 * @ORM\Table(name="project_group")
 * @ORM\Entity
 */
class ProjectGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pgr_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pgrPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pgr_grp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pgrGrpId;


    /**
     * Set pgrPrjId
     *
     * @param integer $pgrPrjId
     * @return ProjectGroup
     */
    public function setPgrPrjId($pgrPrjId)
    {
        $this->pgrPrjId = $pgrPrjId;

        return $this;
    }

    /**
     * Get pgrPrjId
     *
     * @return integer
     */
    public function getPgrPrjId()
    {
        return $this->pgrPrjId;
    }

    /**
     * Set pgrGrpId
     *
     * @param integer $pgrGrpId
     * @return ProjectGroup
     */
    public function setPgrGrpId($pgrGrpId)
    {
        $this->pgrGrpId = $pgrGrpId;

        return $this;
    }

    /**
     * Get pgrGrpId
     *
     * @return integer
     */
    public function getPgrGrpId()
    {
        return $this->pgrGrpId;
    }
}
