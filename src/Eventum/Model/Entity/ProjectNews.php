<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectNews
 *
 * @ORM\Table(name="project_news")
 * @ORM\Entity
 */
class ProjectNews
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prn_prj_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prnPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="prn_nws_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prnNwsId;


    /**
     * Set prnPrjId
     *
     * @param integer $prnPrjId
     * @return ProjectNews
     */
    public function setPrnPrjId($prnPrjId)
    {
        $this->prnPrjId = $prnPrjId;

        return $this;
    }

    /**
     * Get prnPrjId
     *
     * @return integer
     */
    public function getPrnPrjId()
    {
        return $this->prnPrjId;
    }

    /**
     * Set prnNwsId
     *
     * @param integer $prnNwsId
     * @return ProjectNews
     */
    public function setPrnNwsId($prnNwsId)
    {
        $this->prnNwsId = $prnNwsId;

        return $this;
    }

    /**
     * Get prnNwsId
     *
     * @return integer
     */
    public function getPrnNwsId()
    {
        return $this->prnNwsId;
    }
}
