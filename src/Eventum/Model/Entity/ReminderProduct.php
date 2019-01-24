<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderProduct
 *
 * @ORM\Table(name="reminder_product")
 * @ORM\Entity
 */
class ReminderProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rpr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rprId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rpr_rem_id", type="integer", nullable=false)
     */
    private $rprRemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rpr_pro_id", type="integer", nullable=false)
     */
    private $rprProId;


    /**
     * Get rprId
     *
     * @return integer
     */
    public function getRprId()
    {
        return $this->rprId;
    }

    /**
     * Set rprRemId
     *
     * @param integer $rprRemId
     * @return ReminderProduct
     */
    public function setRprRemId($rprRemId)
    {
        $this->rprRemId = $rprRemId;

        return $this;
    }

    /**
     * Get rprRemId
     *
     * @return integer
     */
    public function getRprRemId()
    {
        return $this->rprRemId;
    }

    /**
     * Set rprProId
     *
     * @param integer $rprProId
     * @return ReminderProduct
     */
    public function setRprProId($rprProId)
    {
        $this->rprProId = $rprProId;

        return $this;
    }

    /**
     * Get rprProId
     *
     * @return integer
     */
    public function getRprProId()
    {
        return $this->rprProId;
    }
}
