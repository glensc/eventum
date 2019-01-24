<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IssueCheckin
 *
 * @ORM\Table(name="issue_checkin", indexes={@ORM\Index(name="isc_iss_id", columns={"isc_iss_id"}), @ORM\Index(name="isc_commitid", columns={"isc_commitid"})})
 * @ORM\Entity
 */
class IssueCheckin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="isc_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iscId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isc_iss_id", type="integer", nullable=false)
     */
    private $iscIssId;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_commitid", type="string", length=40, nullable=true)
     */
    private $iscCommitid;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_reponame", type="string", length=255, nullable=false)
     */
    private $iscReponame;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_module", type="string", length=255, nullable=false)
     */
    private $iscModule;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_filename", type="string", length=255, nullable=false)
     */
    private $iscFilename;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_old_version", type="string", length=40, nullable=true)
     */
    private $iscOldVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_new_version", type="string", length=40, nullable=true)
     */
    private $iscNewVersion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="isc_created_date", type="datetime", nullable=false)
     */
    private $iscCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_username", type="string", length=32, nullable=false)
     */
    private $iscUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="isc_commit_msg", type="text", length=16777215, nullable=true)
     */
    private $iscCommitMsg;


    /**
     * Get iscId
     *
     * @return integer
     */
    public function getIscId()
    {
        return $this->iscId;
    }

    /**
     * Set iscIssId
     *
     * @param integer $iscIssId
     * @return IssueCheckin
     */
    public function setIscIssId($iscIssId)
    {
        $this->iscIssId = $iscIssId;

        return $this;
    }

    /**
     * Get iscIssId
     *
     * @return integer
     */
    public function getIscIssId()
    {
        return $this->iscIssId;
    }

    /**
     * Set iscCommitid
     *
     * @param string $iscCommitid
     * @return IssueCheckin
     */
    public function setIscCommitid($iscCommitid)
    {
        $this->iscCommitid = $iscCommitid;

        return $this;
    }

    /**
     * Get iscCommitid
     *
     * @return string
     */
    public function getIscCommitid()
    {
        return $this->iscCommitid;
    }

    /**
     * Set iscReponame
     *
     * @param string $iscReponame
     * @return IssueCheckin
     */
    public function setIscReponame($iscReponame)
    {
        $this->iscReponame = $iscReponame;

        return $this;
    }

    /**
     * Get iscReponame
     *
     * @return string
     */
    public function getIscReponame()
    {
        return $this->iscReponame;
    }

    /**
     * Set iscModule
     *
     * @param string $iscModule
     * @return IssueCheckin
     */
    public function setIscModule($iscModule)
    {
        $this->iscModule = $iscModule;

        return $this;
    }

    /**
     * Get iscModule
     *
     * @return string
     */
    public function getIscModule()
    {
        return $this->iscModule;
    }

    /**
     * Set iscFilename
     *
     * @param string $iscFilename
     * @return IssueCheckin
     */
    public function setIscFilename($iscFilename)
    {
        $this->iscFilename = $iscFilename;

        return $this;
    }

    /**
     * Get iscFilename
     *
     * @return string
     */
    public function getIscFilename()
    {
        return $this->iscFilename;
    }

    /**
     * Set iscOldVersion
     *
     * @param string $iscOldVersion
     * @return IssueCheckin
     */
    public function setIscOldVersion($iscOldVersion)
    {
        $this->iscOldVersion = $iscOldVersion;

        return $this;
    }

    /**
     * Get iscOldVersion
     *
     * @return string
     */
    public function getIscOldVersion()
    {
        return $this->iscOldVersion;
    }

    /**
     * Set iscNewVersion
     *
     * @param string $iscNewVersion
     * @return IssueCheckin
     */
    public function setIscNewVersion($iscNewVersion)
    {
        $this->iscNewVersion = $iscNewVersion;

        return $this;
    }

    /**
     * Get iscNewVersion
     *
     * @return string
     */
    public function getIscNewVersion()
    {
        return $this->iscNewVersion;
    }

    /**
     * Set iscCreatedDate
     *
     * @param \DateTime $iscCreatedDate
     * @return IssueCheckin
     */
    public function setIscCreatedDate($iscCreatedDate)
    {
        $this->iscCreatedDate = $iscCreatedDate;

        return $this;
    }

    /**
     * Get iscCreatedDate
     *
     * @return \DateTime
     */
    public function getIscCreatedDate()
    {
        return $this->iscCreatedDate;
    }

    /**
     * Set iscUsername
     *
     * @param string $iscUsername
     * @return IssueCheckin
     */
    public function setIscUsername($iscUsername)
    {
        $this->iscUsername = $iscUsername;

        return $this;
    }

    /**
     * Get iscUsername
     *
     * @return string
     */
    public function getIscUsername()
    {
        return $this->iscUsername;
    }

    /**
     * Set iscCommitMsg
     *
     * @param string $iscCommitMsg
     * @return IssueCheckin
     */
    public function setIscCommitMsg($iscCommitMsg)
    {
        $this->iscCommitMsg = $iscCommitMsg;

        return $this;
    }

    /**
     * Get iscCommitMsg
     *
     * @return string
     */
    public function getIscCommitMsg()
    {
        return $this->iscCommitMsg;
    }
}
