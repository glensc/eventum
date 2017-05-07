<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommitFile
 *
 * @ORM\Table(name="commit_file")
 * @ORM\Entity
 */
class CommitFile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cof_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cofId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cof_com_id", type="integer", nullable=false)
     */
    private $cofComId;

    /**
     * @var string
     *
     * @ORM\Column(name="cof_project_name", type="string", length=255, nullable=false)
     */
    private $cofProjectName;

    /**
     * @var string
     *
     * @ORM\Column(name="cof_filename", type="string", length=255, nullable=false)
     */
    private $cofFilename;

    /**
     * @var string
     *
     * @ORM\Column(name="cof_old_version", type="string", length=40, nullable=true)
     */
    private $cofOldVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="cof_new_version", type="string", length=40, nullable=true)
     */
    private $cofNewVersion;


    /**
     * Get cofId
     *
     * @return integer 
     */
    public function getCofId()
    {
        return $this->cofId;
    }

    /**
     * Set cofComId
     *
     * @param integer $cofComId
     * @return CommitFile
     */
    public function setCofComId($cofComId)
    {
        $this->cofComId = $cofComId;

        return $this;
    }

    /**
     * Get cofComId
     *
     * @return integer 
     */
    public function getCofComId()
    {
        return $this->cofComId;
    }

    /**
     * Set cofProjectName
     *
     * @param string $cofProjectName
     * @return CommitFile
     */
    public function setCofProjectName($cofProjectName)
    {
        $this->cofProjectName = $cofProjectName;

        return $this;
    }

    /**
     * Get cofProjectName
     *
     * @return string 
     */
    public function getCofProjectName()
    {
        return $this->cofProjectName;
    }

    /**
     * Set cofFilename
     *
     * @param string $cofFilename
     * @return CommitFile
     */
    public function setCofFilename($cofFilename)
    {
        $this->cofFilename = $cofFilename;

        return $this;
    }

    /**
     * Get cofFilename
     *
     * @return string 
     */
    public function getCofFilename()
    {
        return $this->cofFilename;
    }

    /**
     * Set cofOldVersion
     *
     * @param string $cofOldVersion
     * @return CommitFile
     */
    public function setCofOldVersion($cofOldVersion)
    {
        $this->cofOldVersion = $cofOldVersion;

        return $this;
    }

    /**
     * Get cofOldVersion
     *
     * @return string 
     */
    public function getCofOldVersion()
    {
        return $this->cofOldVersion;
    }

    /**
     * Set cofNewVersion
     *
     * @param string $cofNewVersion
     * @return CommitFile
     */
    public function setCofNewVersion($cofNewVersion)
    {
        $this->cofNewVersion = $cofNewVersion;

        return $this;
    }

    /**
     * Get cofNewVersion
     *
     * @return string 
     */
    public function getCofNewVersion()
    {
        return $this->cofNewVersion;
    }
}
