<?php

namespace Zend\UserModuleTest\Validator;

use Zend\UserModuleTest\Validator\TestAsset\AbstractRecordExtension;

class AbstractRecordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Zend\UserModule\Validator\AbstractRecord::__construct
     */
    public function testConstruct()
    {
        $options = array('key'=>'value');
        new AbstractRecordExtension($options);
    }

    /**
     * @covers Zend\UserModule\Validator\AbstractRecord::__construct
     * @expectedException Zend\UserModule\Validator\Exception\InvalidArgumentException
     * @expectedExceptionMessage No key provided
     */
    public function testConstructEmptyArray()
    {
        $options = array();
        new AbstractRecordExtension($options);
    }

    /**
     * @covers Zend\UserModule\Validator\AbstractRecord::getMapper
     * @covers Zend\UserModule\Validator\AbstractRecord::setMapper
     */
    public function testGetSetMapper()
    {
        $options = array('key' => '');
        $validator = new AbstractRecordExtension($options);

        $this->assertNull($validator->getMapper());

        $mapper = $this->getMock('Zend\UserModule\Mapper\UserInterface');
        $validator->setMapper($mapper);
        $this->assertSame($mapper, $validator->getMapper());
    }

    /**
     * @covers Zend\UserModule\Validator\AbstractRecord::getKey
     * @covers Zend\UserModule\Validator\AbstractRecord::setKey
     */
    public function testGetSetKey()
    {
        $options = array('key' => 'username');
        $validator = new AbstractRecordExtension($options);

        $this->assertEquals('username', $validator->getKey());

        $validator->setKey('email');
        $this->assertEquals('email', $validator->getKey());
    }

    /**
     * @covers Zend\UserModule\Validator\AbstractRecord::query
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid key used in ZendUser validator
     */
    public function testQueryWithInvalidKey()
    {
        $options = array('key' => 'zendUser');
        $validator = new AbstractRecordExtension($options);

        $method = new \ReflectionMethod('Zend\UserModuleTest\Validator\TestAsset\AbstractRecordExtension', 'query');
        $method->setAccessible(true);

        $method->invoke($validator, array('test'));
    }

    /**
     * @covers Zend\UserModule\Validator\AbstractRecord::query
     */
    public function testQueryWithKeyUsername()
    {
        $options = array('key' => 'username');
        $validator = new AbstractRecordExtension($options);

        $mapper = $this->getMock('Zend\UserModule\Mapper\UserInterface');
        $mapper->expects($this->once())
               ->method('findByUsername')
               ->with('test')
               ->will($this->returnValue('ZendUser'));

        $validator->setMapper($mapper);

        $method = new \ReflectionMethod('Zend\UserModuleTest\Validator\TestAsset\AbstractRecordExtension', 'query');
        $method->setAccessible(true);

        $result = $method->invoke($validator, 'test');

        $this->assertEquals('ZendUser', $result);
    }

    /**
     * @covers Zend\UserModule\Validator\AbstractRecord::query
     */
    public function testQueryWithKeyEmail()
    {
        $options = array('key' => 'email');
        $validator = new AbstractRecordExtension($options);

        $mapper = $this->getMock('Zend\UserModule\Mapper\UserInterface');
        $mapper->expects($this->once())
            ->method('findByEmail')
            ->with('test@test.com')
            ->will($this->returnValue('ZendUser'));

        $validator->setMapper($mapper);

        $method = new \ReflectionMethod('Zend\UserModuleTest\Validator\TestAsset\AbstractRecordExtension', 'query');
        $method->setAccessible(true);

        $result = $method->invoke($validator, 'test@test.com');

        $this->assertEquals('ZendUser', $result);
    }
}
