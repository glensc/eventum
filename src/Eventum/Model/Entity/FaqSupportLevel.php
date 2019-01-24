<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FaqSupportLevel
 *
 * @ORM\Table(name="faq_support_level")
 * @ORM\Entity
 */
class FaqSupportLevel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fsl_faq_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fslFaqId;

    /**
     * @var string
     *
     * @ORM\Column(name="fsl_support_level_id", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fslSupportLevelId;


    /**
     * Set fslFaqId
     *
     * @param integer $fslFaqId
     * @return FaqSupportLevel
     */
    public function setFslFaqId($fslFaqId)
    {
        $this->fslFaqId = $fslFaqId;

        return $this;
    }

    /**
     * Get fslFaqId
     *
     * @return integer
     */
    public function getFslFaqId()
    {
        return $this->fslFaqId;
    }

    /**
     * Set fslSupportLevelId
     *
     * @param string $fslSupportLevelId
     * @return FaqSupportLevel
     */
    public function setFslSupportLevelId($fslSupportLevelId)
    {
        $this->fslSupportLevelId = $fslSupportLevelId;

        return $this;
    }

    /**
     * Get fslSupportLevelId
     *
     * @return string
     */
    public function getFslSupportLevelId()
    {
        return $this->fslSupportLevelId;
    }
}
