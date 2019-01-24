<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ColumnsToDisplay
 *
 * @ORM\Table(name="columns_to_display", indexes={@ORM\Index(name="ctd_prj_id", columns={"ctd_prj_id", "ctd_page"})})
 * @ORM\Entity
 */
class ColumnsToDisplay
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ctd_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ctdPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="ctd_page", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ctdPage;

    /**
     * @var string
     *
     * @ORM\Column(name="ctd_field", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ctdField;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ctd_min_role", type="boolean", nullable=false)
     */
    private $ctdMinRole;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ctd_rank", type="boolean", nullable=false)
     */
    private $ctdRank;


    /**
     * Set ctdPrjId
     *
     * @param integer $ctdPrjId
     * @return ColumnsToDisplay
     */
    public function setCtdPrjId($ctdPrjId)
    {
        $this->ctdPrjId = $ctdPrjId;

        return $this;
    }

    /**
     * Get ctdPrjId
     *
     * @return integer
     */
    public function getCtdPrjId()
    {
        return $this->ctdPrjId;
    }

    /**
     * Set ctdPage
     *
     * @param string $ctdPage
     * @return ColumnsToDisplay
     */
    public function setCtdPage($ctdPage)
    {
        $this->ctdPage = $ctdPage;

        return $this;
    }

    /**
     * Get ctdPage
     *
     * @return string
     */
    public function getCtdPage()
    {
        return $this->ctdPage;
    }

    /**
     * Set ctdField
     *
     * @param string $ctdField
     * @return ColumnsToDisplay
     */
    public function setCtdField($ctdField)
    {
        $this->ctdField = $ctdField;

        return $this;
    }

    /**
     * Get ctdField
     *
     * @return string
     */
    public function getCtdField()
    {
        return $this->ctdField;
    }

    /**
     * Set ctdMinRole
     *
     * @param boolean $ctdMinRole
     * @return ColumnsToDisplay
     */
    public function setCtdMinRole($ctdMinRole)
    {
        $this->ctdMinRole = $ctdMinRole;

        return $this;
    }

    /**
     * Get ctdMinRole
     *
     * @return boolean
     */
    public function getCtdMinRole()
    {
        return $this->ctdMinRole;
    }

    /**
     * Set ctdRank
     *
     * @param boolean $ctdRank
     * @return ColumnsToDisplay
     */
    public function setCtdRank($ctdRank)
    {
        $this->ctdRank = $ctdRank;

        return $this;
    }

    /**
     * Get ctdRank
     *
     * @return boolean
     */
    public function getCtdRank()
    {
        return $this->ctdRank;
    }
}
