<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueCustomField
 *
 * @ORM\Table(name="issue_custom_field", indexes={@ORM\Index(name="icf_iss_id", columns={"icf_iss_id"}), @ORM\Index(name="icf_fld_id", columns={"icf_fld_id"}), @ORM\Index(name="ft_icf_value", columns={"icf_value"})})
 * @ORM\Entity
 */
class IssueCustomField
{
    /**
     * @var integer
     *
     * @ORM\Column(name="icf_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $icfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="icf_iss_id", type="integer", nullable=false)
     */
    private $icfIssId;

    /**
     * @var integer
     *
     * @ORM\Column(name="icf_fld_id", type="integer", nullable=false)
     */
    private $icfFldId;

    /**
     * @var string
     *
     * @ORM\Column(name="icf_value", type="text", length=65535, nullable=true)
     */
    private $icfValue;

    /**
     * @var integer
     *
     * @ORM\Column(name="icf_value_integer", type="integer", nullable=true)
     */
    private $icfValueInteger;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="icf_value_date", type="date", nullable=true)
     */
    private $icfValueDate;


    /**
     * Get icfId
     *
     * @return integer
     */
    public function getIcfId()
    {
        return $this->icfId;
    }

    /**
     * Set icfIssId
     *
     * @param integer $icfIssId
     * @return IssueCustomField
     */
    public function setIcfIssId($icfIssId)
    {
        $this->icfIssId = $icfIssId;

        return $this;
    }

    /**
     * Get icfIssId
     *
     * @return integer
     */
    public function getIcfIssId()
    {
        return $this->icfIssId;
    }

    /**
     * Set icfFldId
     *
     * @param integer $icfFldId
     * @return IssueCustomField
     */
    public function setIcfFldId($icfFldId)
    {
        $this->icfFldId = $icfFldId;

        return $this;
    }

    /**
     * Get icfFldId
     *
     * @return integer
     */
    public function getIcfFldId()
    {
        return $this->icfFldId;
    }

    /**
     * Set icfValue
     *
     * @param string $icfValue
     * @return IssueCustomField
     */
    public function setIcfValue($icfValue)
    {
        $this->icfValue = $icfValue;

        return $this;
    }

    /**
     * Get icfValue
     *
     * @return string
     */
    public function getIcfValue()
    {
        return $this->icfValue;
    }

    /**
     * Set icfValueInteger
     *
     * @param integer $icfValueInteger
     * @return IssueCustomField
     */
    public function setIcfValueInteger($icfValueInteger)
    {
        $this->icfValueInteger = $icfValueInteger;

        return $this;
    }

    /**
     * Get icfValueInteger
     *
     * @return integer
     */
    public function getIcfValueInteger()
    {
        return $this->icfValueInteger;
    }

    /**
     * Set icfValueDate
     *
     * @param \DateTime $icfValueDate
     * @return IssueCustomField
     */
    public function setIcfValueDate($icfValueDate)
    {
        $this->icfValueDate = $icfValueDate;

        return $this;
    }

    /**
     * Get icfValueDate
     *
     * @return \DateTime
     */
    public function getIcfValueDate()
    {
        return $this->icfValueDate;
    }
}
