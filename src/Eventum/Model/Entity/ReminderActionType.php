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
 * ReminderActionType
 *
 * @ORM\Table(name="reminder_action_type", uniqueConstraints={@ORM\UniqueConstraint(name="rmt_type", columns={"rmt_type"}), @ORM\UniqueConstraint(name="rmt_title", columns={"rmt_title"})})
 * @ORM\Entity
 */
class ReminderActionType
{
    /**
     * @var bool
     *
     * @ORM\Column(name="rmt_id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmtId;

    /**
     * @var string
     *
     * @ORM\Column(name="rmt_type", type="string", length=32, nullable=false)
     */
    private $rmtType;

    /**
     * @var string
     *
     * @ORM\Column(name="rmt_title", type="string", length=64, nullable=false)
     */
    private $rmtTitle;

    /**
     * Get rmtId
     *
     * @return bool
     */
    public function getRmtId()
    {
        return $this->rmtId;
    }

    /**
     * Set rmtType
     *
     * @param string $rmtType
     * @return ReminderActionType
     */
    public function setRmtType($rmtType)
    {
        $this->rmtType = $rmtType;

        return $this;
    }

    /**
     * Get rmtType
     *
     * @return string
     */
    public function getRmtType()
    {
        return $this->rmtType;
    }

    /**
     * Set rmtTitle
     *
     * @param string $rmtTitle
     * @return ReminderActionType
     */
    public function setRmtTitle($rmtTitle)
    {
        $this->rmtTitle = $rmtTitle;

        return $this;
    }

    /**
     * Get rmtTitle
     *
     * @return string
     */
    public function getRmtTitle()
    {
        return $this->rmtTitle;
    }
}
