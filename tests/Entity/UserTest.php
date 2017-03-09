<?php

namespace Zend\UserModuleTest\Entity;

use Zend\UserModule\Entity\User as Entity;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected $user;

    public function setUp()
    {
        $user = new Entity;
        $this->user = $user;
    }

    /**
     * @covers Zend\UserModule\Entity\User::setId
     * @covers Zend\UserModule\Entity\User::getId
     */
    public function testSetGetId()
    {
        $this->user->setId(1);
        $this->assertEquals(1, $this->user->getId());
    }

    /**
     * @covers Zend\UserModule\Entity\User::setUsername
     * @covers Zend\UserModule\Entity\User::getUsername
     */
    public function testSetGetUsername()
    {
        $this->user->setUsername('zendUser');
        $this->assertEquals('zendUser', $this->user->getUsername());
    }

    /**
     * @covers Zend\UserModule\Entity\User::setDisplayName
     * @covers Zend\UserModule\Entity\User::getDisplayName
     */
    public function testSetGetDisplayName()
    {
        $this->user->setDisplayName('Zfc User');
        $this->assertEquals('Zfc User', $this->user->getDisplayName());
    }

    /**
     * @covers Zend\UserModule\Entity\User::setEmail
     * @covers Zend\UserModule\Entity\User::getEmail
     */
    public function testSetGetEmail()
    {
        $this->user->setEmail('zendUser@zendUser.com');
        $this->assertEquals('zendUser@zendUser.com', $this->user->getEmail());
    }

    /**
     * @covers Zend\UserModule\Entity\User::setPassword
     * @covers Zend\UserModule\Entity\User::getPassword
     */
    public function testSetGetPassword()
    {
        $this->user->setPassword('zendUser');
        $this->assertEquals('zendUser', $this->user->getPassword());
    }

    /**
     * @covers Zend\UserModule\Entity\User::setState
     * @covers Zend\UserModule\Entity\User::getState
     */
    public function testSetGetState()
    {
        $this->user->setState(1);
        $this->assertEquals(1, $this->user->getState());
    }
}
