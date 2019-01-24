<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartnerProject
 *
 * @ORM\Table(name="partner_project")
 * @ORM\Entity
 */
class PartnerProject
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pap_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $papPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="pap_par_code", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $papParCode;


    /**
     * Set papPrjId
     *
     * @param integer $papPrjId
     * @return PartnerProject
     */
    public function setPapPrjId($papPrjId)
    {
        $this->papPrjId = $papPrjId;

        return $this;
    }

    /**
     * Get papPrjId
     *
     * @return integer
     */
    public function getPapPrjId()
    {
        return $this->papPrjId;
    }

    /**
     * Set papParCode
     *
     * @param string $papParCode
     * @return PartnerProject
     */
    public function setPapParCode($papParCode)
    {
        $this->papParCode = $papParCode;

        return $this;
    }

    /**
     * Get papParCode
     *
     * @return string
     */
    public function getPapParCode()
    {
        return $this->papParCode;
    }
}
