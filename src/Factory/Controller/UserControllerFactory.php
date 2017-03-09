<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:50 PM
 */

namespace Zend\UserModule\Factory\Controller;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\UserModule\Controller\RedirectCallback;
use Zend\UserModule\Controller\UserController;

class UserControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
    {
        /* @var RedirectCallback $redirectCallback */
        $redirectCallback = $serviceManager->get('zenduser_redirect_callback');

        /* @var UserController $controller */
        $controller = new UserController($redirectCallback);
        $controller->setServiceLocator($serviceManager);

        $controller->setChangeEmailForm($serviceManager->get('zenduser_change_email_form'));
        $controller->setOptions($serviceManager->get('zenduser_module_options'));
        $controller->setChangePasswordForm($serviceManager->get('zenduser_change_password_form'));
        $controller->setLoginForm($serviceManager->get('zenduser_login_form'));
        $controller->setRegisterForm($serviceManager->get('zenduser_register_form'));
        $controller->setUserService($serviceManager->get('zenduser_user_service'));

        return $controller;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /* @var ControllerManager $controllerManager*/
        $serviceManager = $controllerManager->getServiceLocator();

        return $this->__invoke($serviceManager, null);
    }
}
