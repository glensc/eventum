<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderHistory
 *
 * @ORM\Table(name="reminder_history")
 * @ORM\Entity
 */
class ReminderHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rmh_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmhId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rmh_iss_id", type="integer", nullable=false)
     */
    private $rmhIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rmh_rma_id", type="integer", nullable=false)
     */
    private $rmhRmaId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rmh_created_date", type="datetime", nullable=false)
     */
    private $rmhCreatedDate;


    /**
     * Get rmhId
     *
     * @return integer
     */
    public function getRmhId()
    {
        return $this->rmhId;
    }

    /**
     * Set rmhIssId
     *
     * @param integer $rmhIssId
     * @return ReminderHistory
     */
    public function setRmhIssId($rmhIssId)
    {
        $this->rmhIssId = $rmhIssId;

        return $this;
    }

    /**
     * Get rmhIssId
     *
     * @return integer
     */
    public function getRmhIssId()
    {
        return $this->rmhIssId;
    }

    /**
     * Set rmhRmaId
     *
     * @param integer $rmhRmaId
     * @return ReminderHistory
     */
    public function setRmhRmaId($rmhRmaId)
    {
        $this->rmhRmaId = $rmhRmaId;

        return $this;
    }

    /**
     * Get rmhRmaId
     *
     * @return integer
     */
    public function getRmhRmaId()
    {
        return $this->rmhRmaId;
    }

    /**
     * Set rmhCreatedDate
     *
     * @param \DateTime $rmhCreatedDate
     * @return ReminderHistory
     */
    public function setRmhCreatedDate($rmhCreatedDate)
    {
        $this->rmhCreatedDate = $rmhCreatedDate;

        return $this;
    }

    /**
     * Get rmhCreatedDate
     *
     * @return \DateTime
     */
    public function getRmhCreatedDate()
    {
        return $this->rmhCreatedDate;
    }
}
