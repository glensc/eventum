<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderSeverity
 *
 * @ORM\Table(name="reminder_severity")
 * @ORM\Entity
 */
class ReminderSeverity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rms_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rms_rem_id", type="integer", nullable=false)
     */
    private $rmsRemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rms_sev_id", type="integer", nullable=false)
     */
    private $rmsSevId;


    /**
     * Get rmsId
     *
     * @return integer
     */
    public function getRmsId()
    {
        return $this->rmsId;
    }

    /**
     * Set rmsRemId
     *
     * @param integer $rmsRemId
     * @return ReminderSeverity
     */
    public function setRmsRemId($rmsRemId)
    {
        $this->rmsRemId = $rmsRemId;

        return $this;
    }

    /**
     * Get rmsRemId
     *
     * @return integer
     */
    public function getRmsRemId()
    {
        return $this->rmsRemId;
    }

    /**
     * Set rmsSevId
     *
     * @param integer $rmsSevId
     * @return ReminderSeverity
     */
    public function setRmsSevId($rmsSevId)
    {
        $this->rmsSevId = $rmsSevId;

        return $this;
    }

    /**
     * Get rmsSevId
     *
     * @return integer
     */
    public function getRmsSevId()
    {
        return $this->rmsSevId;
    }
}
