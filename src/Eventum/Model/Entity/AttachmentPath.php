<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttachmentPath
 *
 * @ORM\Table(name="attachment_path")
 * @ORM\Entity
 */
class AttachmentPath
{
    /**
     * @var integer
     *
     * @ORM\Column(name="path_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pathId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="mimetype", type="string", length=255, nullable=true)
     */
    private $mimetype;

    /**
     * @var string
     *
     * @ORM\Column(name="visibility", type="string", length=25, nullable=true)
     */
    private $visibility;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_compressed", type="boolean", nullable=false)
     */
    private $isCompressed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_ts", type="datetime", nullable=false)
     */
    private $updateTs;


    /**
     * Get pathId
     *
     * @return integer
     */
    public function getPathId()
    {
        return $this->pathId;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return AttachmentPath
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return AttachmentPath
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set mimetype
     *
     * @param string $mimetype
     * @return AttachmentPath
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    /**
     * Get mimetype
     *
     * @return string
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Set visibility
     *
     * @param string $visibility
     * @return AttachmentPath
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get visibility
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return AttachmentPath
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set isCompressed
     *
     * @param boolean $isCompressed
     * @return AttachmentPath
     */
    public function setIsCompressed($isCompressed)
    {
        $this->isCompressed = $isCompressed;

        return $this;
    }

    /**
     * Get isCompressed
     *
     * @return boolean
     */
    public function getIsCompressed()
    {
        return $this->isCompressed;
    }

    /**
     * Set updateTs
     *
     * @param \DateTime $updateTs
     * @return AttachmentPath
     */
    public function setUpdateTs($updateTs)
    {
        $this->updateTs = $updateTs;

        return $this;
    }

    /**
     * Get updateTs
     *
     * @return \DateTime
     */
    public function getUpdateTs()
    {
        return $this->updateTs;
    }
}
