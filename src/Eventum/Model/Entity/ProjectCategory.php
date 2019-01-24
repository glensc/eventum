<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectCategory
 *
 * @ORM\Table(name="project_category", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_category", columns={"prc_prj_id", "prc_title"})}, indexes={@ORM\Index(name="prc_prj_id", columns={"prc_prj_id"})})
 * @ORM\Entity
 */
class ProjectCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="prc_prj_id", type="integer", nullable=false)
     */
    private $prcPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="prc_title", type="string", length=64, nullable=false)
     */
    private $prcTitle;


    /**
     * Get prcId
     *
     * @return integer
     */
    public function getPrcId()
    {
        return $this->prcId;
    }

    /**
     * Set prcPrjId
     *
     * @param integer $prcPrjId
     * @return ProjectCategory
     */
    public function setPrcPrjId($prcPrjId)
    {
        $this->prcPrjId = $prcPrjId;

        return $this;
    }

    /**
     * Get prcPrjId
     *
     * @return integer
     */
    public function getPrcPrjId()
    {
        return $this->prcPrjId;
    }

    /**
     * Set prcTitle
     *
     * @param string $prcTitle
     * @return ProjectCategory
     */
    public function setPrcTitle($prcTitle)
    {
        $this->prcTitle = $prcTitle;

        return $this;
    }

    /**
     * Get prcTitle
     *
     * @return string
     */
    public function getPrcTitle()
    {
        return $this->prcTitle;
    }
}
