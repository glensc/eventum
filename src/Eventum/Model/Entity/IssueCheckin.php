<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueCheckin
 *
 * @ORM\Table(name="issue_checkin")
 * @ORM\Entity
 */
class IssueCheckin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="issue_id", type="integer", nullable=false)
     */
    private $issueId;

    /**
     * @var string
     *
     * @ORM\Column(name="commit_id", type="string", length=40, nullable=true)
     */
    private $commitId;

    /**
     * @var string
     *
     * @ORM\Column(name="reponame", type="string", length=255, nullable=false)
     */
    private $reponame;

    /**
     * @var string
     *
     * @ORM\Column(name="module", type="string", length=255, nullable=false)
     */
    private $module;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255, nullable=false)
     */
    private $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="old_version", type="string", length=40, nullable=true)
     */
    private $oldVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="new_version", type="string", length=40, nullable=true)
     */
    private $newVersion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=32, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="commit_msg", type="text", length=65535, nullable=true)
     */
    private $commitMsg;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set issueId
     *
     * @param integer $issueId
     * @return IssueCheckin
     */
    public function setIssueId($issueId)
    {
        $this->issueId = $issueId;

        return $this;
    }

    /**
     * Get issueId
     *
     * @return integer 
     */
    public function getIssueId()
    {
        return $this->issueId;
    }

    /**
     * Set commitId
     *
     * @param string $commitId
     * @return IssueCheckin
     */
    public function setCommitId($commitId)
    {
        $this->commitId = $commitId;

        return $this;
    }

    /**
     * Get commitId
     *
     * @return string 
     */
    public function getCommitId()
    {
        return $this->commitId;
    }

    /**
     * Set reponame
     *
     * @param string $reponame
     * @return IssueCheckin
     */
    public function setReponame($reponame)
    {
        $this->reponame = $reponame;

        return $this;
    }

    /**
     * Get reponame
     *
     * @return string 
     */
    public function getReponame()
    {
        return $this->reponame;
    }

    /**
     * Set module
     *
     * @param string $module
     * @return IssueCheckin
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return string 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return IssueCheckin
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set oldVersion
     *
     * @param string $oldVersion
     * @return IssueCheckin
     */
    public function setOldVersion($oldVersion)
    {
        $this->oldVersion = $oldVersion;

        return $this;
    }

    /**
     * Get oldVersion
     *
     * @return string 
     */
    public function getOldVersion()
    {
        return $this->oldVersion;
    }

    /**
     * Set newVersion
     *
     * @param string $newVersion
     * @return IssueCheckin
     */
    public function setNewVersion($newVersion)
    {
        $this->newVersion = $newVersion;

        return $this;
    }

    /**
     * Get newVersion
     *
     * @return string 
     */
    public function getNewVersion()
    {
        return $this->newVersion;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return IssueCheckin
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return IssueCheckin
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set commitMsg
     *
     * @param string $commitMsg
     * @return IssueCheckin
     */
    public function setCommitMsg($commitMsg)
    {
        $this->commitMsg = $commitMsg;

        return $this;
    }

    /**
     * Get commitMsg
     *
     * @return string 
     */
    public function getCommitMsg()
    {
        return $this->commitMsg;
    }
}
