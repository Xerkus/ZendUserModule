<?php

namespace Zend\UserModuleTest\Authentication\Adapter;

use Zend\UserModuleTest\Authentication\Adapter\TestAsset\AbstractAdapterExtension;

class AbstractAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The object to be tested.
     *
     * @var adapter
     */
    protected $adapter;

    public function setUp()
    {
        $adapter = new AbstractAdapterExtension();
        $this->adapter = $adapter;
    }

    /**
     * @covers Zend\UserModule\Authentication\Adapter\AbstractAdapter::getStorage
     */
    public function testGetStorageWithoutStorageSet()
    {
        $this->assertInstanceOf('Zend\Authentication\Storage\Session', $this->adapter->getStorage());
    }

    /**
     * @covers Zend\UserModule\Authentication\Adapter\AbstractAdapter::getStorage
     * @covers Zend\UserModule\Authentication\Adapter\AbstractAdapter::setStorage
     */
    public function testSetGetStorage()
    {
        $storage = new \Zend\Authentication\Storage\Session('ZendUser');
        $storage->write('zendUser');
        $this->adapter->setStorage($storage);

        $this->assertInstanceOf('Zend\Authentication\Storage\Session', $this->adapter->getStorage());
        $this->assertSame('zendUser', $this->adapter->getStorage()->read());
    }

    /**
     * @covers Zend\UserModule\Authentication\Adapter\AbstractAdapter::isSatisfied
     */
    public function testIsSatisfied()
    {
        $this->assertFalse($this->adapter->isSatisfied());
    }

    public function testSetSatisfied()
    {
        $result = $this->adapter->setSatisfied();
        $this->assertInstanceOf('Zend\UserModule\Authentication\Adapter\AbstractAdapter', $result);
        $this->assertTrue($this->adapter->isSatisfied());

        $result = $this->adapter->setSatisfied(false);
        $this->assertInstanceOf('Zend\UserModule\Authentication\Adapter\AbstractAdapter', $result);
        $this->assertFalse($this->adapter->isSatisfied());
    }
}
