<?php

/*
 * This file is part of the Eventum (Issue Tracking System) package.
 *
 * @copyright (c) Eventum Team
 * @license GNU General Public License, version 2 or later (GPL-2+)
 *
 * For the full copyright and license information,
 * please see the COPYING and AUTHORS files
 * that were distributed with this source code.
 */

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
     * @var int
     *
     * @ORM\Column(name="rpr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rprId;

    /**
     * @var int
     *
     * @ORM\Column(name="rpr_rem_id", type="integer", nullable=false)
     */
    private $rprRemId;

    /**
     * @var int
     *
     * @ORM\Column(name="rpr_pro_id", type="integer", nullable=false)
     */
    private $rprProId;

    /**
     * Get rprId
     *
     * @return int
     */
    public function getRprId()
    {
        return $this->rprId;
    }

    /**
     * Set rprRemId
     *
     * @param int $rprRemId
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
     * @return int
     */
    public function getRprRemId()
    {
        return $this->rprRemId;
    }

    /**
     * Set rprProId
     *
     * @param int $rprProId
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
     * @return int
     */
    public function getRprProId()
    {
        return $this->rprProId;
    }
}
