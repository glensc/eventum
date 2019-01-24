<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectPhoneCategory
 *
 * @ORM\Table(name="project_phone_category", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_category", columns={"phc_prj_id", "phc_title"})}, indexes={@ORM\Index(name="phc_prj_id", columns={"phc_prj_id"})})
 * @ORM\Entity
 */
class ProjectPhoneCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="phc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="phc_prj_id", type="integer", nullable=false)
     */
    private $phcPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="phc_title", type="string", length=64, nullable=false)
     */
    private $phcTitle;


    /**
     * Get phcId
     *
     * @return integer
     */
    public function getPhcId()
    {
        return $this->phcId;
    }

    /**
     * Set phcPrjId
     *
     * @param integer $phcPrjId
     * @return ProjectPhoneCategory
     */
    public function setPhcPrjId($phcPrjId)
    {
        $this->phcPrjId = $phcPrjId;

        return $this;
    }

    /**
     * Get phcPrjId
     *
     * @return integer
     */
    public function getPhcPrjId()
    {
        return $this->phcPrjId;
    }

    /**
     * Set phcTitle
     *
     * @param string $phcTitle
     * @return ProjectPhoneCategory
     */
    public function setPhcTitle($phcTitle)
    {
        $this->phcTitle = $phcTitle;

        return $this;
    }

    /**
     * Get phcTitle
     *
     * @return string
     */
    public function getPhcTitle()
    {
        return $this->phcTitle;
    }
}
