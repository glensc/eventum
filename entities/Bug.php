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

use Doctrine\ORM\Mapping as ORM;

/**
 * Bug
 *
 * @ORM\Table(name="bugs")
 * @ORM\Entity(repositoryClass="BugRepository")
 */
class Bug
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="engineer_id", referencedColumnName="id")
     * })
     */
    private $engineer;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reporter_id", referencedColumnName="id")
     * })
     */
    private $reporter;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product")
     * @ORM\JoinTable(name="bug_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bug_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Bug
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Bug
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Bug
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set engineer
     *
     * @param \User $engineer
     * @return Bug
     */
    public function setEngineer(\User $engineer = null)
    {
        $this->engineer = $engineer;

        return $this;
    }

    /**
     * Get engineer
     *
     * @return \User
     */
    public function getEngineer()
    {
        return $this->engineer;
    }

    /**
     * Set reporter
     *
     * @param \User $reporter
     * @return Bug
     */
    public function setReporter(\User $reporter = null)
    {
        $this->reporter = $reporter;

        return $this;
    }

    /**
     * Get reporter
     *
     * @return \User
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * Add products
     *
     * @param \Product $products
     * @return Bug
     */
    public function addProduct(\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Product $products
     */
    public function removeProduct(\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}
