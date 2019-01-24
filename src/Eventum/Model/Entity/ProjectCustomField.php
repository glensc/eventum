<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectCustomField
 *
 * @ORM\Table(name="project_custom_field", indexes={@ORM\Index(name="pcf_prj_id", columns={"pcf_prj_id"}), @ORM\Index(name="pcf_fld_id", columns={"pcf_fld_id"})})
 * @ORM\Entity
 */
class ProjectCustomField
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pcf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pcfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pcf_prj_id", type="integer", nullable=false)
     */
    private $pcfPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pcf_fld_id", type="integer", nullable=false)
     */
    private $pcfFldId;


    /**
     * Get pcfId
     *
     * @return integer
     */
    public function getPcfId()
    {
        return $this->pcfId;
    }

    /**
     * Set pcfPrjId
     *
     * @param integer $pcfPrjId
     * @return ProjectCustomField
     */
    public function setPcfPrjId($pcfPrjId)
    {
        $this->pcfPrjId = $pcfPrjId;

        return $this;
    }

    /**
     * Get pcfPrjId
     *
     * @return integer
     */
    public function getPcfPrjId()
    {
        return $this->pcfPrjId;
    }

    /**
     * Set pcfFldId
     *
     * @param integer $pcfFldId
     * @return ProjectCustomField
     */
    public function setPcfFldId($pcfFldId)
    {
        $this->pcfFldId = $pcfFldId;

        return $this;
    }

    /**
     * Get pcfFldId
     *
     * @return integer
     */
    public function getPcfFldId()
    {
        return $this->pcfFldId;
    }
}
