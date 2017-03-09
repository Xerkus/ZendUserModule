<?php

namespace Zend\UserModuleTest\Form;

use Zend\UserModule\Form\LoginFilter as Filter;

class LoginFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Zend\UserModule\Form\LoginFilter::__construct
     */
    public function testConstruct()
    {
        $options = $this->getMock('Zend\UserModule\Options\ModuleOptions');
        $options->expects($this->once())
                ->method('getAuthIdentityFields')
                ->will($this->returnValue(array()));

        $filter = new Filter($options);

        $inputs = $filter->getInputs();
        $this->assertArrayHasKey('identity', $inputs);
        $this->assertArrayHasKey('credential', $inputs);

        $this->assertEquals(0, $inputs['identity']->getValidatorChain()->count());
    }

    /**
     * @covers Zend\UserModule\Form\LoginFilter::__construct
     */
    public function testConstructIdentityEmail()
    {
        $options = $this->getMock('Zend\UserModule\Options\ModuleOptions');
        $options->expects($this->once())
                ->method('getAuthIdentityFields')
                ->will($this->returnValue(array('email')));

        $filter = new Filter($options);

        $inputs = $filter->getInputs();
        $this->assertArrayHasKey('identity', $inputs);
        $this->assertArrayHasKey('credential', $inputs);

        $identity = $inputs['identity'];

        // test email as identity
        $validators = $identity->getValidatorChain()->getValidators();
        $this->assertArrayHasKey('instance', $validators[0]);
        $this->assertInstanceOf('\Zend\Validator\EmailAddress', $validators[0]['instance']);
    }
}
