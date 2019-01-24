<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectStatusDate
 *
 * @ORM\Table(name="project_status_date", uniqueConstraints={@ORM\UniqueConstraint(name="psd_prj_id", columns={"psd_prj_id", "psd_sta_id"})})
 * @ORM\Entity
 */
class ProjectStatusDate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="psd_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $psdId;

    /**
     * @var integer
     *
     * @ORM\Column(name="psd_prj_id", type="integer", nullable=false)
     */
    private $psdPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="psd_sta_id", type="integer", nullable=false)
     */
    private $psdStaId;

    /**
     * @var string
     *
     * @ORM\Column(name="psd_date_field", type="string", length=64, nullable=false)
     */
    private $psdDateField;

    /**
     * @var string
     *
     * @ORM\Column(name="psd_label", type="string", length=32, nullable=false)
     */
    private $psdLabel;


    /**
     * Get psdId
     *
     * @return integer
     */
    public function getPsdId()
    {
        return $this->psdId;
    }

    /**
     * Set psdPrjId
     *
     * @param integer $psdPrjId
     * @return ProjectStatusDate
     */
    public function setPsdPrjId($psdPrjId)
    {
        $this->psdPrjId = $psdPrjId;

        return $this;
    }

    /**
     * Get psdPrjId
     *
     * @return integer
     */
    public function getPsdPrjId()
    {
        return $this->psdPrjId;
    }

    /**
     * Set psdStaId
     *
     * @param integer $psdStaId
     * @return ProjectStatusDate
     */
    public function setPsdStaId($psdStaId)
    {
        $this->psdStaId = $psdStaId;

        return $this;
    }

    /**
     * Get psdStaId
     *
     * @return integer
     */
    public function getPsdStaId()
    {
        return $this->psdStaId;
    }

    /**
     * Set psdDateField
     *
     * @param string $psdDateField
     * @return ProjectStatusDate
     */
    public function setPsdDateField($psdDateField)
    {
        $this->psdDateField = $psdDateField;

        return $this;
    }

    /**
     * Get psdDateField
     *
     * @return string
     */
    public function getPsdDateField()
    {
        return $this->psdDateField;
    }

    /**
     * Set psdLabel
     *
     * @param string $psdLabel
     * @return ProjectStatusDate
     */
    public function setPsdLabel($psdLabel)
    {
        $this->psdLabel = $psdLabel;

        return $this;
    }

    /**
     * Get psdLabel
     *
     * @return string
     */
    public function getPsdLabel()
    {
        return $this->psdLabel;
    }
}
