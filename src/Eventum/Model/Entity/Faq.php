<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faq
 *
 * @ORM\Table(name="faq", uniqueConstraints={@ORM\UniqueConstraint(name="faq_title", columns={"faq_title"})})
 * @ORM\Entity
 */
class Faq
{
    /**
     * @var integer
     *
     * @ORM\Column(name="faq_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $faqId;

    /**
     * @var integer
     *
     * @ORM\Column(name="faq_prj_id", type="integer", nullable=false)
     */
    private $faqPrjId;

    /**
     * @var integer
     *
     * @ORM\Column(name="faq_usr_id", type="integer", nullable=false)
     */
    private $faqUsrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="faq_created_date", type="datetime", nullable=false)
     */
    private $faqCreatedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="faq_updated_date", type="datetime", nullable=true)
     */
    private $faqUpdatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="faq_title", type="string", length=255, nullable=false)
     */
    private $faqTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="faq_message", type="text", nullable=false)
     */
    private $faqMessage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="faq_rank", type="boolean", nullable=false)
     */
    private $faqRank;


    /**
     * Get faqId
     *
     * @return integer
     */
    public function getFaqId()
    {
        return $this->faqId;
    }

    /**
     * Set faqPrjId
     *
     * @param integer $faqPrjId
     * @return Faq
     */
    public function setFaqPrjId($faqPrjId)
    {
        $this->faqPrjId = $faqPrjId;

        return $this;
    }

    /**
     * Get faqPrjId
     *
     * @return integer
     */
    public function getFaqPrjId()
    {
        return $this->faqPrjId;
    }

    /**
     * Set faqUsrId
     *
     * @param integer $faqUsrId
     * @return Faq
     */
    public function setFaqUsrId($faqUsrId)
    {
        $this->faqUsrId = $faqUsrId;

        return $this;
    }

    /**
     * Get faqUsrId
     *
     * @return integer
     */
    public function getFaqUsrId()
    {
        return $this->faqUsrId;
    }

    /**
     * Set faqCreatedDate
     *
     * @param \DateTime $faqCreatedDate
     * @return Faq
     */
    public function setFaqCreatedDate($faqCreatedDate)
    {
        $this->faqCreatedDate = $faqCreatedDate;

        return $this;
    }

    /**
     * Get faqCreatedDate
     *
     * @return \DateTime
     */
    public function getFaqCreatedDate()
    {
        return $this->faqCreatedDate;
    }

    /**
     * Set faqUpdatedDate
     *
     * @param \DateTime $faqUpdatedDate
     * @return Faq
     */
    public function setFaqUpdatedDate($faqUpdatedDate)
    {
        $this->faqUpdatedDate = $faqUpdatedDate;

        return $this;
    }

    /**
     * Get faqUpdatedDate
     *
     * @return \DateTime
     */
    public function getFaqUpdatedDate()
    {
        return $this->faqUpdatedDate;
    }

    /**
     * Set faqTitle
     *
     * @param string $faqTitle
     * @return Faq
     */
    public function setFaqTitle($faqTitle)
    {
        $this->faqTitle = $faqTitle;

        return $this;
    }

    /**
     * Get faqTitle
     *
     * @return string
     */
    public function getFaqTitle()
    {
        return $this->faqTitle;
    }

    /**
     * Set faqMessage
     *
     * @param string $faqMessage
     * @return Faq
     */
    public function setFaqMessage($faqMessage)
    {
        $this->faqMessage = $faqMessage;

        return $this;
    }

    /**
     * Get faqMessage
     *
     * @return string
     */
    public function getFaqMessage()
    {
        return $this->faqMessage;
    }

    /**
     * Set faqRank
     *
     * @param boolean $faqRank
     * @return Faq
     */
    public function setFaqRank($faqRank)
    {
        $this->faqRank = $faqRank;

        return $this;
    }

    /**
     * Get faqRank
     *
     * @return boolean
     */
    public function getFaqRank()
    {
        return $this->faqRank;
    }
}
