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
 * SupportEmailBody
 *
 * @ORM\Table(name="support_email_body", indexes={@ORM\Index(name="ft_support_email", columns={"seb_body"})})
 * @ORM\Entity
 */
class SupportEmailBody
{
    /**
     * @var int
     *
     * @ORM\Column(name="seb_sup_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sebSupId;

    /**
     * @var string
     *
     * @ORM\Column(name="seb_body", type="text", nullable=false)
     */
    private $sebBody;

    /**
     * @var string
     *
     * @ORM\Column(name="seb_full_email", type="blob", nullable=false)
     */
    private $sebFullEmail;

    /**
     * Get sebSupId
     *
     * @return int
     */
    public function getSebSupId()
    {
        return $this->sebSupId;
    }

    /**
     * Set sebBody
     *
     * @param string $sebBody
     * @return SupportEmailBody
     */
    public function setSebBody($sebBody)
    {
        $this->sebBody = $sebBody;

        return $this;
    }

    /**
     * Get sebBody
     *
     * @return string
     */
    public function getSebBody()
    {
        return $this->sebBody;
    }

    /**
     * Set sebFullEmail
     *
     * @param string $sebFullEmail
     * @return SupportEmailBody
     */
    public function setSebFullEmail($sebFullEmail)
    {
        $this->sebFullEmail = $sebFullEmail;

        return $this;
    }

    /**
     * Get sebFullEmail
     *
     * @return string
     */
    public function getSebFullEmail()
    {
        return $this->sebFullEmail;
    }
}
