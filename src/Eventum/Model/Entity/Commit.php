<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commit
 *
 * @ORM\Table(name="commit")
 * @ORM\Entity
 */
class Commit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="com_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $comId;

    /**
     * @var string
     *
     * @ORM\Column(name="com_scm_name", type="string", length=255, nullable=false)
     */
    private $comScmName;

    /**
     * @var string
     *
     * @ORM\Column(name="com_commit_id", type="string", length=40, nullable=false)
     */
    private $comCommitId;

    /**
     * @var string
     *
     * @ORM\Column(name="com_author_email", type="string", length=255, nullable=true)
     */
    private $comAuthorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="com_author_name", type="string", length=255, nullable=true)
     */
    private $comAuthorName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_commit_date", type="datetime", nullable=false)
     */
    private $comCommitDate;

    /**
     * @var string
     *
     * @ORM\Column(name="com_message", type="text", length=16777215, nullable=true)
     */
    private $comMessage;


    /**
     * Get comId
     *
     * @return integer 
     */
    public function getComId()
    {
        return $this->comId;
    }

    /**
     * Set comScmName
     *
     * @param string $comScmName
     * @return Commit
     */
    public function setComScmName($comScmName)
    {
        $this->comScmName = $comScmName;

        return $this;
    }

    /**
     * Get comScmName
     *
     * @return string 
     */
    public function getComScmName()
    {
        return $this->comScmName;
    }

    /**
     * Set comCommitId
     *
     * @param string $comCommitId
     * @return Commit
     */
    public function setComCommitId($comCommitId)
    {
        $this->comCommitId = $comCommitId;

        return $this;
    }

    /**
     * Get comCommitId
     *
     * @return string 
     */
    public function getComCommitId()
    {
        return $this->comCommitId;
    }

    /**
     * Set comAuthorEmail
     *
     * @param string $comAuthorEmail
     * @return Commit
     */
    public function setComAuthorEmail($comAuthorEmail)
    {
        $this->comAuthorEmail = $comAuthorEmail;

        return $this;
    }

    /**
     * Get comAuthorEmail
     *
     * @return string 
     */
    public function getComAuthorEmail()
    {
        return $this->comAuthorEmail;
    }

    /**
     * Set comAuthorName
     *
     * @param string $comAuthorName
     * @return Commit
     */
    public function setComAuthorName($comAuthorName)
    {
        $this->comAuthorName = $comAuthorName;

        return $this;
    }

    /**
     * Get comAuthorName
     *
     * @return string 
     */
    public function getComAuthorName()
    {
        return $this->comAuthorName;
    }

    /**
     * Set comCommitDate
     *
     * @param \DateTime $comCommitDate
     * @return Commit
     */
    public function setComCommitDate($comCommitDate)
    {
        $this->comCommitDate = $comCommitDate;

        return $this;
    }

    /**
     * Get comCommitDate
     *
     * @return \DateTime 
     */
    public function getComCommitDate()
    {
        return $this->comCommitDate;
    }

    /**
     * Set comMessage
     *
     * @param string $comMessage
     * @return Commit
     */
    public function setComMessage($comMessage)
    {
        $this->comMessage = $comMessage;

        return $this;
    }

    /**
     * Get comMessage
     *
     * @return string 
     */
    public function getComMessage()
    {
        return $this->comMessage;
    }
}
