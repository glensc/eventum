<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bugs
 *
 * @ORM\Table(name="bugs", indexes={@ORM\Index(name="IDX_1E197C9F8D8CDF1", columns={"engineer_id"}), @ORM\Index(name="IDX_1E197C9E1CFE6F5", columns={"reporter_id"})})
 * @ORM\Entity
 */
class Bugs
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var \Eventum\Model\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Eventum\Model\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reporter_id", referencedColumnName="id")
     * })
     */
    private $reporter;

    /**
     * @var \Eventum\Model\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Eventum\Model\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="engineer_id", referencedColumnName="id")
     * })
     */
    private $engineer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Eventum\Model\Entity\Products", inversedBy="bug")
     * @ORM\JoinTable(name="bug_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bug_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *   }
     * )
     */
    private $product;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set description
     *
     * @param string $description
     * @return Bugs
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
     * @return Bugs
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
     * @return Bugs
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
     * Set reporter
     *
     * @param \Eventum\Model\Entity\Users $reporter
     * @return Bugs
     */
    public function setReporter(\Eventum\Model\Entity\Users $reporter = null)
    {
        $this->reporter = $reporter;

        return $this;
    }

    /**
     * Get reporter
     *
     * @return \Eventum\Model\Entity\Users 
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * Set engineer
     *
     * @param \Eventum\Model\Entity\Users $engineer
     * @return Bugs
     */
    public function setEngineer(\Eventum\Model\Entity\Users $engineer = null)
    {
        $this->engineer = $engineer;

        return $this;
    }

    /**
     * Get engineer
     *
     * @return \Eventum\Model\Entity\Users 
     */
    public function getEngineer()
    {
        return $this->engineer;
    }

    /**
     * Add product
     *
     * @param \Eventum\Model\Entity\Products $product
     * @return Bugs
     */
    public function addProduct(\Eventum\Model\Entity\Products $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Eventum\Model\Entity\Products $product
     */
    public function removeProduct(\Eventum\Model\Entity\Products $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
