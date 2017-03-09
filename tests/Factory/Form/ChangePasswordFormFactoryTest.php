<?php
namespace Zend\UserModuleTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use Zend\UserModule\Factory\Form\ChangePassword as ChangePasswordFactory;
use Zend\UserModule\Options\ModuleOptions;
use Zend\UserModule\Mapper\User as UserMapper;

class ChangePasswordFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('zenduser_module_options', new ModuleOptions);
        $serviceManager->setService('zenduser_user_mapper', new UserMapper);

        $formElementManager = new FormElementManager($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new ChangePasswordFactory();

        $this->assertInstanceOf('Zend\UserModule\Form\ChangePassword', $factory->__invoke($serviceManager, 'Zend\UserModule\Form\ChangePassword'));
    }
}
