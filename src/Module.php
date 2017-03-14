<?php
namespace Zend\UserModule;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    ConfigProviderInterface,
    ServiceProviderInterface
{

    public function getConfig($env = null)
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getControllerPluginConfig()
    {
        return array(
            'factories' => array(
                'zendUserAuthentication' => 'Zend\UserModule\Factory\Controller\Plugin\UserAuthentication',
            ),
        );
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'ZendUser\Controller\UserController' => 'Zend\UserModule\Factory\Controller\UserControllerFactory',
                'zenduser' => 'Zend\UserModule\Factory\Controller\UserControllerFactory',
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'ZendUserDisplayName' => 'Zend\UserModule\Factory\View\Helper\UserDisplayName',
                'ZendUserIdentity' => 'Zend\UserModule\Factory\View\Helper\UserIdentity',
                'ZendUserLoginWidget' => 'Zend\UserModule\Factory\View\Helper\UserLoginWidget',
            ),
        );

    }

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'zenduser_zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
            ),
            'invokables' => array(
                'zenduser_register_form_hydrator'    => 'Zend\Hydrator\ClassMethods',
            ),
            'factories' => array(
                'zenduser_redirect_callback' => 'Zend\UserModule\Factory\Controller\RedirectCallbackFactory',
                'zenduser_module_options' => 'Zend\UserModule\Factory\Options\ModuleOptions',
                'Zend\UserModule\Authentication\Adapter\AdapterChain' => 'Zend\UserModule\Authentication\Adapter\AdapterChainServiceFactory',

                // We alias this one because it's ZendUserModule's instance of
                // Zend\Authentication\AuthenticationService. We don't want to
                // hog the FQCN service alias for a Zend\* class.
                'zenduser_auth_service' => 'Zend\UserModule\Factory\AuthenticationService',

                'zenduser_user_hydrator' => 'Zend\UserModule\Factory\UserHydrator',
                'zenduser_user_mapper' => 'Zend\UserModule\Factory\Mapper\User',

                'zenduser_login_form'            => 'Zend\UserModule\Factory\Form\Login',
                'zenduser_register_form'         => 'Zend\UserModule\Factory\Form\Register',
                'zenduser_change_password_form'  => 'Zend\UserModule\Factory\Form\ChangePassword',
                'zenduser_change_email_form'     => 'Zend\UserModule\Factory\Form\ChangeEmail',

                'Zend\UserModule\Authentication\Adapter\Db' => 'Zend\UserModule\Factory\Authentication\Adapter\DbFactory',
                'Zend\UserModule\Authentication\Storage\Db' => 'Zend\UserModule\Factory\Authentication\Storage\DbFactory',

                'zenduser_user_service'              => 'Zend\UserModule\Factory\Service\UserFactory',
            ),
        );
    }
}
