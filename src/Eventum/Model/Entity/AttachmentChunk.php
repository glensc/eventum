<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttachmentChunk
 *
 * @ORM\Table(name="attachment_chunk")
 * @ORM\Entity
 */
class AttachmentChunk
{
    /**
     * @var integer
     *
     * @ORM\Column(name="path_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pathId;

    /**
     * @var integer
     *
     * @ORM\Column(name="chunk_no", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $chunkNo;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="blob", length=16777215, nullable=false)
     */
    private $content;


    /**
     * Set pathId
     *
     * @param integer $pathId
     * @return AttachmentChunk
     */
    public function setPathId($pathId)
    {
        $this->pathId = $pathId;

        return $this;
    }

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
     * Set chunkNo
     *
     * @param integer $chunkNo
     * @return AttachmentChunk
     */
    public function setChunkNo($chunkNo)
    {
        $this->chunkNo = $chunkNo;

        return $this;
    }

    /**
     * Get chunkNo
     *
     * @return integer
     */
    public function getChunkNo()
    {
        return $this->chunkNo;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return AttachmentChunk
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
