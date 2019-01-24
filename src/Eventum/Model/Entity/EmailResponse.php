<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailResponse
 *
 * @ORM\Table(name="email_response", uniqueConstraints={@ORM\UniqueConstraint(name="ere_title", columns={"ere_title"})})
 * @ORM\Entity
 */
class EmailResponse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ere_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ereId;

    /**
     * @var string
     *
     * @ORM\Column(name="ere_title", type="string", length=64, nullable=false)
     */
    private $ereTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="ere_response_body", type="text", length=65535, nullable=false)
     */
    private $ereResponseBody;


    /**
     * Get ereId
     *
     * @return integer
     */
    public function getEreId()
    {
        return $this->ereId;
    }

    /**
     * Set ereTitle
     *
     * @param string $ereTitle
     * @return EmailResponse
     */
    public function setEreTitle($ereTitle)
    {
        $this->ereTitle = $ereTitle;

        return $this;
    }

    /**
     * Get ereTitle
     *
     * @return string
     */
    public function getEreTitle()
    {
        return $this->ereTitle;
    }

    /**
     * Set ereResponseBody
     *
     * @param string $ereResponseBody
     * @return EmailResponse
     */
    public function setEreResponseBody($ereResponseBody)
    {
        $this->ereResponseBody = $ereResponseBody;

        return $this;
    }

    /**
     * Get ereResponseBody
     *
     * @return string
     */
    public function getEreResponseBody()
    {
        return $this->ereResponseBody;
    }
}
