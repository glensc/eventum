<?php

namespace Eventum\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Products
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Eventum\Model\Entity\Bugs", mappedBy="product")
     */
    private $bug;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bug = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Products
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add bug
     *
     * @param \Eventum\Model\Entity\Bugs $bug
     * @return Products
     */
    public function addBug(\Eventum\Model\Entity\Bugs $bug)
    {
        $this->bug[] = $bug;

        return $this;
    }

    /**
     * Remove bug
     *
     * @param \Eventum\Model\Entity\Bugs $bug
     */
    public function removeBug(\Eventum\Model\Entity\Bugs $bug)
    {
        $this->bug->removeElement($bug);
    }

    /**
     * Get bug
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBug()
    {
        return $this->bug;
    }
}
