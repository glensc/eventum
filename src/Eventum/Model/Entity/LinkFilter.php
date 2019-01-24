<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinkFilter
 *
 * @ORM\Table(name="link_filter")
 * @ORM\Entity
 */
class LinkFilter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="lfi_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lfiId;

    /**
     * @var string
     *
     * @ORM\Column(name="lfi_pattern", type="string", length=255, nullable=false)
     */
    private $lfiPattern;

    /**
     * @var string
     *
     * @ORM\Column(name="lfi_replacement", type="string", length=255, nullable=false)
     */
    private $lfiReplacement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lfi_usr_role", type="boolean", nullable=false)
     */
    private $lfiUsrRole;

    /**
     * @var string
     *
     * @ORM\Column(name="lfi_description", type="string", length=255, nullable=true)
     */
    private $lfiDescription;


    /**
     * Get lfiId
     *
     * @return integer
     */
    public function getLfiId()
    {
        return $this->lfiId;
    }

    /**
     * Set lfiPattern
     *
     * @param string $lfiPattern
     * @return LinkFilter
     */
    public function setLfiPattern($lfiPattern)
    {
        $this->lfiPattern = $lfiPattern;

        return $this;
    }

    /**
     * Get lfiPattern
     *
     * @return string
     */
    public function getLfiPattern()
    {
        return $this->lfiPattern;
    }

    /**
     * Set lfiReplacement
     *
     * @param string $lfiReplacement
     * @return LinkFilter
     */
    public function setLfiReplacement($lfiReplacement)
    {
        $this->lfiReplacement = $lfiReplacement;

        return $this;
    }

    /**
     * Get lfiReplacement
     *
     * @return string
     */
    public function getLfiReplacement()
    {
        return $this->lfiReplacement;
    }

    /**
     * Set lfiUsrRole
     *
     * @param boolean $lfiUsrRole
     * @return LinkFilter
     */
    public function setLfiUsrRole($lfiUsrRole)
    {
        $this->lfiUsrRole = $lfiUsrRole;

        return $this;
    }

    /**
     * Get lfiUsrRole
     *
     * @return boolean
     */
    public function getLfiUsrRole()
    {
        return $this->lfiUsrRole;
    }

    /**
     * Set lfiDescription
     *
     * @param string $lfiDescription
     * @return LinkFilter
     */
    public function setLfiDescription($lfiDescription)
    {
        $this->lfiDescription = $lfiDescription;

        return $this;
    }

    /**
     * Get lfiDescription
     *
     * @return string
     */
    public function getLfiDescription()
    {
        return $this->lfiDescription;
    }
}
