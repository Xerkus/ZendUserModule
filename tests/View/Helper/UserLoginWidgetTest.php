<?php

namespace Zend\UserModuleTest\View\Helper;

use Zend\UserModule\View\Helper\UserLoginWidget as ViewHelper;
use Zend\View\Model\ViewModel;

class ZendUserLoginWidgetTest extends \PHPUnit_Framework_TestCase
{
    protected $helper;

    protected $view;

    public function setUp()
    {
        $this->helper = new ViewHelper;

        $view = $this->getMock('Zend\View\Renderer\RendererInterface');
        $this->view = $view;

        $this->helper->setView($view);
    }

    public function providerTestInvokeWithRender()
    {
        $attr = array();
        $attr[] = array(
            array(
                'render' => true,
                'redirect' => 'zendUser'
            ),
            array(
                'loginForm' => null,
                'redirect' => 'zendUser'
            ),
        );
        $attr[] = array(
            array(
                'redirect' => 'zendUser'
            ),
            array(
                'loginForm' => null,
                'redirect' => 'zendUser'
            ),
        );
        $attr[] = array(
            array(
                'render' => true,
            ),
            array(
                'loginForm' => null,
                'redirect' => false
            ),
        );

        return $attr;
    }

    /**
     * @covers Zend\UserModule\View\Helper\UserLoginWidget::__invoke
     * @dataProvider providerTestInvokeWithRender
     */
    public function testInvokeWithRender($option, $expect)
    {
        /**
         * @var $viewModel \Zend\View\Model\ViewModels
         */
        $viewModel = null;

        $this->view->expects($this->at(0))
             ->method('render')
             ->will($this->returnCallback(function ($vm) use (&$viewModel) {
                 $viewModel = $vm;
                 return "test";
             }));

        $result = $this->helper->__invoke($option);

        $this->assertNotInstanceOf('Zend\View\Model\ViewModel', $result);
        $this->assertInternalType('string', $result);


        $this->assertInstanceOf('Zend\View\Model\ViewModel', $viewModel);
        foreach ($expect as $name => $value) {
            $this->assertEquals($value, $viewModel->getVariable($name, "testDefault"));
        }
    }

    /**
     * @covers Zend\UserModule\View\Helper\UserLoginWidget::__invoke
     */
    public function testInvokeWithoutRender()
    {
        $result = $this->helper->__invoke(array(
            'render' => false,
            'redirect' => 'zendUser'
        ));

        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
        $this->assertEquals('zendUser', $result->redirect);
    }

    /**
     * @covers Zend\UserModule\View\Helper\UserLoginWidget::setLoginForm
     * @covers Zend\UserModule\View\Helper\UserLoginWidget::getLoginForm
     */
    public function testSetGetLoginForm()
    {
        $loginForm = $this->getMockBuilder('Zend\UserModule\Form\Login')->disableOriginalConstructor()->getMock();

        $this->helper->setLoginForm($loginForm);
        $this->assertInstanceOf('Zend\UserModule\Form\Login', $this->helper->getLoginForm());
    }

    /**
     * @covers Zend\UserModule\View\Helper\UserLoginWidget::setViewTemplate
     */
    public function testSetViewTemplate()
    {
        $this->helper->setViewTemplate('zendUser');

        $reflectionClass = new \ReflectionClass('Zend\UserModule\View\Helper\UserLoginWidget');
        $reflectionProperty = $reflectionClass->getProperty('viewTemplate');
        $reflectionProperty->setAccessible(true);

        $this->assertEquals('zendUser', $reflectionProperty->getValue($this->helper));
    }
}
