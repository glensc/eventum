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
 * HistoryType
 *
 * @ORM\Table(name="history_type", uniqueConstraints={@ORM\UniqueConstraint(name="htt_name", columns={"htt_name"})})
 * @ORM\Entity
 */
class HistoryType
{
    /**
     * @var bool
     *
     * @ORM\Column(name="htt_id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $httId;

    /**
     * @var string
     *
     * @ORM\Column(name="htt_name", type="string", length=25, nullable=false)
     */
    private $httName;

    /**
     * @var bool
     *
     * @ORM\Column(name="htt_role", type="boolean", nullable=true)
     */
    private $httRole;

    /**
     * Get httId
     *
     * @return bool
     */
    public function getHttId()
    {
        return $this->httId;
    }

    /**
     * Set httName
     *
     * @param string $httName
     * @return HistoryType
     */
    public function setHttName($httName)
    {
        $this->httName = $httName;

        return $this;
    }

    /**
     * Get httName
     *
     * @return string
     */
    public function getHttName()
    {
        return $this->httName;
    }

    /**
     * Set httRole
     *
     * @param bool $httRole
     * @return HistoryType
     */
    public function setHttRole($httRole)
    {
        $this->httRole = $httRole;

        return $this;
    }

    /**
     * Get httRole
     *
     * @return bool
     */
    public function getHttRole()
    {
        return $this->httRole;
    }
}
