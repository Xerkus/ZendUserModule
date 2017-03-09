<?php

namespace Zend\UserModuleTest\Form;

use Zend\UserModule\Form\ChangeEmail as Form;

class ChangeEmailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Zend\UserModule\Form\ChangeEmail::__construct
     */
    public function testConstruct()
    {
        $options = $this->getMock('Zend\UserModule\Options\AuthenticationOptionsInterface');

        $form = new Form(null, $options);

        $elements = $form->getElements();

        $this->assertArrayHasKey('identity', $elements);
        $this->assertArrayHasKey('newIdentity', $elements);
        $this->assertArrayHasKey('newIdentityVerify', $elements);
        $this->assertArrayHasKey('credential', $elements);
    }

    /**
     * @covers Zend\UserModule\Form\ChangeEmail::getAuthenticationOptions
     * @covers Zend\UserModule\Form\ChangeEmail::setAuthenticationOptions
     */
    public function testSetGetAuthenticationOptions()
    {
        $options = $this->getMock('Zend\UserModule\Options\AuthenticationOptionsInterface');
        $form = new Form(null, $options);

        $this->assertSame($options, $form->getAuthenticationOptions());
    }
}
