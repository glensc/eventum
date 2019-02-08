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
 * ReminderOperator
 *
 * @ORM\Table(name="reminder_operator", uniqueConstraints={@ORM\UniqueConstraint(name="rmo_title", columns={"rmo_title"})})
 * @ORM\Entity
 */
class ReminderOperator
{
    /**
     * @var bool
     *
     * @ORM\Column(name="rmo_id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmoId;

    /**
     * @var string
     *
     * @ORM\Column(name="rmo_title", type="string", length=32, nullable=true)
     */
    private $rmoTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="rmo_sql_representation", type="string", length=32, nullable=true)
     */
    private $rmoSqlRepresentation;

    /**
     * Get rmoId
     *
     * @return bool
     */
    public function getRmoId()
    {
        return $this->rmoId;
    }

    /**
     * Set rmoTitle
     *
     * @param string $rmoTitle
     * @return ReminderOperator
     */
    public function setRmoTitle($rmoTitle)
    {
        $this->rmoTitle = $rmoTitle;

        return $this;
    }

    /**
     * Get rmoTitle
     *
     * @return string
     */
    public function getRmoTitle()
    {
        return $this->rmoTitle;
    }

    /**
     * Set rmoSqlRepresentation
     *
     * @param string $rmoSqlRepresentation
     * @return ReminderOperator
     */
    public function setRmoSqlRepresentation($rmoSqlRepresentation)
    {
        $this->rmoSqlRepresentation = $rmoSqlRepresentation;

        return $this;
    }

    /**
     * Get rmoSqlRepresentation
     *
     * @return string
     */
    public function getRmoSqlRepresentation()
    {
        return $this->rmoSqlRepresentation;
    }
}
