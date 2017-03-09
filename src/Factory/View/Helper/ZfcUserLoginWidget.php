<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:54 PM
 */

namespace Zend\UserModule\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\UserModule\View;

class Zend\UserModuleLoginWidget implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $viewHelper = new View\Helper\Zend\UserModuleLoginWidget;
        $viewHelper->setViewTemplate($container->get('zenduser_module_options')->getUserLoginWidgetViewTemplate());
        $viewHelper->setLoginForm($container->get('zenduser_login_form'));
        return $viewHelper;
    }
}
