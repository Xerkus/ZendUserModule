<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:48 PM
 */

namespace Zend\UserModule\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\UserModule\Controller;

class Zend\UserModuleAuthentication implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $authService = $serviceLocator->get('zenduser_auth_service');
        $authAdapter = $serviceLocator->get('Zend\UserModule\Authentication\Adapter\AdapterChain');
        $controllerPlugin = new Controller\Plugin\Zend\UserModuleAuthentication;
        $controllerPlugin->setAuthService($authService);
        $controllerPlugin->setAuthAdapter($authAdapter);
        return $controllerPlugin;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceManager
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $serviceLocator = $serviceManager->getServiceLocator();
        return $this->__invoke($serviceLocator, null);
    }
}
