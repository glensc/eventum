<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderTriggeredAction
 *
 * @ORM\Table(name="reminder_triggered_action")
 * @ORM\Entity
 */
class ReminderTriggeredAction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rta_iss_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rtaIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rta_rma_id", type="integer", nullable=false)
     */
    private $rtaRmaId;


    /**
     * Get rtaIssId
     *
     * @return integer
     */
    public function getRtaIssId()
    {
        return $this->rtaIssId;
    }

    /**
     * Set rtaRmaId
     *
     * @param integer $rtaRmaId
     * @return ReminderTriggeredAction
     */
    public function setRtaRmaId($rtaRmaId)
    {
        $this->rtaRmaId = $rtaRmaId;

        return $this;
    }

    /**
     * Get rtaRmaId
     *
     * @return integer
     */
    public function getRtaRmaId()
    {
        return $this->rtaRmaId;
    }
}
