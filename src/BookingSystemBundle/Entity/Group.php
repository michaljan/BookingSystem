<?php
namespace BookingSystemBundle\Entity;
use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_group")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;
     
     /**
     * @ORM\ManyToMany(targetEntity="BookingSystemBundle\Entity\Menu", inversedBy="groups")
     * @ORM\JoinTable(name="groups_menus")
     **/
    private $menus;
    
    public function __construct() {
        
        $this->menus = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * 
     * @return Doctrine\Common\Collections\Collection 
     */
    
    public function getMenus()
    {
        return $this->menus;
    }
    
    
    public function setMenus(BookingSystemBundle\Entity\Menu $menus)
    {
        $this->menus = $menus;
        return $this;
    }
}