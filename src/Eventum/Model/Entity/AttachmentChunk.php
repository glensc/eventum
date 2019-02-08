<?php

/*
 * This file is part of the Eventum (Issue Tracking System) package.
 *
 * @copyright (c) Eventum Team
 * @license GNU General Public License, version 2 or later (GPL-2+)
 *
 * For the full copyright and license information,
 * please see the COPYING and AUTHORS files
 * that were distributed with this source code.
 */

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
     * @var int
     *
     * @ORM\Column(name="path_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pathId;

    /**
     * @var int
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
     * @param int $pathId
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
     * @return int
     */
    public function getPathId()
    {
        return $this->pathId;
    }

    /**
     * Set chunkNo
     *
     * @param int $chunkNo
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
     * @return int
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
