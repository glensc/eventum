<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectRoundRobin
 *
 * @ORM\Table(name="project_round_robin", uniqueConstraints={@ORM\UniqueConstraint(name="prr_prj_id", columns={"prr_prj_id"})})
 * @ORM\Entity
 */
class ProjectRoundRobin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="prr_prj_id", type="integer", nullable=false)
     */
    private $prrPrjId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prr_blackout_start", type="time", nullable=false)
     */
    private $prrBlackoutStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="prr_blackout_end", type="time", nullable=false)
     */
    private $prrBlackoutEnd;


    /**
     * Get prrId
     *
     * @return integer
     */
    public function getPrrId()
    {
        return $this->prrId;
    }

    /**
     * Set prrPrjId
     *
     * @param integer $prrPrjId
     * @return ProjectRoundRobin
     */
    public function setPrrPrjId($prrPrjId)
    {
        $this->prrPrjId = $prrPrjId;

        return $this;
    }

    /**
     * Get prrPrjId
     *
     * @return integer
     */
    public function getPrrPrjId()
    {
        return $this->prrPrjId;
    }

    /**
     * Set prrBlackoutStart
     *
     * @param \DateTime $prrBlackoutStart
     * @return ProjectRoundRobin
     */
    public function setPrrBlackoutStart($prrBlackoutStart)
    {
        $this->prrBlackoutStart = $prrBlackoutStart;

        return $this;
    }

    /**
     * Get prrBlackoutStart
     *
     * @return \DateTime
     */
    public function getPrrBlackoutStart()
    {
        return $this->prrBlackoutStart;
    }

    /**
     * Set prrBlackoutEnd
     *
     * @param \DateTime $prrBlackoutEnd
     * @return ProjectRoundRobin
     */
    public function setPrrBlackoutEnd($prrBlackoutEnd)
    {
        $this->prrBlackoutEnd = $prrBlackoutEnd;

        return $this;
    }

    /**
     * Get prrBlackoutEnd
     *
     * @return \DateTime
     */
    public function getPrrBlackoutEnd()
    {
        return $this->prrBlackoutEnd;
    }
}
