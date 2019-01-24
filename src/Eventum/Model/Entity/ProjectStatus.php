<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectStatus
 *
 * @ORM\Table(name="project_status", indexes={@ORM\Index(name="prs_prj_id", columns={"prs_prj_id", "prs_sta_id"})})
 * @ORM\Entity
 */
class ProjectStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prs_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="prs_prj_id", type="integer", nullable=false)
     */
    private $prsPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="prs_sta_id", type="integer", nullable=false)
     */
    private $prsStaId;


    /**
     * Get prsId
     *
     * @return integer
     */
    public function getPrsId()
    {
        return $this->prsId;
    }

    /**
     * Set prsPrjId
     *
     * @param integer $prsPrjId
     * @return ProjectStatus
     */
    public function setPrsPrjId($prsPrjId)
    {
        $this->prsPrjId = $prsPrjId;

        return $this;
    }

    /**
     * Get prsPrjId
     *
     * @return integer
     */
    public function getPrsPrjId()
    {
        return $this->prsPrjId;
    }

    /**
     * Set prsStaId
     *
     * @param integer $prsStaId
     * @return ProjectStatus
     */
    public function setPrsStaId($prsStaId)
    {
        $this->prsStaId = $prsStaId;

        return $this;
    }

    /**
     * Get prsStaId
     *
     * @return integer
     */
    public function getPrsStaId()
    {
        return $this->prsStaId;
    }
}
