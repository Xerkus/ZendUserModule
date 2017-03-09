<?php
namespace Zend\UserModuleTest\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\ServiceManager;
use Zend\UserModule\Factory\Form\ChangeEmail as ChangeEmailFactory;
use Zend\UserModule\Options\ModuleOptions;
use Zend\UserModule\Mapper\User as UserMapper;

class ChangeEmailFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager([
            'services' => [
                'zenduser_module_options' => new ModuleOptions,
                'zenduser_user_mapper' => new UserMapper
            ]
        ]);

        $formElementManager = new FormElementManager($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new ChangeEmailFactory();

        $this->assertInstanceOf('Zend\UserModule\Form\ChangeEmail', $factory->__invoke($serviceManager, 'Zend\UserModule\Form\ChangeEmail'));
    }
}
