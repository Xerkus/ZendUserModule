<?php

namespace Zend\UserModuleTest\Options;

use Zend\UserModule\Options\ModuleOptions as Options;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Options $options
     */
    protected $options;

    public function setUp()
    {
        $options = new Options;
        $this->options = $options;
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLoginRedirectRoute
     * @covers Zend\UserModule\Options\ModuleOptions::setLoginRedirectRoute
     */
    public function testSetGetLoginRedirectRoute()
    {
        $this->options->setLoginRedirectRoute('zendUserRoute');
        $this->assertEquals('zendUserRoute', $this->options->getLoginRedirectRoute());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLoginRedirectRoute
     */
    public function testGetLoginRedirectRoute()
    {
        $this->assertEquals('zenduser', $this->options->getLoginRedirectRoute());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLogoutRedirectRoute
     * @covers Zend\UserModule\Options\ModuleOptions::setLogoutRedirectRoute
     */
    public function testSetGetLogoutRedirectRoute()
    {
        $this->options->setLogoutRedirectRoute('zendUserRoute');
        $this->assertEquals('zendUserRoute', $this->options->getLogoutRedirectRoute());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLogoutRedirectRoute
     */
    public function testGetLogoutRedirectRoute()
    {
        $this->assertSame('zenduser/login', $this->options->getLogoutRedirectRoute());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUseRedirectParameterIfPresent
     * @covers Zend\UserModule\Options\ModuleOptions::setUseRedirectParameterIfPresent
     */
    public function testSetGetUseRedirectParameterIfPresent()
    {
        $this->options->setUseRedirectParameterIfPresent(false);
        $this->assertFalse($this->options->getUseRedirectParameterIfPresent());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUseRedirectParameterIfPresent
     */
    public function testGetUseRedirectParameterIfPresent()
    {
        $this->assertTrue($this->options->getUseRedirectParameterIfPresent());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUserLoginWidgetViewTemplate
     * @covers Zend\UserModule\Options\ModuleOptions::setUserLoginWidgetViewTemplate
     */
    public function testSetGetUserLoginWidgetViewTemplate()
    {
        $this->options->setUserLoginWidgetViewTemplate('zendUser.phtml');
        $this->assertEquals('zendUser.phtml', $this->options->getUserLoginWidgetViewTemplate());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUserLoginWidgetViewTemplate
     */
    public function testGetUserLoginWidgetViewTemplate()
    {
        $this->assertEquals('zend-user/user/login.phtml', $this->options->getUserLoginWidgetViewTemplate());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableRegistration
     * @covers Zend\UserModule\Options\ModuleOptions::setEnableRegistration
     */
    public function testSetGetEnableRegistration()
    {
        $this->options->setEnableRegistration(false);
        $this->assertFalse($this->options->getEnableRegistration());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableRegistration
     */
    public function testGetEnableRegistration()
    {
        $this->assertTrue($this->options->getEnableRegistration());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLoginFormTimeout
     * @covers Zend\UserModule\Options\ModuleOptions::setLoginFormTimeout
     */
    public function testSetGetLoginFormTimeout()
    {
        $this->options->setLoginFormTimeout(100);
        $this->assertEquals(100, $this->options->getLoginFormTimeout());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLoginFormTimeout
     */
    public function testGetLoginFormTimeout()
    {
        $this->assertEquals(300, $this->options->getLoginFormTimeout());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUserFormTimeout
     * @covers Zend\UserModule\Options\ModuleOptions::setUserFormTimeout
     */
    public function testSetGetUserFormTimeout()
    {
        $this->options->setUserFormTimeout(100);
        $this->assertEquals(100, $this->options->getUserFormTimeout());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUserFormTimeout
     */
    public function testGetUserFormTimeout()
    {
        $this->assertEquals(300, $this->options->getUserFormTimeout());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLoginAfterRegistration
     * @covers Zend\UserModule\Options\ModuleOptions::setLoginAfterRegistration
     */
    public function testSetGetLoginAfterRegistration()
    {
        $this->options->setLoginAfterRegistration(false);
        $this->assertFalse($this->options->getLoginAfterRegistration());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getLoginAfterRegistration
     */
    public function testGetLoginAfterRegistration()
    {
        $this->assertTrue($this->options->getLoginAfterRegistration());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableUserState
     * @covers Zend\UserModule\Options\ModuleOptions::setEnableUserState
     */
    public function testSetGetEnableUserState()
    {
        $this->options->setEnableUserState(true);
        $this->assertTrue($this->options->getEnableUserState());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableUserState
     */
    public function testGetEnableUserState()
    {
        $this->assertFalse($this->options->getEnableUserState());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getDefaultUserState
     */
    public function testGetDefaultUserState()
    {
        $this->assertEquals(1, $this->options->getDefaultUserState());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getDefaultUserState
     * @covers Zend\UserModule\Options\ModuleOptions::setDefaultUserState
     */
    public function testSetGetDefaultUserState()
    {
        $this->options->setDefaultUserState(3);
        $this->assertEquals(3, $this->options->getDefaultUserState());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getAllowedLoginStates
     */
    public function testGetAllowedLoginStates()
    {
        $this->assertEquals(array(null, 1), $this->options->getAllowedLoginStates());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getAllowedLoginStates
     * @covers Zend\UserModule\Options\ModuleOptions::setAllowedLoginStates
     */
    public function testSetGetAllowedLoginStates()
    {
        $this->options->setAllowedLoginStates(array(2, 5, null));
        $this->assertEquals(array(2, 5, null), $this->options->getAllowedLoginStates());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getAuthAdapters
     */
    public function testGetAuthAdapters()
    {
        $this->assertEquals(array(100 => 'Zend\UserModule\Authentication\Adapter\Db'), $this->options->getAuthAdapters());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getAuthAdapters
     * @covers Zend\UserModule\Options\ModuleOptions::setAuthAdapters
     */
    public function testSetGetAuthAdapters()
    {
        $this->options->setAuthAdapters(array(40 => 'SomeAdapter'));
        $this->assertEquals(array(40 => 'SomeAdapter'), $this->options->getAuthAdapters());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getAuthIdentityFields
     * @covers Zend\UserModule\Options\ModuleOptions::setAuthIdentityFields
     */
    public function testSetGetAuthIdentityFields()
    {
        $this->options->setAuthIdentityFields(array('username'));
        $this->assertEquals(array('username'), $this->options->getAuthIdentityFields());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getAuthIdentityFields
     */
    public function testGetAuthIdentityFields()
    {
        $this->assertEquals(array('email'), $this->options->getAuthIdentityFields());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableUsername
     */
    public function testGetEnableUsername()
    {
        $this->assertFalse($this->options->getEnableUsername());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableUsername
     * @covers Zend\UserModule\Options\ModuleOptions::setEnableUsername
     */
    public function testSetGetEnableUsername()
    {
        $this->options->setEnableUsername(true);
        $this->assertTrue($this->options->getEnableUsername());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableDisplayName
     * @covers Zend\UserModule\Options\ModuleOptions::setEnableDisplayName
     */
    public function testSetGetEnableDisplayName()
    {
        $this->options->setEnableDisplayName(true);
        $this->assertTrue($this->options->getEnableDisplayName());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getEnableDisplayName
     */
    public function testGetEnableDisplayName()
    {
        $this->assertFalse($this->options->getEnableDisplayName());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUseRegistrationFormCaptcha
     * @covers Zend\UserModule\Options\ModuleOptions::setUseRegistrationFormCaptcha
     */
    public function testSetGetUseRegistrationFormCaptcha()
    {
        $this->options->setUseRegistrationFormCaptcha(true);
        $this->assertTrue($this->options->getUseRegistrationFormCaptcha());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUseRegistrationFormCaptcha
     */
    public function testGetUseRegistrationFormCaptcha()
    {
        $this->assertFalse($this->options->getUseRegistrationFormCaptcha());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUserEntityClass
     * @covers Zend\UserModule\Options\ModuleOptions::setUserEntityClass
     */
    public function testSetGetUserEntityClass()
    {
        $this->options->setUserEntityClass('zendUser');
        $this->assertEquals('zendUser', $this->options->getUserEntityClass());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getUserEntityClass
     */
    public function testGetUserEntityClass()
    {
        $this->assertEquals('Zend\UserModule\Entity\User', $this->options->getUserEntityClass());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getPasswordCost
     * @covers Zend\UserModule\Options\ModuleOptions::setPasswordCost
     */
    public function testSetGetPasswordCost()
    {
        $this->options->setPasswordCost(10);
        $this->assertEquals(10, $this->options->getPasswordCost());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getPasswordCost
     */
    public function testGetPasswordCost()
    {
        $this->assertEquals(14, $this->options->getPasswordCost());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getTableName
     * @covers Zend\UserModule\Options\ModuleOptions::setTableName
     */
    public function testSetGetTableName()
    {
        $this->options->setTableName('zendUser');
        $this->assertEquals('zendUser', $this->options->getTableName());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getTableName
     */
    public function testGetTableName()
    {
        $this->assertEquals('user', $this->options->getTableName());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getFormCaptchaOptions
     * @covers Zend\UserModule\Options\ModuleOptions::setFormCaptchaOptions
     */
    public function testSetGetFormCaptchaOptions()
    {
        $expected = array(
            'class'   => 'someClass',
            'options' => array(
                'anOption' => 3,
            ),
        );
        $this->options->setFormCaptchaOptions($expected);
        $this->assertEquals($expected, $this->options->getFormCaptchaOptions());
    }

    /**
     * @covers Zend\UserModule\Options\ModuleOptions::getFormCaptchaOptions
     */
    public function testGetFormCaptchaOptions()
    {
        $expected = array(
            'class'   => 'figlet',
            'options' => array(
                'wordLen'    => 5,
                'expiration' => 300,
                'timeout'    => 300,
            ),
        );
        $this->assertEquals($expected, $this->options->getFormCaptchaOptions());
    }
}
