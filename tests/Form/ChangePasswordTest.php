<?php

namespace Zend\UserModuleTest\Form;

use Zend\UserModule\Form\ChangePassword as Form;

class ChangePasswordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Zend\UserModule\Form\ChangePassword::__construct
     */
    public function testConstruct()
    {
        $options = $this->getMock('Zend\UserModule\Options\AuthenticationOptionsInterface');

        $form = new Form(null, $options);

        $elements = $form->getElements();

        $this->assertArrayHasKey('identity', $elements);
        $this->assertArrayHasKey('credential', $elements);
        $this->assertArrayHasKey('newCredential', $elements);
        $this->assertArrayHasKey('newCredentialVerify', $elements);
    }

    /**
     * @covers Zend\UserModule\Form\ChangePassword::getAuthenticationOptions
     * @covers Zend\UserModule\Form\ChangePassword::setAuthenticationOptions
     */
    public function testSetGetAuthenticationOptions()
    {
        $options = $this->getMock('Zend\UserModule\Options\AuthenticationOptionsInterface');
        $form = new Form(null, $options);

        $this->assertSame($options, $form->getAuthenticationOptions());
    }
}
