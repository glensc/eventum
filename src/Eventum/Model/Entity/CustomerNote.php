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
 * CustomerNote
 *
 * @ORM\Table(name="customer_note", uniqueConstraints={@ORM\UniqueConstraint(name="cno_prj_id", columns={"cno_prj_id", "cno_customer_id"})})
 * @ORM\Entity
 */
class CustomerNote
{
    /**
     * @var int
     *
     * @ORM\Column(name="cno_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cnoId;

    /**
     * @var int
     *
     * @ORM\Column(name="cno_prj_id", type="integer", nullable=false)
     */
    private $cnoPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="cno_customer_id", type="string", length=128, nullable=false)
     */
    private $cnoCustomerId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cno_created_date", type="datetime", nullable=false)
     */
    private $cnoCreatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cno_updated_date", type="datetime", nullable=true)
     */
    private $cnoUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cno_note", type="text", length=65535, nullable=true)
     */
    private $cnoNote;

    /**
     * Get cnoId
     *
     * @return int
     */
    public function getCnoId()
    {
        return $this->cnoId;
    }

    /**
     * Set cnoPrjId
     *
     * @param int $cnoPrjId
     * @return CustomerNote
     */
    public function setCnoPrjId($cnoPrjId)
    {
        $this->cnoPrjId = $cnoPrjId;

        return $this;
    }

    /**
     * Get cnoPrjId
     *
     * @return int
     */
    public function getCnoPrjId()
    {
        return $this->cnoPrjId;
    }

    /**
     * Set cnoCustomerId
     *
     * @param string $cnoCustomerId
     * @return CustomerNote
     */
    public function setCnoCustomerId($cnoCustomerId)
    {
        $this->cnoCustomerId = $cnoCustomerId;

        return $this;
    }

    /**
     * Get cnoCustomerId
     *
     * @return string
     */
    public function getCnoCustomerId()
    {
        return $this->cnoCustomerId;
    }

    /**
     * Set cnoCreatedDate
     *
     * @param \DateTime $cnoCreatedDate
     * @return CustomerNote
     */
    public function setCnoCreatedDate($cnoCreatedDate)
    {
        $this->cnoCreatedDate = $cnoCreatedDate;

        return $this;
    }

    /**
     * Get cnoCreatedDate
     *
     * @return \DateTime
     */
    public function getCnoCreatedDate()
    {
        return $this->cnoCreatedDate;
    }

    /**
     * Set cnoUpdatedDate
     *
     * @param \DateTime $cnoUpdatedDate
     * @return CustomerNote
     */
    public function setCnoUpdatedDate($cnoUpdatedDate)
    {
        $this->cnoUpdatedDate = $cnoUpdatedDate;

        return $this;
    }

    /**
     * Get cnoUpdatedDate
     *
     * @return \DateTime
     */
    public function getCnoUpdatedDate()
    {
        return $this->cnoUpdatedDate;
    }

    /**
     * Set cnoNote
     *
     * @param string $cnoNote
     * @return CustomerNote
     */
    public function setCnoNote($cnoNote)
    {
        $this->cnoNote = $cnoNote;

        return $this;
    }

    /**
     * Get cnoNote
     *
     * @return string
     */
    public function getCnoNote()
    {
        return $this->cnoNote;
    }
}
