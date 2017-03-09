<?php
namespace Zend\UserModuleTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use Zend\UserModule\Factory\Form\Login as LoginFactory;
use Zend\UserModule\Options\ModuleOptions;

class LoginFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zenduser_module_options', new ModuleOptions);

        $formElementManager = new FormElementManager($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new LoginFactory();

        $this->assertInstanceOf('Zend\UserModule\Form\Login', $factory->__invoke($serviceManager, 'Zend\UserModule\Form\Login'));
    }
}
