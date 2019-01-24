<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderPriority
 *
 * @ORM\Table(name="reminder_priority")
 * @ORM\Entity
 */
class ReminderPriority
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rep_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $repId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rep_rem_id", type="integer", nullable=false)
     */
    private $repRemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rep_pri_id", type="integer", nullable=false)
     */
    private $repPriId;


    /**
     * Get repId
     *
     * @return integer
     */
    public function getRepId()
    {
        return $this->repId;
    }

    /**
     * Set repRemId
     *
     * @param integer $repRemId
     * @return ReminderPriority
     */
    public function setRepRemId($repRemId)
    {
        $this->repRemId = $repRemId;

        return $this;
    }

    /**
     * Get repRemId
     *
     * @return integer
     */
    public function getRepRemId()
    {
        return $this->repRemId;
    }

    /**
     * Set repPriId
     *
     * @param integer $repPriId
     * @return ReminderPriority
     */
    public function setRepPriId($repPriId)
    {
        $this->repPriId = $repPriId;

        return $this;
    }

    /**
     * Get repPriId
     *
     * @return integer
     */
    public function getRepPriId()
    {
        return $this->repPriId;
    }
}
