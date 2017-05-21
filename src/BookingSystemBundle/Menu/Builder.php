<?php
namespace BookingSystemBundle\Menu;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use BookingSystemBundle\Entity\Group as Group;
use BookingSystemBundle\Entity\Menu as Menu;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
class Builder implements ContainerAwareInterface {
    use ContainerAwareTrait;
    public function mainMenu(FactoryInterface $factory, array $options) {
        $em = $this->container->get('doctrine')->getEntityManager('default');
        $this->groups = $this->container->get('security.token_storage')->getToken()->getUser()->getGroups();
        $securityContext = $this->container->get('security.authorization_checker');
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            foreach ($this->groups as $group) {
                foreach ($group->getMenus() as $menuItem) {
                    if ($menuItem->getSubLevel() == 0) {
                        $menu->addChild($menuItem->getName(), array('uri' => '#', 'label' => $menuItem->getName()))
                                ->setAttribute('dropdown', true)
                                ->setAttribute('icon', 'icon-user');
                    } else {
                        $rootLevel = $em->getRepository('BookingSystemBundle:Menu')->findOneByLevel($menuItem->getLevel());
                        //\Doctrine\Common\Util\Debug::dump($rootLevel); $menuItem->getRoute()
                        $menu[$rootLevel->getName()]->addChild($menuItem->getName(), array('route' => $menuItem->getRoute()));
                    }
                }
            }
        }
        return $menu;
    }
}