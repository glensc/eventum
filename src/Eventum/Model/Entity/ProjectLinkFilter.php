<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectLinkFilter
 *
 * @ORM\Table(name="project_link_filter")
 * @ORM\Entity
 */
class ProjectLinkFilter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="plf_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $plfPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="plf_lfi_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $plfLfiId;


    /**
     * Set plfPrjId
     *
     * @param integer $plfPrjId
     * @return ProjectLinkFilter
     */
    public function setPlfPrjId($plfPrjId)
    {
        $this->plfPrjId = $plfPrjId;

        return $this;
    }

    /**
     * Get plfPrjId
     *
     * @return integer
     */
    public function getPlfPrjId()
    {
        return $this->plfPrjId;
    }

    /**
     * Set plfLfiId
     *
     * @param integer $plfLfiId
     * @return ProjectLinkFilter
     */
    public function setPlfLfiId($plfLfiId)
    {
        $this->plfLfiId = $plfLfiId;

        return $this;
    }

    /**
     * Get plfLfiId
     *
     * @return integer
     */
    public function getPlfLfiId()
    {
        return $this->plfLfiId;
    }
}
