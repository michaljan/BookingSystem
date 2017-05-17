<?php
namespace BookingSystemBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Menu
 *
 * @ORM\Table(name="menu", uniqueConstraints={@ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"}), @ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;
    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level;
    /**
     * @var integer
     *
     * @ORM\Column(name="sub_level", type="integer", nullable=false)
     */
    private $subLevel;
    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=45, nullable=false)
     */
    private $route;
    
    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=45, nullable=true)
     */
    private $icon;
    
    /**
     * @ORM\ManyToMany(targetEntity="BookingSystemBundle\Entity\Group", mappedBy="menus")
     * @ORM\JoinTable(name="groups_menus")
     **/
    private $groups;
    public function __construct() {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Menu
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
     * Set level
     *
     * @param integer $level
     * @return Menu
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }
    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }
    /**
     * Set subLevel
     *
     * @param integer $subLevel
     * @return Menu
     */
    public function setSubLevel($subLevel)
    {
        $this->subLevel = $subLevel;
        return $this;
    }
    /**
     * Get subLevel
     *
     * @return integer 
     */
    public function getSubLevel()
    {
        return $this->subLevel;
    }
    /**
     * Set route
     *
     * @param string $route
     * @return Menu
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }
    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }
    
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }
    /**
     * 
     * @return Doctrine\Common\Collections\Collection 
     */
    
    public function getGroups()
    {
        return $this->groups;
    }
     /**
     * Set icon
     *
     * @param string $icon
     * @return Menu
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }
    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }
    
}