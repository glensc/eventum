<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectPriority
 *
 * @ORM\Table(name="project_priority", uniqueConstraints={@ORM\UniqueConstraint(name="pri_title", columns={"pri_title", "pri_prj_id"})})
 * @ORM\Entity
 */
class ProjectPriority
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pri_id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $priId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pri_prj_id", type="integer", nullable=false)
     */
    private $priPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="pri_title", type="string", length=64, nullable=false)
     */
    private $priTitle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pri_rank", type="boolean", nullable=false)
     */
    private $priRank;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pri_icon", type="boolean", nullable=false)
     */
    private $priIcon;


    /**
     * Get priId
     *
     * @return integer
     */
    public function getPriId()
    {
        return $this->priId;
    }

    /**
     * Set priPrjId
     *
     * @param integer $priPrjId
     * @return ProjectPriority
     */
    public function setPriPrjId($priPrjId)
    {
        $this->priPrjId = $priPrjId;

        return $this;
    }

    /**
     * Get priPrjId
     *
     * @return integer
     */
    public function getPriPrjId()
    {
        return $this->priPrjId;
    }

    /**
     * Set priTitle
     *
     * @param string $priTitle
     * @return ProjectPriority
     */
    public function setPriTitle($priTitle)
    {
        $this->priTitle = $priTitle;

        return $this;
    }

    /**
     * Get priTitle
     *
     * @return string
     */
    public function getPriTitle()
    {
        return $this->priTitle;
    }

    /**
     * Set priRank
     *
     * @param boolean $priRank
     * @return ProjectPriority
     */
    public function setPriRank($priRank)
    {
        $this->priRank = $priRank;

        return $this;
    }

    /**
     * Get priRank
     *
     * @return boolean
     */
    public function getPriRank()
    {
        return $this->priRank;
    }

    /**
     * Set priIcon
     *
     * @param boolean $priIcon
     * @return ProjectPriority
     */
    public function setPriIcon($priIcon)
    {
        $this->priIcon = $priIcon;

        return $this;
    }

    /**
     * Get priIcon
     *
     * @return boolean
     */
    public function getPriIcon()
    {
        return $this->priIcon;
    }
}
