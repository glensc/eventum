<?php

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
     * @var boolean
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
     * @var boolean
     *
     * @ORM\Column(name="htt_role", type="boolean", nullable=true)
     */
    private $httRole;


    /**
     * Get httId
     *
     * @return boolean
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
     * @param boolean $httRole
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
     * @return boolean
     */
    public function getHttRole()
    {
        return $this->httRole;
    }
}
