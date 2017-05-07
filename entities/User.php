<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
     */
    private $reportedBugs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
     */
    private $assignedBugs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reportedBugs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->assignedBugs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return User
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
     * Add reportedBugs
     *
     * @param \Bug $reportedBugs
     * @return User
     */
    public function addReportedBug(\Bug $reportedBugs)
    {
        $this->reportedBugs[] = $reportedBugs;

        return $this;
    }

    /**
     * Remove reportedBugs
     *
     * @param \Bug $reportedBugs
     */
    public function removeReportedBug(\Bug $reportedBugs)
    {
        $this->reportedBugs->removeElement($reportedBugs);
    }

    /**
     * Get reportedBugs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }

    /**
     * Add assignedBugs
     *
     * @param \Bug $assignedBugs
     * @return User
     */
    public function addAssignedBug(\Bug $assignedBugs)
    {
        $this->assignedBugs[] = $assignedBugs;

        return $this;
    }

    /**
     * Remove assignedBugs
     *
     * @param \Bug $assignedBugs
     */
    public function removeAssignedBug(\Bug $assignedBugs)
    {
        $this->assignedBugs->removeElement($assignedBugs);
    }

    /**
     * Get assignedBugs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }
}
