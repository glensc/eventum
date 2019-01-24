<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectFieldDisplay
 *
 * @ORM\Table(name="project_field_display")
 * @ORM\Entity
 */
class ProjectFieldDisplay
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pfd_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pfdPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="pfd_field", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pfdField;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pfd_min_role", type="boolean", nullable=false)
     */
    private $pfdMinRole;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pfd_required", type="boolean", nullable=false)
     */
    private $pfdRequired;


    /**
     * Set pfdPrjId
     *
     * @param integer $pfdPrjId
     * @return ProjectFieldDisplay
     */
    public function setPfdPrjId($pfdPrjId)
    {
        $this->pfdPrjId = $pfdPrjId;

        return $this;
    }

    /**
     * Get pfdPrjId
     *
     * @return integer
     */
    public function getPfdPrjId()
    {
        return $this->pfdPrjId;
    }

    /**
     * Set pfdField
     *
     * @param string $pfdField
     * @return ProjectFieldDisplay
     */
    public function setPfdField($pfdField)
    {
        $this->pfdField = $pfdField;

        return $this;
    }

    /**
     * Get pfdField
     *
     * @return string
     */
    public function getPfdField()
    {
        return $this->pfdField;
    }

    /**
     * Set pfdMinRole
     *
     * @param boolean $pfdMinRole
     * @return ProjectFieldDisplay
     */
    public function setPfdMinRole($pfdMinRole)
    {
        $this->pfdMinRole = $pfdMinRole;

        return $this;
    }

    /**
     * Get pfdMinRole
     *
     * @return boolean
     */
    public function getPfdMinRole()
    {
        return $this->pfdMinRole;
    }

    /**
     * Set pfdRequired
     *
     * @param boolean $pfdRequired
     * @return ProjectFieldDisplay
     */
    public function setPfdRequired($pfdRequired)
    {
        $this->pfdRequired = $pfdRequired;

        return $this;
    }

    /**
     * Get pfdRequired
     *
     * @return boolean
     */
    public function getPfdRequired()
    {
        return $this->pfdRequired;
    }
}
