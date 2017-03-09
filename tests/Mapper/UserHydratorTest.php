<?php

namespace Zend\UserModuleTest\Mapper;

use Zend\UserModule\Mapper\UserHydrator as Hydrator;

class UserHydratorTest extends \PHPUnit_Framework_TestCase
{
    protected $hydrator;

    public function setUp()
    {
        $hydrator = new Hydrator;
        $this->hydrator = $hydrator;
    }

    /**
     * @covers Zend\UserModule\Mapper\UserHydrator::extract
     * @expectedException Zend\UserModule\Mapper\Exception\InvalidArgumentException
     */
    public function testExtractWithInvalidUserObject()
    {
        $user = new \StdClass;
        $this->hydrator->extract($user);
    }

    /**
     * @covers Zend\UserModule\Mapper\UserHydrator::extract
     * @covers Zend\UserModule\Mapper\UserHydrator::mapField
     * @dataProvider dataProviderTestExtractWithValidUserObject
     * @see https://github.com/ZF-Commons/ZendUser/pull/421
     */
    public function testExtractWithValidUserObject($object, $expectArray)
    {
        $result = $this->hydrator->extract($object);
        $this->assertEquals($expectArray, $result);
    }

    /**
     * @covers Zend\UserModule\Mapper\UserHydrator::hydrate
     * @expectedException Zend\UserModule\Mapper\Exception\InvalidArgumentException
     */
    public function testHydrateWithInvalidUserObject()
    {
        $user = new \StdClass;
        $this->hydrator->hydrate(array(), $user);
    }

    /**
     * @covers Zend\UserModule\Mapper\UserHydrator::hydrate
     * @covers Zend\UserModule\Mapper\UserHydrator::mapField
     */
    public function testHydrateWithValidUserObject()
    {
        $user = new \Zend\UserModule\Entity\User;

        $expectArray = array(
            'username' => 'zenduser',
            'email' => 'User',
            'display_name' => 'User',
            'password' => 'Password',
            'state' => 1,
            'user_id' => 1
        );

        $result = $this->hydrator->hydrate($expectArray, $user);

        $this->assertEquals($expectArray['username'], $result->getUsername());
        $this->assertEquals($expectArray['email'], $result->getEmail());
        $this->assertEquals($expectArray['display_name'], $result->getDisplayName());
        $this->assertEquals($expectArray['password'], $result->getPassword());
        $this->assertEquals($expectArray['state'], $result->getState());
        $this->assertEquals($expectArray['user_id'], $result->getId());
    }

    public function dataProviderTestExtractWithValidUserObject()
    {
        $createUserObject = function ($data) {
            $user = new \Zend\UserModule\Entity\User;
            foreach ($data as $key => $value) {
                if ($key == 'user_id') {
                    $key='id';
                }
                $methode = 'set' . str_replace(" ", "", ucwords(str_replace("_", " ", $key)));
                call_user_func(array($user,$methode), $value);
            }
            return $user;
        };
        $return = array();
        $expectArray = array();

        $buffer = array(
            'username' => 'zenduser',
            'email' => 'User',
            'display_name' => 'User',
            'password' => 'Password',
            'state' => 1,
            'user_id' => 1
        );

        $return[]=array($createUserObject($buffer), $buffer);

        /**
         * @see https://github.com/ZF-Commons/ZendUser/pull/421
         */
        $buffer = array(
            'username' => 'zenduser',
            'email' => 'User',
            'display_name' => 'User',
            'password' => 'Password',
            'state' => 1
        );

        $return[]=array($createUserObject($buffer), $buffer);

        return $return;
    }
}
