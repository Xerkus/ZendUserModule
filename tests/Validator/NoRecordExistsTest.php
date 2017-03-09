<?php

namespace Zend\UserModuleTest\Validator;

use Zend\UserModule\Validator\NoRecordExists as Validator;

class NoRecordExistsTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected $mapper;

    public function setUp()
    {
        $options = array('key' => 'username');
        $validator = new Validator($options);
        $this->validator = $validator;

        $mapper = $this->getMock('Zend\UserModule\Mapper\UserInterface');
        $this->mapper = $mapper;

        $validator->setMapper($mapper);
    }

    /**
     * @covers Zend\UserModule\Validator\NoRecordExists::isValid
     */
    public function testIsValid()
    {
        $this->mapper->expects($this->once())
                     ->method('findByUsername')
                     ->with('zendUser')
                     ->will($this->returnValue(false));

        $result = $this->validator->isValid('zendUser');
        $this->assertTrue($result);
    }

    /**
     * @covers Zend\UserModule\Validator\NoRecordExists::isValid
     */
    public function testIsInvalid()
    {
        $this->mapper->expects($this->once())
                     ->method('findByUsername')
                     ->with('zendUser')
                     ->will($this->returnValue('zendUser'));

        $result = $this->validator->isValid('zendUser');
        $this->assertFalse($result);

        $options = $this->validator->getOptions();
        $this->assertArrayHasKey(\Zend\UserModule\Validator\AbstractRecord::ERROR_RECORD_FOUND, $options['messages']);
        $this->assertEquals($options['messageTemplates'][\Zend\UserModule\Validator\AbstractRecord::ERROR_RECORD_FOUND], $options['messages'][\Zend\UserModule\Validator\AbstractRecord::ERROR_RECORD_FOUND]);
    }
}
