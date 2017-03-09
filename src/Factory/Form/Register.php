<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 3/10/2015
 * Time: 9:34 AM
 */

namespace Zend\UserModule\Factory\Form;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Form\FormElementManager;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\UserModule\Form;
use Zend\UserModule\Validator;

class Register implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
    {
        $options = $serviceManager->get('zenduser_module_options');
        $form = new Form\Register(null, $options);

        //$form->setCaptchaElement($sm->get('zenduser_captcha_element'));
        $form->setHydrator($serviceManager->get('zenduser_register_form_hydrator'));
        $form->setInputFilter(new Form\RegisterFilter(
            new Validator\NoRecordExists(array(
                'mapper' => $serviceManager->get('zenduser_user_mapper'),
                'key'    => 'email'
            )),
            new Validator\NoRecordExists(array(
                'mapper' => $serviceManager->get('zenduser_user_mapper'),
                'key'    => 'username'
            )),
            $options
        ));

        return $form;
    }
}
