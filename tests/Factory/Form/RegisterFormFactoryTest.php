<?php
namespace Zend\UserModuleTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use Zend\Hydrator\ClassMethods;
use Zend\UserModule\Factory\Form\Register as RegisterFactory;
use Zend\UserModule\Options\ModuleOptions;
use Zend\UserModule\Mapper\User as UserMapper;

class RegisterFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zenduser_module_options', new ModuleOptions);
        $serviceManager->setService('zenduser_user_mapper', new UserMapper);
        $serviceManager->setService('zenduser_register_form_hydrator', new ClassMethods());

        $formElementManager = new FormElementManager($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new RegisterFactory();

        $this->assertInstanceOf('Zend\UserModule\Form\Register', $factory->__invoke($serviceManager, 'Zend\UserModule\Form\Register'));
    }
}
