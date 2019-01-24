<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectRelease
 *
 * @ORM\Table(name="project_release", uniqueConstraints={@ORM\UniqueConstraint(name="pre_title", columns={"pre_prj_id", "pre_title"})})
 * @ORM\Entity
 */
class ProjectRelease
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pre_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $preId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pre_prj_id", type="integer", nullable=false)
     */
    private $prePrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="pre_title", type="string", length=128, nullable=false)
     */
    private $preTitle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pre_scheduled_date", type="date", nullable=false)
     */
    private $preScheduledDate;

    /**
     * @var string
     *
     * @ORM\Column(name="pre_status", type="string", nullable=false)
     */
    private $preStatus;


    /**
     * Get preId
     *
     * @return integer
     */
    public function getPreId()
    {
        return $this->preId;
    }

    /**
     * Set prePrjId
     *
     * @param integer $prePrjId
     * @return ProjectRelease
     */
    public function setPrePrjId($prePrjId)
    {
        $this->prePrjId = $prePrjId;

        return $this;
    }

    /**
     * Get prePrjId
     *
     * @return integer
     */
    public function getPrePrjId()
    {
        return $this->prePrjId;
    }

    /**
     * Set preTitle
     *
     * @param string $preTitle
     * @return ProjectRelease
     */
    public function setPreTitle($preTitle)
    {
        $this->preTitle = $preTitle;

        return $this;
    }

    /**
     * Get preTitle
     *
     * @return string
     */
    public function getPreTitle()
    {
        return $this->preTitle;
    }

    /**
     * Set preScheduledDate
     *
     * @param \DateTime $preScheduledDate
     * @return ProjectRelease
     */
    public function setPreScheduledDate($preScheduledDate)
    {
        $this->preScheduledDate = $preScheduledDate;

        return $this;
    }

    /**
     * Get preScheduledDate
     *
     * @return \DateTime
     */
    public function getPreScheduledDate()
    {
        return $this->preScheduledDate;
    }

    /**
     * Set preStatus
     *
     * @param string $preStatus
     * @return ProjectRelease
     */
    public function setPreStatus($preStatus)
    {
        $this->preStatus = $preStatus;

        return $this;
    }

    /**
     * Get preStatus
     *
     * @return string
     */
    public function getPreStatus()
    {
        return $this->preStatus;
    }
}
