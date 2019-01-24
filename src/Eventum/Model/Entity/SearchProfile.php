<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchProfile
 *
 * @ORM\Table(name="search_profile", uniqueConstraints={@ORM\UniqueConstraint(name="sep_usr_id", columns={"sep_usr_id", "sep_prj_id", "sep_type"})})
 * @ORM\Entity
 */
class SearchProfile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sep_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sepId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sep_usr_id", type="integer", nullable=false)
     */
    private $sepUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sep_prj_id", type="integer", nullable=false)
     */
    private $sepPrjId;

    /**
     * @var string
     *
     * @ORM\Column(name="sep_type", type="string", length=5, nullable=false)
     */
    private $sepType;

    /**
     * @var string
     *
     * @ORM\Column(name="sep_user_profile", type="blob", length=65535, nullable=false)
     */
    private $sepUserProfile;


    /**
     * Get sepId
     *
     * @return integer
     */
    public function getSepId()
    {
        return $this->sepId;
    }

    /**
     * Set sepUsrId
     *
     * @param integer $sepUsrId
     * @return SearchProfile
     */
    public function setSepUsrId($sepUsrId)
    {
        $this->sepUsrId = $sepUsrId;

        return $this;
    }

    /**
     * Get sepUsrId
     *
     * @return integer
     */
    public function getSepUsrId()
    {
        return $this->sepUsrId;
    }

    /**
     * Set sepPrjId
     *
     * @param integer $sepPrjId
     * @return SearchProfile
     */
    public function setSepPrjId($sepPrjId)
    {
        $this->sepPrjId = $sepPrjId;

        return $this;
    }

    /**
     * Get sepPrjId
     *
     * @return integer
     */
    public function getSepPrjId()
    {
        return $this->sepPrjId;
    }

    /**
     * Set sepType
     *
     * @param string $sepType
     * @return SearchProfile
     */
    public function setSepType($sepType)
    {
        $this->sepType = $sepType;

        return $this;
    }

    /**
     * Get sepType
     *
     * @return string
     */
    public function getSepType()
    {
        return $this->sepType;
    }

    /**
     * Set sepUserProfile
     *
     * @param string $sepUserProfile
     * @return SearchProfile
     */
    public function setSepUserProfile($sepUserProfile)
    {
        $this->sepUserProfile = $sepUserProfile;

        return $this;
    }

    /**
     * Get sepUserProfile
     *
     * @return string
     */
    public function getSepUserProfile()
    {
        return $this->sepUserProfile;
    }
}
