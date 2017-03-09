<?php

namespace Zend\UserModuleTest\View\Helper;

use Zend\UserModule\View\Helper\UserIdentity as ViewHelper;

class ZendUserIdentityTest extends \PHPUnit_Framework_TestCase
{
    protected $helper;

    protected $authService;

    public function setUp()
    {
        $helper = new ViewHelper;
        $this->helper = $helper;

        $authService = $this->getMock('Zend\Authentication\AuthenticationService');
        $this->authService = $authService;

        $helper->setAuthService($authService);
    }

    /**
     * @covers Zend\UserModule\View\Helper\UserIdentity::__invoke
     */
    public function testInvokeWithIdentity()
    {
        $this->authService->expects($this->once())
                          ->method('hasIdentity')
                          ->will($this->returnValue(true));
        $this->authService->expects($this->once())
                          ->method('getIdentity')
                          ->will($this->returnValue('zendUser'));

        $result = $this->helper->__invoke();

        $this->assertEquals('zendUser', $result);
    }

    /**
     * @covers Zend\UserModule\View\Helper\UserIdentity::__invoke
     */
    public function testInvokeWithoutIdentity()
    {
        $this->authService->expects($this->once())
                          ->method('hasIdentity')
                          ->will($this->returnValue(false));

        $result = $this->helper->__invoke();

        $this->assertFalse($result);
    }

    /**
     * @covers Zend\UserModule\View\Helper\UserIdentity::setAuthService
     * @covers Zend\UserModule\View\Helper\UserIdentity::getAuthService
     */
    public function testSetGetAuthService()
    {
        //We set the authservice in setUp, so we dont have to set it again
        $this->assertSame($this->authService, $this->helper->getAuthService());
    }
}
