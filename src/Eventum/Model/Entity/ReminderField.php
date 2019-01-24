<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReminderField
 *
 * @ORM\Table(name="reminder_field", uniqueConstraints={@ORM\UniqueConstraint(name="rmf_title", columns={"rmf_title"})})
 * @ORM\Entity
 */
class ReminderField
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="rmf_id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rmfId;

    /**
     * @var string
     *
     * @ORM\Column(name="rmf_title", type="string", length=128, nullable=false)
     */
    private $rmfTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="rmf_sql_field", type="string", length=32, nullable=false)
     */
    private $rmfSqlField;

    /**
     * @var string
     *
     * @ORM\Column(name="rmf_sql_representation", type="string", length=255, nullable=false)
     */
    private $rmfSqlRepresentation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="rmf_allow_column_compare", type="boolean", nullable=true)
     */
    private $rmfAllowColumnCompare;


    /**
     * Get rmfId
     *
     * @return boolean
     */
    public function getRmfId()
    {
        return $this->rmfId;
    }

    /**
     * Set rmfTitle
     *
     * @param string $rmfTitle
     * @return ReminderField
     */
    public function setRmfTitle($rmfTitle)
    {
        $this->rmfTitle = $rmfTitle;

        return $this;
    }

    /**
     * Get rmfTitle
     *
     * @return string
     */
    public function getRmfTitle()
    {
        return $this->rmfTitle;
    }

    /**
     * Set rmfSqlField
     *
     * @param string $rmfSqlField
     * @return ReminderField
     */
    public function setRmfSqlField($rmfSqlField)
    {
        $this->rmfSqlField = $rmfSqlField;

        return $this;
    }

    /**
     * Get rmfSqlField
     *
     * @return string
     */
    public function getRmfSqlField()
    {
        return $this->rmfSqlField;
    }

    /**
     * Set rmfSqlRepresentation
     *
     * @param string $rmfSqlRepresentation
     * @return ReminderField
     */
    public function setRmfSqlRepresentation($rmfSqlRepresentation)
    {
        $this->rmfSqlRepresentation = $rmfSqlRepresentation;

        return $this;
    }

    /**
     * Get rmfSqlRepresentation
     *
     * @return string
     */
    public function getRmfSqlRepresentation()
    {
        return $this->rmfSqlRepresentation;
    }

    /**
     * Set rmfAllowColumnCompare
     *
     * @param boolean $rmfAllowColumnCompare
     * @return ReminderField
     */
    public function setRmfAllowColumnCompare($rmfAllowColumnCompare)
    {
        $this->rmfAllowColumnCompare = $rmfAllowColumnCompare;

        return $this;
    }

    /**
     * Get rmfAllowColumnCompare
     *
     * @return boolean
     */
    public function getRmfAllowColumnCompare()
    {
        return $this->rmfAllowColumnCompare;
    }
}
