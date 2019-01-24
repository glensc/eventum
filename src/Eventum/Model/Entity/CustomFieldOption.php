<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomFieldOption
 *
 * @ORM\Table(name="custom_field_option", indexes={@ORM\Index(name="icf_fld_id", columns={"cfo_fld_id"})})
 * @ORM\Entity
 */
class CustomFieldOption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cfo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cfoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cfo_fld_id", type="integer", nullable=false)
     */
    private $cfoFldId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cfo_rank", type="integer", nullable=false)
     */
    private $cfoRank;

    /**
     * @var string
     *
     * @ORM\Column(name="cfo_value", type="string", length=128, nullable=false)
     */
    private $cfoValue;


    /**
     * Get cfoId
     *
     * @return integer
     */
    public function getCfoId()
    {
        return $this->cfoId;
    }

    /**
     * Set cfoFldId
     *
     * @param integer $cfoFldId
     * @return CustomFieldOption
     */
    public function setCfoFldId($cfoFldId)
    {
        $this->cfoFldId = $cfoFldId;

        return $this;
    }

    /**
     * Get cfoFldId
     *
     * @return integer
     */
    public function getCfoFldId()
    {
        return $this->cfoFldId;
    }

    /**
     * Set cfoRank
     *
     * @param integer $cfoRank
     * @return CustomFieldOption
     */
    public function setCfoRank($cfoRank)
    {
        $this->cfoRank = $cfoRank;

        return $this;
    }

    /**
     * Get cfoRank
     *
     * @return integer
     */
    public function getCfoRank()
    {
        return $this->cfoRank;
    }

    /**
     * Set cfoValue
     *
     * @param string $cfoValue
     * @return CustomFieldOption
     */
    public function setCfoValue($cfoValue)
    {
        $this->cfoValue = $cfoValue;

        return $this;
    }

    /**
     * Get cfoValue
     *
     * @return string
     */
    public function getCfoValue()
    {
        return $this->cfoValue;
    }
}
