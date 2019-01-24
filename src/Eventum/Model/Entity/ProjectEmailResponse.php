<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectEmailResponse
 *
 * @ORM\Table(name="project_email_response")
 * @ORM\Entity
 */
class ProjectEmailResponse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="per_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $perPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="per_ere_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $perEreId;


    /**
     * Set perPrjId
     *
     * @param integer $perPrjId
     * @return ProjectEmailResponse
     */
    public function setPerPrjId($perPrjId)
    {
        $this->perPrjId = $perPrjId;

        return $this;
    }

    /**
     * Get perPrjId
     *
     * @return integer
     */
    public function getPerPrjId()
    {
        return $this->perPrjId;
    }

    /**
     * Set perEreId
     *
     * @param integer $perEreId
     * @return ProjectEmailResponse
     */
    public function setPerEreId($perEreId)
    {
        $this->perEreId = $perEreId;

        return $this;
    }

    /**
     * Get perEreId
     *
     * @return integer
     */
    public function getPerEreId()
    {
        return $this->perEreId;
    }
}
